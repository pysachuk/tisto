<?php

namespace App\Services;

use App\Models\Order;
use App\Models\TelegramChat;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    public function newOrderNotification(Order $order)
    {
        $chats = TelegramChat::whereHas('locations', function ($query) use ($order) {
            return $query->where('key', '=', $order->location_key);
        })->where('order_notifications', true)->get();
        $orderInfo = view('shop.admin.telegram.order-notification', compact('order'))
            ->render();
        $orderInfo .= view('shop.admin.telegram.order-products', ['products' => $order->orderProducts])->render();

        foreach ($chats as $chat) {
            try {
                Telegram::sendMessage([
                    'chat_id' => $chat->chat_id,
                    'text' => $orderInfo,
                    'parse_mode' => 'HTML']);
            }
            catch (\Exception $e) {
                \Log::error($e);
            }
        }
    }
}
