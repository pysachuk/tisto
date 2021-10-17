<?php

namespace App\Services\Order;

use App\Models\Order;

class OrderService
{
    public function create(array $data, $products, $sum)
    {
        $order = new Order();
        $order->fill($data);
        $order->summ = $sum;
        $order->status = Order::STATUS_NEW;
        $order->cart_id = session('cart_uuid');
        $order->save();
        $cartProducts = [];
        foreach ($products as $product) {
            $cartProducts[] = [
                'product_id' => $product->product->id,
                'count' => $product->quantity,
                'price' => $product->product->price
            ];
        }
        if(! $order->orderProducts()->createMany($cartProducts)->isEmpty()){
            return $order;
        }
    }
    public function getOrderStatusByUrl($status)
    {
        switch ($status) {
            case 'new':
            {
                $status = Order::STATUS_NEW;
                break;
            }
            case 'approved':
            {
                $status = Order::STATUS_APPROVED;
                break;
            }
            case 'rejected':
            {
                $status = Order::STATUS_REJECTED;
                break;
            }
        }

        return $status;
    }
}
