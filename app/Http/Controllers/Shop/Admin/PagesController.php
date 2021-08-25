<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function mainEdit()
    {
        $image = Page::getHeaderImage('main');
        return view('shop.admin.page.main', compact('image'));
    }

    public function mainUpdate(Request $request)
    {
        if($request -> file('image'))
        {
            $image_url = Storage::disk('public')
                ->putFile('pages/main/', $request->file('image'), 'public');
            Page::updateHeaderImage('main', $image_url);
            return redirect() -> back() -> with('message', 'Нове зображення збережено');
        }
        else
            return redirect() -> back() -> with('message', 'Збережено');
    }

    public function infoEdit()
    {

    }
}
