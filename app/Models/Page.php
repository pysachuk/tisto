<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public static function getHeaderImage($page)
    {
        $data = json_decode(self::where('page', $page) -> select('data_json') -> first() -> data_json);
        return $data -> header_image;
    }

    public static function updateHeaderImage($page, $image_url)
    {
        $page = self::where('page', $page) -> first();
        $json = json_decode($page -> data_json);
        $json -> header_image = $image_url;
        $json = json_encode($json);
        $page -> data_json = $json;
        return $page -> save();
    }
}
