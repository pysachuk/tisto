<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use App\Services\Cart\CartService;
use App\Services\DbCartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    protected $dbCartService;

    public function __construct(CartService $cartService, DbCartService $dbCartService)
    {
        $this->dbCartService = $dbCartService;
        $this->cartService = $cartService;
        $this->cartService->init();
    }

    public function index()
    {
        $header_image = Page::getHeaderImage('main');
//        $cart_items = $this->cartService->getUserCart();
//        dd($this->dbCartService->getProducts());
        $cart_items = $this->dbCartService->getProducts();

        return view('shop.cart.index', compact('cart_items', 'header_image'));

    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $this->cartService->addToCart($product, $request->qty);
        $this->dbCartService->addProduct($product);

        return response()->json([
            'OK' => true,
            'count' => $this->cartService->getCartTotalQuantity()
        ]);
    }

    public function removeItem(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $this->cartService->removeCartItem($request->product_id);
        $this->dbCartService->removeProduct($product);

        return response()->json(
            ['OK' => true,
                'cart_total' => $this->cartService->getCartTotal(),
                'count' => $this->cartService->getCartTotalQuantity()
            ]);
    }

    public function editCount(Request $request)
    {
        $product = $this->cartService->getCartProduct($request->product_id);
        if ($this->cartService->editCartProductQuantity($request->product_id, $request->operation))
            return response()->json([
                'OK' => true,
                'cart_total' => $this->cartService->getCartTotal(),
                'quantity' => $product->quantity,
                'total' => ($product->price * $product->quantity),
            ]);
    }
}
