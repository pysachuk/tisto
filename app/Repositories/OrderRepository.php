<?php

namespace App\Repositories;
use App\Http\Requests\AddOrderRequest;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\Services\Order\OrderService;
use Carbon\Carbon;

class OrderRepository implements OrderRepositoryInterface
{
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this -> orderService = $orderService;
    }

    public function getNewOrdersCount()
    {
        return Order::where('status', Order::STATUS_NEW) -> count();
    }

    public function getOrdersByStatus($status, $paginate = null)
    {
        $status = $this -> orderService -> getOrderStatusByUrl($status);
        if($paginate)
            return Order::where('status', $status) -> orderBy('updated_at', 'DESC') -> paginate($paginate);
        return Order::where('status', $status) -> orderBy('updated_at', 'DESC') -> get();
    }

    public function approveOrder($id)
    {
        return $this -> setStatus($id, Order::STATUS_APPROVED);
    }

    public function rejectOrder($id)
    {
        return $this -> setStatus($id, Order::STATUS_REJECTED);
    }

    public function setStatus($id, $status)
    {
        $order = Order::find($id);
        $order -> status = $status;
        return $order -> save();
    }

    public function getCurrentMonthAcceptedOrders()
    {
        return Order::whereMonth('updated_at', Carbon::now()->month)
            ->where('status', Order::STATUS_APPROVED)
            -> get();
    }

    public function getCurrentMonthAcceptedOrdersCount()
    {
        return Order::whereMonth('updated_at', Carbon::now()->month)
            ->where('status', Order::STATUS_APPROVED)
            -> count();
    }

    public function getCurrentMonthSumm()
    {
        return Order::whereMonth('updated_at', Carbon::now()->month)
            ->where('status', Order::STATUS_APPROVED)
            -> sum('summ');
    }

    public function getTotalAmount()
    {
        return Order::where('status', Order::STATUS_APPROVED) -> sum('summ');
    }

    public function addOrder(AddOrderRequest $request, $products)
    {
        $order = new Order;
        $data = $request->only($order->getFillable());
        $order->fill($data);
        $order -> status = Order::STATUS_NEW;
        $order -> cart_id = session('cart_id');
        $order -> save();
        foreach ($products as $product)
        {
            $order -> orderProducts() -> create([
                'product_id' => $product -> id,
                'count' => $product -> quantity,
                'price' => $product -> price
            ]);
        }
        return $order;
    }
}
