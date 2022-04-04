<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;

class MainController extends Controller
{

    public function index()
    {
        $header_image = Page::getHeaderImage('main');
        $categories = Category::get();
        $products = Product::get();

        return view('shop.main.menu', compact('categories', 'header_image', 'products'));
    }

    public function info()
    {
        $data['header_image'] = Page::getHeaderImage('main');
        $data['info'] = Page::getPage('info');
        $data['contacts'] = Page::getPage('contacts');

        return view('shop.main.info', compact('data'));
    }
}
