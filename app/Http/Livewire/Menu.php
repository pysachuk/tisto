<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Traits\CartTrait;

class Menu extends Component
{
    use CartTrait;

    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.menu')->extends('shop.layouts.shop.main_layout')->section('content');
    }
}
