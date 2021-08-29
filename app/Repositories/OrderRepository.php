<?php

namespace App\Repositories;
use App\Http\Requests\AddOrderRequest;
use App\Models\OrderProduct;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use Carbon\Carbon;

class OrderRepository implements OrderRepositoryInterface
{
    public function getOrdersByStatus($status, $paginate = null)
    {
        if($paginate)
            return Order::where('status', $status) -> orderBy('created_at', 'DESC') -> paginate($paginate);
        return Order::where('status', $status) -> orderBy('created_at', 'DESC') -> get();
    }

    public function approveOrder($id)
    {
        $order = Order::find($id);
        $order -> status = 2;
        return $order -> save();
    }

    public function rejectOrder($id)
    {
        $order = Order::find($id);
        $order -> status = 3;
        return $order -> save();
    }

    public function getCurrentMonthAcceptedOrders()
    {
        return Order::whereMonth('created_at', Carbon::now()->month)
            ->where('status', 2)
            -> get();
    }

    public function getCurrentMonthSumm()
    {
        $orders =  $this -> getCurrentMonthAcceptedOrders();
        $summ = 0;
        foreach ($orders as $order)
        {
            $summ += $order -> summ;
        }
        return $summ;
    }

    public function getTotalAmount()
    {
        $orders = Order::where('status', 2) -> get();
        $summ = 0;
        foreach ($orders as $order)
        {
            $summ += $order -> summ;
        }
        return $summ;
    }

    public function addOrder(AddOrderRequest $request, $products)
    {
        $order = new Order;
        $data = $request->only($order->getFillable());
        $order->fill($data);
        $order -> status = 1; //1 - новый, 2 - принят, 3 - отменен, 4 - завершен
        $order -> cart_id = session('cart_id');
        $order -> save();
        foreach ($products as $product)
        {
            $order_product = new OrderProduct;
            $order_product -> order_id = $order -> id;
            $order_product -> product_id = $product -> id;
            $order_product -> count = $product -> quantity;
            $order_product -> price = $product -> price;
            $order_product -> save();
        }
        return $order;
    }
}
