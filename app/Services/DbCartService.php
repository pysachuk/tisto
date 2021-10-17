<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;

class DbCartService
{
    protected $cartUuid;
    protected $cart;
    public $cartTotal;

    public function __construct()
    {
        if (! session('cart_uuid')) {
            session(['cart_uuid' => Str::uuid()]);
            session()->save();
        }

        $this->cartUuid = session('cart_uuid');
        $this->setCart();
        $this->cartTotal = $this->getTotal();
    }

    public function setCart()
    {
        $cart = Cart::where('uuid', $this->cartUuid)->first();
        if(! $cart) {
            $cart = new Cart(['uuid' => $this->cartUuid]);
            $cart->save();
        }
        $this->cart = $cart;
    }

    public function addProduct(Product $product, $qty = 1)
    {
        $cartProduct = $this->cart->products()->where('product_id', $product->id)->first();
        if($cartProduct) {
            $cartProduct->increment('quantity');
        } elseif ($this->cart->products()->create([
            'product_id' => $product->id,
            'quantity' => $qty
        ])) {
            return true;
        }
    }

    public function removeProduct(Product $product)
    {
        $cartProduct = $this->cart->products()->where('product_id', $product->id)->first();
        if($cartProduct) {
            return $cartProduct->delete();
        }

        return false;
    }

    public function minusProductCount(Product $product)
    {
        $cartProduct = $this->cart->products()->where('product_id', $product->id)->first();
        if(! $cartProduct) {
            return false;
        }

        if($cartProduct->quantity <= 1) {
            return $cartProduct->delete();
        } else {
            return $cartProduct->decrement('quantity');
        }
    }

    public function getCount()
    {
        return $this->cart->products()->count();
    }

    public function getCart()
    {
        return $this->cart;
    }


    public function getProducts()
    {
        return $this->cart->products()->with('product')->get();
    }

    public function getTotal()
    {
            $sum = 0;
            $products = $this->cart->products;
            foreach ($products as $product)
            {
                $sum += $product->quantity * $product->product->price;
            }
            $this->cartTotal = $sum;

            return $this->cartTotal;
    }

    public function clearCart()
    {
        $this->cart->products()->delete();
    }

}
