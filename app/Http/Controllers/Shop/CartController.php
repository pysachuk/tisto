<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        if(! session('cart_id'))
        {
            session(['cart_id' => uniqid()]);
        }
    }
    public function index()
    {
        $header_image = Page::getHeaderImage('main');
        $cart_items = \Cart::session(session('cart_id')) -> getContent();
        return view('shop.cart.index', compact('cart_items', 'header_image'));

    }
    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request -> id) -> first();
        \Cart::session(session('cart_id')) -> add([
            'id' => $product -> id,
            'name' => $product -> title,
            'price' => $product -> price,
            'quantity' => (int)$request -> qty,
            'attributes'  => ['image' => $product -> image -> image ? $product -> image -> image : ''],
        ]);
        return response() -> json([
            'OK' => 1,
            'count' => \Cart::session(session('cart_id')) -> getTotalQuantity()
        ]);
    }
    public function removeItem(Request $request)
    {
        $product_id = $request -> product_id;
        \Cart::session(session('cart_id')) -> remove($product_id);
        return response() -> json(
            ['OK' => 1,
            'cart_total' => \Cart::session(session('cart_id')) -> getTotal(),
            'count' => \Cart::session(session('cart_id')) -> getTotalQuantity()
            ]);
    }
    public function addCount(Request $request)
    {
        $product = \Cart::session(session('cart_id')) -> get($request -> product_id);
        if(\Cart::update($request -> product_id, ['quantity' => 1]))
            return response() -> json([
                'OK' => 1,
                'cart_total' => \Cart::session(session('cart_id')) -> getTotal(),
                'quantity' => $product -> quantity,
                'total' => ($product -> price * $product -> quantity),
        ]);
    }
    public function minusCount(Request $request)
    {
        $product = \Cart::session(session('cart_id')) -> get($request -> product_id);
        if(\Cart::update($request -> product_id, ['quantity' => -1]))
            return response() -> json([
                'OK' => 1,
                'cart_total' => \Cart::session(session('cart_id')) -> getTotal(),
                'quantity' => $product -> quantity,
                'total' => ($product -> price * $product -> quantity),
            ]);
    }
}
