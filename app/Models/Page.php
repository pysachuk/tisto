<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public static function getHeaderImage($page)
    {
        $data = self::where('page', $page)->select('data_json')->first();
        $data = ($data) ? json_decode($data->data_json) : null;

        return ($data) ? $data->header_image : null;
    }

    public static function getPage($page)
    {
        $data = self::where('page', $page)->select('data_json')->first();

        return ($data) ? json_decode($data->data_json) : null;
    }

    public static function updateHeaderImage($page, $image_url)
    {
        $page = self::where('page', $page)->first();
        if ($page) {
            $json = json_decode($page->data_json);
            $json->header_image = $image_url;
            $json = json_encode($json);
            $page->data_json = $json;

            return $page->save();
        }

        return false;

    }

    public static function updateImage($page, $image_url)
    {
        $page = self::where('page', $page)->first();
        if ($page) {
            $json = json_decode($page->data_json);
            $json->image = $image_url;
            $json = json_encode($json);
            $page->data_json = $json;

            return $page->save();
        }

        return false;

    }

    public static function updateText($page, $text)
    {
        $page = self::where('page', $page)->first();
        if ($page) {
            $json = json_decode($page->data_json);
            $json->text = $text;
            $json = json_encode($json);
            $page->data_json = $json;

            return $page->save();
        }

        return false;
    }
}
