<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        foreach ($categories as $category)
        {
            echo $category -> title.': ';
            echo '<hr>';
            foreach ($category -> products as $product)
            {
                echo $product -> title;
                echo '<br>';
            }

        }

    }
}
