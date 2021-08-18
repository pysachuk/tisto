<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        if(!isset($_COOKIE['cart_id']))
        {
            setcookie('cart_id', uniqid());
        }
        \Cart::session($_COOKIE['cart_id']);
    }
    public function index(Request $request)
    {
        $cart_items = \Cart::getContent();
        return view('shop.cart.index', compact('cart_items'));

    }
    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request -> id) -> first();
        \Cart::add([
            'id' => $product -> id,
            'name' => $product -> title,
            'price' => $product -> price,
            'quantity' => (int)$request -> qty,
            'attributes' => [
                'img' => $product -> image -> image ? $product -> image -> image : ''

            ]
        ]);
        return response() -> json([
            'OK' => 1,
            'count' => \Cart::getTotalQuantity()
        ]);
    }
    public function removeItem(Request $request)
    {
        $product_id = $request -> product_id;
        \Cart::remove($product_id);
        return response() -> json(
            ['OK' => 1,
            'cart_total' => \Cart::getTotal(),
            'count' => \Cart::getTotalQuantity()
            ]);
    }
    public function addCount(Request $request)
    {
        $product = \Cart::get($request -> product_id);
        if(\Cart::update($request -> product_id, ['quantity' => 1]))
            return response() -> json([
                'OK' => 1,
                'cart_total' => \Cart::getTotal(),
                'quantity' => $product -> quantity,
                'total' => ($product -> price * $product -> quantity),
        ]);
    }
    public function minusCount(Request $request)
    {
        $product = \Cart::get($request -> product_id);
        if(\Cart::update($request -> product_id, ['quantity' => -1]))
            return response() -> json([
                'OK' => 1,
                'cart_total' => \Cart::getTotal(),
                'quantity' => $product -> quantity,
                'total' => ($product -> price * $product -> quantity),
            ]);
    }
}
