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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this -> categoryRepository -> all();
        return view('shop.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> categoryRepository -> store($request);
        return redirect() -> route('admin.category.index') -> with('message', 'Категория успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this -> categoryRepository -> getCategory($id);
        return view('shop.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this -> categoryRepository -> getCategory($id);
        $category -> delete();
        return redirect() -> route('admin.category.index') -> with('info', 'Категорію виделено');
    }
}
