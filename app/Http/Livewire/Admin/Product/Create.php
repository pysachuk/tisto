<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $categories;
    public $category_id;
    public $title;
    public $description;
    public $price;
    public $weight;
    public $image;

    protected $rules = [
        'category_id' => ['required', 'exists:categories,id'],
        'title' => ['required', 'string', 'min:3', 'max:190'],
        'description' => ['required', 'string', 'min:3', 'max:190'],
        'price' => ['required', 'numeric', 'min:1'],
        'weight' => ['sometimes', 'numeric', 'numeric', 'min:1'],
        'image' => ['required', 'image', 'max:10240'],
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function mount()
    {
        $this->categories = Category::get();
        $this->category_id = $this->categories->first()->id ?? null;
    }

    public function save()
    {
        $productService = resolve(ProductService::class);
        if($productService->create($this->validate())) {
            return redirect()->route('admin.products')->with('success', 'Товар успішно створено');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.create')
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
