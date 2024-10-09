<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Mockery\Undefined;

#[Layout('layouts.admin')]
class Products extends Component
{
    use WithFileUploads;

    public $categoryName;
    public $categories=[];
    public $categoryId;
    public $products=[];
    public $productName;
    public $productPhoto;
    public $productDesc;
    public $productQuantity;
    public $productPrice;

    public function createCategory()
    {
        Category::create([
            'name' => $this->categoryName
        ]);

        redirect()->route('admin.products');
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function createProduct()
    {
        $array = explode('.', $this->productPhoto->getClientOriginalName());
        $generateNewName = time().'-'.Str::slug(reset($array)).'.'.end($array);
        $this->productPhoto->storeAs(path: 'public/images/product', name: $generateNewName);

        Product::create([
            'category_id' => $this->categoryId,
            'name' => $this->productName,
            'photo' => $generateNewName,
            'desc' => $this->productDesc,
            'quantity' => (int)$this->productQuantity,
            'price' => $this->productPrice,
        ]);

        redirect()->route('admin.products');
    }

    public function mount()
    {
        $this->categories = Category::all();
        if (!empty($this->categories[0])) {
            $this->categoryId = $this->categories[0]['id'];
        }

        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.pages.admin.products');
    }
}
