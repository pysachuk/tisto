<?php

namespace App\Repositories\Interfaces;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

interface CategoryRepositoryInterface
{
    public function all();
    public function getCategoryProducts($cat_id);
    public function store(StoreCategoryRequest $request);
    public function getCategory($id);
    public function updateCategory(UpdateCategoryRequest $request , $id);
    public function deleteCategory($id);

}
