<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    private $categoryRepository;
    private $productRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categories = $this -> categoryRepository -> all();
        return view('shop.admin.product.index', compact('categories'));
    }

    public function getCategoryProducts(Request $request)
    {
        $products = $this -> productRepository -> getCategoryProducts($request -> category_id);
        return view('shop.admin.product.products', compact('products'));
    }


    public function create()
    {
        $categories = $this -> categoryRepository -> all();
        return view('shop.admin.product.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
        if($this -> productRepository -> store($request))
            return redirect() -> route('admin.product.index')
                -> with('message',['type' => 'success', 'message' => __('messages.product_added')]);
    }


    public function edit($id)
    {
        $categories = $this -> categoryRepository -> all();
        $product = $this -> productRepository -> getProduct($id);
        return view('shop.admin.product.edit', compact('categories', 'product'));
    }


    public function update(StoreProductRequest $request, $id)
    {
        $this -> productRepository -> update($request, $id);
        return redirect() -> route('admin.product.index')
            -> with('message',['type' => 'success', 'message' => __('messages.product_updated')]);
    }


    public function destroy($id)
    {
        $product = $this -> productRepository -> getProduct($id);
        if($product -> delete())
            return redirect() -> route('admin.product.index')
                -> with('message',['type' => 'info', 'message' => __('messages.product_deleted')]);
    }
}
