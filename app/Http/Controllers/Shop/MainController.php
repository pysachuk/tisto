<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('shop.main.menu', compact('categories'));
    }
}
