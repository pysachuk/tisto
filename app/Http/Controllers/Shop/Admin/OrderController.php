<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $orderReporitory;

    public function __construct(OrderRepositoryInterface $orderReporitory)
    {
        $this->orderReporitory = $orderReporitory;
    }

    public function newOrders()
    {
        $title = 'Нові замовлення:';
        $orders = $this -> orderReporitory -> getOrdersByStatus(1, 15);
        return view('shop.admin.order.orders_list',compact('orders', 'title'));
    }

    public function acceptedOrders()
    {
        $title = 'Прийняті замовлення:';
        $orders = $this -> orderReporitory -> getOrdersByStatus(2, 15);
        return view('shop.admin.order.orders_list',compact('orders', 'title'));
    }

    public function rejectedOrders()
    {
        $title = 'Відхилені замовлення:';
        $orders = $this -> orderReporitory -> getOrdersByStatus(3, 15);
        return view('shop.admin.order.orders_list',compact('orders', 'title'));
    }

    public function viewOrder(Order $order)
    {
        return view('shop.admin.order.view',compact('order'));
    }
    public function approveOrder(Request $request)
    {
        $this -> orderReporitory -> approveOrder($request -> order_id);
        return redirect() -> route('admin.order.new') -> with('success', 'Замовлення прийняте.');
    }
    public function rejectOrder(Request $request)
    {
        $this -> orderReporitory -> rejectOrder($request -> order_id);
        return redirect() -> route('admin.order.new') -> with('info', 'Замовлення Відхилено.');
    }
}
