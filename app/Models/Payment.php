<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'status', 'json'];

    public static function checkPay($order_id)
    {
        return Payment::where('order_id', $order_id) -> first();
    }
}
