<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public $storageService;

    public function __construct()
    {
        $this->storageService = resolve(StorageService::class);
    }

    public function create(array $data)
    {
        $data['image'] = $this->storageService->saveImage($data['image'], 'products');
        $data['weight'] =  $data['weight'] ? : null ;
        $product = Product::create($data);
        $product->image()->create(['image' => $data['image'], 'is_main' => true]);

        return $product;
    }

    public function update(Product $product, $data)
    {
        if(isset($data['newImage'])) {
            $data['image'] = $this->storageService->updateImage($data['newImage'], $product->image->image, 'products');
            $product->image()->delete();
            $product->image()->create(['image' => $data['image'], 'is_main' => true]);
            unset($data['newImage'], $data['image']);
        }

        $product->update($data);

        return $product;

    }
}
