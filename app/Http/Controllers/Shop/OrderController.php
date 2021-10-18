<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddOrderRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Services\Payment\Liqpay\LiqPayService;


class OrderController extends Controller
{

    public function orderAccepted(Order $order)
    {
        if($order->cart_id != session('cart_uuid')) {
            return redirect()->route('shop.main');
        }
        $button = LiqPayService::getPaymentButton($order);

        return view('shop.order.order_status', compact('button', 'order'));
    }

}
