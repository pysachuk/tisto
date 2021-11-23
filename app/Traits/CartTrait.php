<?php

namespace App\Traits;

use App\Models\Product;
use App\Services\Cart\CartService;

trait CartTrait
{
    protected CartService $cartService;

    public $cartItems;
    public $cartCount;
    public $cartTotal;


    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->cartService = new CartService();
        $this->cartItems = $this->cartService->getProducts();
        $this->cartTotal = $this->cartService->getTotal();
        $this->cartCount = $this->cartService->getCount();
    }

    public function refresh()
    {
        $this->cartCount = $this->cartService->getCount();
        $this->cartItems = $this->cartService->getProducts();
        $this->cartTotal = $this->cartService->getTotal();
        $this->refreshTotal();
    }

    public function add(Product $product)
    {
        if( $product->available ) {
            $this->cartService->addProduct($product);
            $this->refresh();
            $this->emit('update');
            $this->emit('addedToCart');
        }
    }

    public function minus(Product $product)
    {
        $this->cartService->minusProductCount($product);
        $this->refresh();
        $this->emit('update');
    }

    public function removeProduct(Product $product)
    {
        $this->cartService->removeProduct($product);
        $this->refresh();
        $this->emit('update');
    }

    public function refreshTotal()
    {
        $sum = 0;
        $products = $this->cartService->getProducts();
        foreach ($products as $product)
        {
            $sum += $product->quantity * $product->product->price;
        }
        $this->cartTotal = $sum;

        return $this->cartTotal;
    }
}
