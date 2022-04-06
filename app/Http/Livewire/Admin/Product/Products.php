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
    public $search;
//    public array $available;

    protected $listeners = ['categorySelected', 'delete'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->selectedCategoryId = $this->selectedCategoryId ?? $this->categories->first()->id;
        $this->loadCategoryProducts();
    }

    public function loadCategoryProducts()
    {
        $category = Category::findOrFail($this->selectedCategoryId);
        if($this->search) {
            $this->products = $category
                ->products()
                ->where('title', "LIKE", "%$this->search%")
//                ->orWhere('description', "LIKE", "%$this->search%")
                ->get();
//            dd($category->products);
        } else {
            $this->products = Category::find($this->selectedCategoryId)
                ->products;
        }

    }

    public function updatedSearch()
    {
        $this->loadCategoryProducts();
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
            'emit' => 'delete',
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
