<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\DbCartService;

class TestController extends Controller
{
    protected $cartService;

    public function __construct(DbCartService $cartService)
    {

        $this->cartService = $cartService;
    }

    public function index()
    {
//        $product = Product::findOrFail(1);
//        $this->cartService->addProduct($product);
////        dd($this->cartService->minusProductCount($product));
////        $this->cartService->addProduct($product);
////        dd($this->cartService->removeProduct($product));
////        $product = Product::findOrFail(1);
//        dd($this->cartService->getProducts()[0]->product);
//        dd($this->cartService->getCart());
//        dd($this->cartService->getProductsCount());
    }

    public function test()
    {
        dd($this->cartService->getUuid());
    }
}
