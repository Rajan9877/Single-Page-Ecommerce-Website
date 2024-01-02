<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetails extends Component
{
    public $product;
    public function mount(Request $request){
        $id = $request->get('id');
        $this->product = Product::find($id);

    }
    public function render()
    {
        return view('livewire.product-details');
    }
}
