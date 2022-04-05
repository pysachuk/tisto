<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories;
    public $category_id;
    public $title;
    public $description;
    public $price;
    public $weight;
    public $image;
    public $newImage;

    protected $rules = [
        'category_id' => ['required', 'exists:categories,id'],
        'title' => ['required', 'string', 'min:3', 'max:190'],
        'description' => ['required', 'string', 'min:3', 'max:190'],
        'price' => ['required', 'numeric', 'min:1'],
        'weight' => ['sometimes', 'numeric', 'numeric', 'min:1'],
        'newImage' => ['sometimes', 'nullable', 'image', 'max:10240'],
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function mount(Product $product)
    {
        $this->categories = Category::get();
        $this->product = $product;
        $this->category_id = $product->category_id ?? $this->categories->first()->id ?? null;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->weight = $product->weight;
        $this->image = $product->image->image;

    }

    public function save()
    {
        $productService = resolve(ProductService::class);
        $product = $productService->update($this->product, $this->validate());
        if($product) {
            return redirect()->route('admin.products', ['selectedCategoryId'=> $product->category_id])
                ->with(['message' => ['type' => 'info', 'message' => 'Товар успішно оновлено']]);
        }
    }

    public function render()
    {
        return view('livewire.admin.product.edit')
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
