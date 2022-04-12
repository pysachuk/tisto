<?php

namespace App\Services\Order;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Services\Cart\CartService;
use App\Services\LocationService;

class OrderService
{
    public $locationService;
    public $cart;

    public function __construct()
    {
        $this->locationService = resolve(LocationService::class);
        $this->cart = resolve(CartService::class);
    }

    public function saveOrder(array $data)
    {
        $data['cart_id'] = $this->cart->getCartId();
        $data['summ'] = $this->cart->getTotal();
        $data['status'] = Order::STATUS_NEW;
        $order = Order::create($data);
        $this->saveOrderProducts($order, $this->cart->getProducts());
        $this->cart->clearCart();
        event(new OrderCreated($order));
        return $order;
    }

    public function saveOrderProducts(Order $order, $orderProducts)
    {
        $cartProducts = [];
        foreach ($orderProducts as $product) {
            $cartProducts[] = [
                'product_id' => $product->product->id,
                'count' => $product->quantity,
                'price' => $product->product->price
            ];
        }
        return $order->orderProducts()->createMany($cartProducts);
    }

//    public function create(array $data, $products, $sum)
//    {
//        $order = new Order();
//        $order->fill($data);
//        $order->summ = $sum;
//        $order->status = Order::STATUS_NEW;
//        $order->cart_id = session('cart_uuid');
//        $order->save();
//        $cartProducts = [];
//        foreach ($products as $product) {
//            $cartProducts[] = [
//                'product_id' => $product->product->id,
//                'count' => $product->quantity,
//                'price' => $product->product->price
//            ];
//        }
//        event(new OrderCreated($order));
//        if(! $order->orderProducts()->createMany($cartProducts)->isEmpty()){
//            return $order;
//        }
//    }

    public function getOrders($status, $paginate = null, $location = null)
    {
        $user = auth()->user();
        $status = $this->getOrderStatusByUrl($status);
        $orders = Order::query()
            ->where('status', $status)
            ->orderBy('updated_at', 'DESC');

        if( config('settings.orders_by_location') ) {
            if( $user->role->role === 'admin' ) {
                if($location) {
                    $orders = $orders->where('location_key', $location);
                }
            } else {
                $orders = $orders->where('location_key', $user->role->location->key);
            }
        }
        if ($paginate) {
            $orders = $orders->paginate($paginate);
        } else {
            $orders = $orders->get();
        }

        return $orders;
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
