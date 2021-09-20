<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        $categories = $this -> categoryRepository -> all();
        return view('shop.admin.category.index', compact('categories'));
    }


    public function create()
    {
        return view('shop.admin.category.create');
    }


    public function store(Request $request)
    {
        $this -> categoryRepository -> store($request);
        return redirect() -> route('admin.category.index') -> with('message', 'Категория успешно добавлена');
    }


    public function edit($id)
    {
        $category = $this -> categoryRepository -> getCategory($id);
        return view('shop.admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = $this -> categoryRepository -> getCategory($id);
        $category -> title = $request -> title;
        $category -> description = $request -> description;
        if($request -> file('photo')) {
            $photo_path = Storage::disk('public')
                ->putFile('categories', $request->file('photo'), 'public');
            $category -> image_url = $photo_path;
        }
        $category -> save();
        return redirect() -> route('admin.category.index') -> with('success', 'Категорію оновлено');
    }


    public function destroy($id)
    {
        $category = $this -> categoryRepository -> getCategory($id);
        $category -> delete();
        return redirect() -> route('admin.category.index') -> with('info', 'Категорію виделено');
    }
}
