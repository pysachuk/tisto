<?php

namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddOrderRequest;
use App\Repositories\Interfaces\OrderRepositoryInterface;


class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this -> orderRepository = $orderRepository;
        $this->middleware('isCart');
        $this -> middleware('isWorkTime');
    }

    public function checkout()
    {
        $cart_items = \Cart::session(session('cart_id')) -> getContent();
        return view('shop.order.checkout', compact('cart_items'));
    }
    public function addOrder(AddOrderRequest $request)
    {
        $products = \Cart::session(session('cart_id')) -> getContent();
        $order = $this -> orderRepository -> addOrder($request, $products);
        \Cart::session(session('cart_id')) -> clear();
        if($order -> payment_method == 2)
            return redirect() -> route('cart.pay_page', $order);
        $data['order'] = $order;
        $data['payment'] = 'money';
        $data['payment_button'] = PaymentController::getPaymentButton($order);
        return view('shop.order.order_status',compact('data'));
    }
}
