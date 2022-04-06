<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRole extends Model
{
    use HasFactory;

    public const LOCATION_SVITIAZ = 1;
    public const LOCATION_LUBOML = 2;

    protected $fillable = [
        'user_id',
        'role',
        'location_key'
    ];

    public function location()
    {
        return $this->hasOne(Location::class, 'key', 'location_key');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getRoles()
    {
        return ['admin', 'manager'];
    }

    public static function getLocationName($locationNumber)
    {
        $locations = self::getLocations();

        return $locations[$locationNumber] ?? null;
    }

    public function getRoleNameAttribute()
    {
        return $this->role == 'manager' ? 'Менеджер' : 'Адмін';
    }

    public static function getLocations()
    {
        return [
            1 => 'Світязь',
            2 => 'Любомль'
        ];
    }
}
