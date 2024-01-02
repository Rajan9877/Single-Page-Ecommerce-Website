<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Models\Product;

class AddProduct extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $price;
    public $img;
    public $category;
    public $categories;
    public $message;
    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'required|string',
    ];
    public function mount(){
        $this->categories = Category::all();
    }
    public function save(){
        $this->validate();
        $image_name = $this->img->storePublicly('img', 'public');
        $product = new Product;
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->img = $image_name;
        $product->category_id = $this->category;
        $product->save();
        $this->message = "Your product has been added successfully.";
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->img = '';
        $this->category = '';
    }
    public function render()
    {
        return view('livewire.add-product')
               ->layout('components.layouts.admin');
    }
}
