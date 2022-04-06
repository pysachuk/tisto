<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $orderReporitory;
    protected $orderService;

    public function __construct(OrderRepositoryInterface $orderReporitory, OrderService $orderService)
    {
        $this->orderReporitory = $orderReporitory;
        $this->orderService = $orderService;
    }

//    public function getOrders($status)
//    {
//        $title = __('titles.orders');
//        $orders = $this->orderService->getOrders($status, 15, request()->location);
//
//        return view('shop.admin.order.orders_list', compact('orders', 'title'));
//    }

    public function viewOrder(Order $order)
    {
        return view('shop.admin.order.view', compact('order'));
    }

    public function approveOrder(Request $request)
    {
        $this->orderReporitory->approveOrder($request->order_id);

        return redirect()->route('admin.orders', 'new')->with('success', 'Замовлення прийняте.');
    }

    public function rejectOrder(Request $request)
    {
        $this->orderReporitory->rejectOrder($request->order_id);

        return redirect()->route('admin.orders', 'new')->with('info', 'Замовлення Відхилено.');
    }
}
