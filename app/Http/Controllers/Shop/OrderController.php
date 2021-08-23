<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\AddOrderRequest;


class OrderController extends Controller
{
    public function __construct()
    {
        if(! session('cart_id'))
        {
            session(['cart_id' => uniqid()]);
        }
        $this->middleware('isCart');
    }

    public function checkout()
    {
        $cart_items = \Cart::session(session('cart_id')) -> getContent();
        return view('shop.order.checkout', compact('cart_items'));
    }
    public function addOrder(AddOrderRequest $request)
    {
        $summ = \Cart::session(session('cart_id')) -> getTotal();
        $products = \Cart::session(session('cart_id')) -> getContent();
        $order = Order::addOrder($request, $summ, $products);
        \Cart::session(session('cart_id')) -> clear();
        if($order -> payment_method == 2)
        {
            $html = PaymentController::getPaymentButton($order);
            return view('shop.order.payment', ['order' => $order, 'button' => $html]);
        }
        return view('shop.order.order_accepted',['order_id' => $order -> id]);
    }
}
