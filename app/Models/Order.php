<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_NEW = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;

    protected $fillable = [
        'cart_id',
        'name',
        'phone',
        'address',
        'description',
        'summ',
        'status',
        'payment_method',
        'location_key'
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'key', 'location_key');
    }

    public function getCityAttribute()
    {
        return $this->location->city ?? null;
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


}

