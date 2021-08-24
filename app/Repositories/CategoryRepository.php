<?php

namespace App\Repositories;
use App\Models\Category;
//use App\User;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if($request -> file('photo'))
        {
            $photo_path = Storage::disk('public')
                -> putFile('categories', $request->file('photo'), 'public');

        return Category::create([
            'title' => $request-> title,
            'description' => $request-> description,
            'image_url' => $photo_path,
        ]) -> save();
        }
    }
    public function getCategory($id)
    {
        return Category::where('id', $id) -> first();
    }
}
