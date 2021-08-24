<?php

namespace App\Models;

use App\Http\Requests\AddOrderRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'description',
        'summ',
        'status',
        'payment_method'
    ];

    public function orderProducts()
    {
        return $this -> hasMany(OrderProduct::class);
    }
    public static function addOrder(AddOrderRequest $request, $summ, $products)
    {
        $order = new self();
        $data = $request->only($order->getFillable());
        $order->fill($data);
        $order -> summ = $summ;
        $order -> status = 1; //1 - новый, 2 - принят, 3 - отменен, 4 - завершен
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

    public static function getCurrentMonthOrders()
    {
        return self::whereMonth('created_at', Carbon::now()->month)
            -> get();
    }

    public static function getCurrentMonthSumm()
    {
        $orders = self::getCurrentMonthOrders();
        $summ = 0;
        foreach ($orders as $order)
        {
            $summ += $order -> summ;
        }
        return $summ;
    }

    public static function getTotalAmount()
    {
        $orders = self::all();
        $summ = 0;
        foreach ($orders as $order)
        {
            $summ += $order -> summ;
        }
        return $summ;
    }
}

