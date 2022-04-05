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
    protected $queryString = ['selectedCategoryId'];

    public $categories;
    public $products;
    public $selectedCategoryId;

    protected $listeners = ['categorySelected', 'delete'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->selectedCategoryId = $this->selectedCategoryId ?? $this->categories->first()->id;
        $this->loadCategoryProducts();
    }

    public function loadCategoryProducts()
    {
        $this->products = Category::find($this->selectedCategoryId)->products;
    }

    public function categorySelected(int $id)
    {
        $this->selectedCategoryId = $id;
        $this->loadCategoryProducts();
    }

    public function deleteConfirm(Product $product)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Ви впевнені?',
            'text' => '',
            'id' => $product->id,
        ]);
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        $this->loadCategoryProducts();
    }

    public function render()
    {
        return view('livewire.admin.products')
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
