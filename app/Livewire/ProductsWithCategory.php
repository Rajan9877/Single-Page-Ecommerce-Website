<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductsWithCategory extends Component
{
    public $products;
    public $category;
    public function mount(Request $request){
        $this->products =  Product::with('category')->where('category_id', intval($request->input('id')))->get();
        $this->category =  Category::where('id', intval($request->input('id')))->first();
    }
    public function render()
    {
        return view('livewire.products-with-category');
    }
}
