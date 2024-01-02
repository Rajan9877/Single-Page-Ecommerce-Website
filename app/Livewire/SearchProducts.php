<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SearchProducts extends Component
{
    public $recievedata;
    public $products;
    public function mount(Request $req){
        $this->recievedata = $req->input('search');
        $this->products=DB::table('products')->where('name','LIKE','%'.$this->recievedata."%")->get();

        // $this->products = Product::where('name', '%'.$this->recievedata.'%')->get();
    }
    public function render()
    {
        return view('livewire.search-products');
    }
}
