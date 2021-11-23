<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $categories;
    public $products;
    public $selectedCategoryId;

    protected $listeners = ['categorySelected'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->products = $this->categories->first()->products ?? [];
    }

    public function categorySelected(int $id)
    {
        $this->selectedCategoryId = $id;
        $this->products = Category::find($this->selectedCategoryId)->products;
    }

    public function removeProduct(Product $product)
    {
        $product->delete();
    }

    public function render()
    {

        return view('livewire.admin.products')
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
