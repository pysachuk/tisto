<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function getPage(Request $request)
    {
        if(isset($request -> page) && $request -> page == 'info')
        {
            $data = Page::getPage('info');
            return view('shop.admin.page.info_page_edit.info', compact('data'));
        }
        if(isset($request -> page) && $request -> page == 'contacts')
        {
            $data = Page::getPage('contacts');
            return view('shop.admin.page.info_page_edit.contacts', compact('data'));
        }
    }

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
            return redirect() -> back() -> with('success', 'Нове зображення збережено');
        }
        else
            return redirect() -> back() -> with('success', 'Збережено');
    }

    public function infoEdit()
    {
        return view('shop.admin.page.info');
    }

    public function infoUpdate(Request $request)
    {
        if($request -> file('image'))
        {
            $image_url = Storage::disk('public')
                ->putFile('pages/info/', $request->file('image'), 'public');
            Page::updateImage($request -> page, $image_url);
        }
        Page::updateText($request -> page, $request -> text);
        return redirect() -> back() -> with('success', 'Збережено');
    }
}
