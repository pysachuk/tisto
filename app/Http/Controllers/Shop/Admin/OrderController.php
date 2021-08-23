<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC') -> get();
        return view('shop.admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newOrders()
    {
        $orders = Order::where('status', 1) -> orderBy('created_at', 'DESC') -> get();
        return view('shop.admin.order.index',compact('orders'));
    }
    public function approveOrder(Request $request)
    {
        $order = Order::find($request -> order_id);
        $order -> status = 2;
        if($order -> save())
            return response() -> json(true);
    }
}
