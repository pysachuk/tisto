<?php

namespace App\Http\Livewire;

use App\Events\OrderCreated;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Transaction;
use App\Services\Cart\CartService;
use App\Services\LocationService;
use App\Services\Order\OrderService;
use App\Services\Payment\Fondy\FondyService;
use App\Services\Payment\PaymentService;
use Cloudipsp\Configuration;
use Cloudipsp\Result\Result;
use Livewire\Component;
use App\Models\Order as OrderModel;

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
    }

    public function createOrder(OrderService $orderService)
    {
        $data = $this->validate();
        $order = $orderService->saveOrder($data);
        $this->redirectAfterOrder($order);
    }

    public function redirectAfterOrder(OrderModel $order)
    {
        if($order->payment_method == Payment::PAYMENT_METHOD_CC) {
            $paymentService = resolve(PaymentService::class);
            return $paymentService->orderPayment($order);
        } else {
            return redirect()->route('order.accepted', $order);
        }
    }

    public function render()
    {
        return view('livewire.order')->extends('shop.layouts.shop.main_layout')->section('content');
    }
}
