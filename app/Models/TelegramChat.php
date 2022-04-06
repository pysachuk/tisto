<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramChat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'telegram_chat_locations', 'telegram_chat_id', 'location_key', '', 'key');
    }
}
