<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'description',
        'summ',
        'status'
    ];

    public function orderProducts()
    {
        return $this -> hasMany(OrderProduct::class);
    }
}

