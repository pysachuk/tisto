<?php

namespace App\Repositories;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;

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
    public function store(StoreCategoryRequest $request)
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

    public function updateCategory(UpdateCategoryRequest $request, $id)
    {
        $category = $this -> getCategory($id);
        $category -> title = $request -> title;
        $category -> description = $request -> description;
        if($request -> file('photo')) {
            $photo_path = Storage::disk('public')
                ->putFile('categories', $request->file('photo'), 'public');
            $category -> image_url = $photo_path;
        }
        return $category -> save();
    }

    public function deleteCategory($id)
    {
//        $category = $this->getCategory($id);
        return $this->getCategory($id) -> delete();
    }
}
