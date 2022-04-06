<?php

namespace App\Http\Livewire\Admin\Telegram;

use App\Models\Location;
use App\Models\TelegramChat;
use Livewire\Component;
use Livewire\WithPagination;

class Chats extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'editChat.name' => 'required|string',
        'editChat.chat_id' => 'required|string',
        'editChat.order_notifications' => 'required|boolean',
    ];

    //Edit Chat
    public $editChat;
    public $showEditModal = false;
    public $editChatLocations;
    //New Chat
    public $newChat;
    public $newChatLocations;
    public $showCreateModal = false;
    public $locations;

    public function mount()
    {
        $this->locations = Location::get();
    }

    public function showCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function saveNewChat()
    {
        $chat = TelegramChat::create($this->newChat);
        $this->newChat = null;
        $this->addLocationsToChat($chat, $this->newChatLocations);
        $this->closeCreateModal();
    }

    public function addLocationsToChat(TelegramChat $chat, array $locations)
    {
        $chat->locations()->detach();
        foreach ($locations as $key => $value) {
            if($value === true) {
                $chat->locations()->attach($key);
            }
        }
    }

    protected function getChats()
    {
        return TelegramChat::orderByDesc('created_at')->paginate(15);
    }

    public function editChat(TelegramChat $telegramChat)
    {
        $this->editChat = $telegramChat;
        $this->editChatLocations = $this->getEditChatLocations($telegramChat);
        $this->showEditModal = true;
    }

    public function getEditChatLocations(TelegramChat $telegramChat)
    {
        $chatLocations = [];
        foreach ($telegramChat->locations as $location) {
            $chatLocations[$location->key] = true;
        }

        return $chatLocations;
    }

    public function saveEditChat()
    {
        $this->validate();
        $this->editChat->save();
        $this->addLocationsToChat($this->editChat, $this->editChatLocations);
        $this->closeEditModal();
    }

    public function removeChat(TelegramChat $telegramChat)
    {
        $telegramChat->delete();
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        $chats = $this->getChats();

        return view('livewire.admin.telegram.chats', compact('chats'))
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
