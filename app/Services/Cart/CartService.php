<?php
namespace App\Services\Cart;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartService
{
    public function init()
    {
        if(! session('cart_id'))
            session(['cart_id' => uniqid()]);
    }

    public function getUserCart()
    {
        return Cart::session(session('cart_id')) -> getContent();
    }

    public function addToCart(Product $product, $qty)
    {
        Cart::session(session('cart_id')) -> add([
            'id' => $product -> id,
            'name' => $product -> title,
            'price' => $product -> price,
            'quantity' => (int)$qty,
            'attributes'  => ['image' => $product -> image -> image ?: ''],
        ]);
        return true;
    }

    public function getCartTotalQuantity()
    {
        return Cart::session(session('cart_id')) -> getTotalQuantity();
    }

    public function removeCartItem($product_id)
    {
        Cart::session(session('cart_id')) -> remove($product_id);
        return true;
    }

    public function getCartTotal()
    {
        return Cart::session(session('cart_id')) -> getTotal();
    }

    public function getCartProduct($product_id)
    {
        return Cart::session(session('cart_id')) -> get($product_id);
    }

    public function editCartProductQuantity($product_id, $operation)
    {
        Cart::session(session('cart_id')) -> update($product_id, ['quantity' => $operation]);
        return true;
    }
}
