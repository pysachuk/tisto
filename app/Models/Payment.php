<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const PAYMENT_METHOD_MONEY = 1;
    const PAYMENT_METHOD_CC = 2;

    protected $fillable = ['order_id', 'status', 'json'];

    public static function getPayment($order_id)
    {
        return Payment::where('order_id', $order_id)->first();
    }
}
