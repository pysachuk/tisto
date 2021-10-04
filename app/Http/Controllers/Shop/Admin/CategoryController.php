<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('shop.admin.category.index', compact('categories'));
    }


    public function create()
    {
        return view('shop.admin.category.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->store($request);

        return redirect()->route('admin.category.index')
            ->with('message', ['type' => 'success', 'message' => __('messages.category_added')]);
    }


    public function edit($id)
    {
        $category = $this->categoryRepository->getCategory($id);

        return view('shop.admin.category.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        if ($this->categoryRepository->updateCategory($request, $id))
            return redirect()->route('admin.category.index')
                ->with('message', ['type' => 'info', 'message' => __('messages.category_updated')]);
    }


    public function destroy($id)
    {
        if ($this->categoryRepository->deleteCategory($id))
            return redirect()->route('admin.category.index')
                ->with('message', ['type' => 'info', 'message' => __('messages.category_deleted')]);
    }
}
