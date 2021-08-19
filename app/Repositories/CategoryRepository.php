<?php

namespace App\Repositories;
use App\Models\Category;
//use App\User;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }
    public function getCategoryProducts($cat_id)
    {
        return Category::where('id', $cat_id) -> first() -> products;
    }
    public function store(Request $request)
    {
        return Category::create(['title' => $request-> title, 'description' => $request-> description]) -> save();
    }
    public function getCategory($id)
    {
        return Category::where('id', $id) -> first();
    }
}
