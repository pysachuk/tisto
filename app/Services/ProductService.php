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

        return true;
    }
}
