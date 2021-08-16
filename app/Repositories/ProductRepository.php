<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }
    public function store(StoreProductRequest $request)
    {
        $product = Product::create(
            [
                'category_id' => $request-> category_id,
                'title' => $request -> title,
                'description' => $request -> description,
                'price' => $request -> price,
                'weight' => $request -> weight
            ]);
        $photo_path = Storage::disk('public')
            -> putFile('products/product_'.$product -> id, $request->file('photo'), 'public');
        $img = ProductImage::create(
            [
                'product_id' => $product -> id,
                'image' => $photo_path,
                'is_main' => 1
            ]
        ) -> save();
        return $img;
    }

}
