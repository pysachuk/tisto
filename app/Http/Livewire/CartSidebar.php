<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\CartTrait;

class CartSidebar extends Component
{
    use CartTrait;

    protected $listeners = ['update' => 'refresh'];

    public function render()
    {
        return view('livewire.cart-sidebar');
    }
}
