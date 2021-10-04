<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function getPage(GetPageRequest $request)
    {
        $data = Page::getPage($request->page);

        return view('shop.admin.page.info_page_edit.info', compact('data'));
    }

    public function mainEdit()
    {
        $image = Page::getHeaderImage('main');

        return view('shop.admin.page.main', compact('image'));
    }

    public function mainUpdate(Request $request)
    {
        if ($request->file('image')) {
            $image_url = Storage::disk('public')
                ->putFile('pages/main/', $request->file('image'), 'public');
            Page::updateHeaderImage('main', $image_url);

            return redirect()->back()
                ->with('message', ['type' => 'success', 'message' => __('messages.saved')]);
        } else
            return redirect()->back()
                ->with('message', ['type' => 'success', 'message' => __('messages.saved')]);
    }

    public function infoEdit()
    {
        return view('shop.admin.page.info');
    }

    public function infoUpdate(Request $request)
    {
        if ($request->file('image')) {
            $image_url = Storage::disk('public')
                ->putFile('pages/info/', $request->file('image'), 'public');
            Page::updateImage($request->page, $image_url);
        }
        Page::updateText($request->page, $request->text);

        return redirect()->back()
            ->with('message', ['type' => 'success', 'message' => __('messages.saved')]);
    }
}
