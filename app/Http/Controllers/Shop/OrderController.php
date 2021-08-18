<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests\AddOrderRequest;

class OrderController extends Controller
{
    public function __construct()
    {
        if(!isset($_COOKIE['cart_id']))
        {
            setcookie('cart_id', uniqid());
        }
        \Cart::session($_COOKIE['cart_id']);
    }

    public function checkout()
    {
        $cart_items = \Cart::getContent();
        return view('shop.order.checkout', compact('cart_items'));
    }
    public function addOrder(AddOrderRequest $request)
    {
        $order = new Order;
        $data = $request->only($order->getFillable());
        $order->fill($data);
        $order -> summ = \Cart::getTotal();
        $order -> status = 1; //1 - новый, 2 - принят, 3 - отменен, 4 - завершен
        $order -> save();
        $order_products = \Cart::getContent();
        foreach ($order_products as $product)
        {
            $order_product = new OrderProduct;
            $order_product -> order_id = $order -> id;
            $order_product -> product_id = $product -> id;
            $order_product -> count = $product -> quantity;
            $order_product -> price = $product -> price;
            $order_product -> save();
        }
        \Cart::clear();
        return redirect() -> route('shop.main');
    }
}
