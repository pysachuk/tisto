<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

interface ProductRepositoryInterface
{
    public function all();

    public function store(StoreProductRequest $request);

    public function getCategoryProducts($category_id);

    public function getProduct($id);

    public function update(StoreProductRequest $request, $id);
}
