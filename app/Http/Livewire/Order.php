<?php

namespace App\Http\Livewire;

use App\Events\OrderCreated;
use App\Models\Location;
use App\Models\Payment;
use App\Services\Cart\CartService;
use App\Services\Order\OrderService;
use Livewire\Component;

class Order extends Component
{
    public $locations;
    public $cartItems;
    public $cartTotal;
    public $name;
    public $phone;
    public $address;
    public $description;
    public $payment_method = 1;
    public $location_key = 1;
    protected $rules = [
        'name' => 'required|string',
        'phone' => 'required|regex:#^\+38\([0-9][0-9][0-9]\) [0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]#',
        'address' => 'required|string',
        'description' => 'nullable|string',
        'payment_method'    => 'required|numeric',
        'location_key' => 'required|exists:locations,key'
    ];
    protected $orderService;

    public function mount(CartService $cartService)
    {
        $this->locations = Location::get();
        $this->cartItems = $cartService->getProducts();
        $this->cartTotal = $cartService->getTotal();
    }

    public function createOrder(OrderService $orderService, CartService $cartService)
    {
        $data = $this->validate();
        $order = $orderService->create($data, $this->cartItems, $this->cartTotal);
        event(new OrderCreated($order));
        $cartService->clearCart();
        if($order->payment_method == Payment::PAYMENT_METHOD_CC) {
            return redirect()->route('cart.pay_page', $order);
        } else {
            return redirect()->route('order.accepted', $order);
        }

    }

    public function render()
    {
        return view('livewire.order')->extends('shop.layouts.shop.main_layout')->section('content');
    }
}
