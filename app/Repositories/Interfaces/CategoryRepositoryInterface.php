<?php

namespace App\Repositories\Interfaces;
use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function all();
    public function getCategoryProducts($cat_id);
    public function store(Request $request);
    public function getCategory($id);

}
