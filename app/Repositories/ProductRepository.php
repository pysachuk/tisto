<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function all($paginate = null)
    {
            return ($paginate) ? Product::paginate($paginate) : Product::all();

    }
    public function getCategoryProducts($category_id)
    {
        return Product::where('category_id', $category_id) -> get();
    }
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $data = $request->only($product->getFillable());
        $product->fill($data)->save();
        if($request -> file('photo'))
        {
            $photo_path = Storage::disk('public')
                -> putFile('products/product_'.$product -> id, $request->file('photo'), 'public');
            $img = ProductImage::create(
                [
                    'product_id' => $product -> id,
                    'image' => $photo_path,
                    'is_main' => 1
                ]
            ) -> save();
        }

        return $product;
    }
    public function getProduct($id)
    {
        return Product::where('id', $id) -> first();
    }
    public function update(StoreProductRequest $request, $id)
    {
        $product = $this -> getProduct($id);
        $data = $request->only($product->getFillable());
        $product->fill($data)->save();
        if($request -> file('photo'))
        {
            $photo_path = Storage::disk('public')
                -> putFile('products/product_'.$product -> id, $request->file('photo'), 'public');

            $img = ProductImage::where('product_id', $id) -> first();
            if($img)
            {
                $img -> image = $photo_path;
                $img -> save();
            }
            else
            {
                $img = new ProductImage;
                $img -> product_id = $id;
                $img -> image = $photo_path;
                $img -> is_main = 1;
                $img -> save();
            }

        }
        return $product;
    }

}
