<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests\AddOrderRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\LiqPay;

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
//        dd(\Cart::session(session('cart_id'))-> getContent());
        $cart_items = \Cart::session(session('cart_id')) -> getContent();
        return view('shop.order.checkout', compact('cart_items'));
    }
    public function addOrder(AddOrderRequest $request)
    {
        $order = new Order;
        $data = $request->only($order->getFillable());
        $order->fill($data);
        $order -> summ = \Cart::session(session('cart_id')) -> getTotal();
        $order -> status = 1; //1 - новый, 2 - принят, 3 - отменен, 4 - завершен
        $order -> save();
        $order_products = \Cart::session(session('cart_id')) -> getContent();
        foreach ($order_products as $product)
        {
            $order_product = new OrderProduct;
            $order_product -> order_id = $order -> id;
            $order_product -> product_id = $product -> id;
            $order_product -> count = $product -> quantity;
            $order_product -> price = $product -> price;
            $order_product -> save();
        }
        \Cart::session(session('cart_id')) -> clear();
        if($order -> payment_method == 2)
        $public_key = Config::get('liqpay.public_key');
        $private_key = Config::get('liqpay.private_key');
        {
            $liqpay = new LiqPay($public_key, $private_key);
            $html = $liqpay->cnb_form(array(
                'action'         => 'pay',
                'amount'         => $order -> summ,
                'currency'       => Config::get('liqpay.currency'),
                'description'    => 'Оплата замовлення № '.$order -> id,
                'order_id'       => $order -> id,
                'version'        => '3',
                'language'       => Config::get('liqpay.language'),
                'server_url'     => 'https://tisto.pp.ua/api/payment_status',
                'result_url'     => 'tisto.pp.ua'

            ));
            return view('shop.order.payment', ['order' => $order, 'button' => $html]);
        }
        return view('shop.order.order_accepted',['order_id' => $order -> id]);
    }
}
