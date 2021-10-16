<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\CartTrait;

class Cart extends Component
{
    use CartTrait;

    public function render()
    {
        return view('livewire.cart')->extends('shop.layouts.shop.main_layout')->section('content');
    }
}
