<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;

class Carts extends Component
{
    public $quantity;
    public $carts;
    public $products;
    public $deletecartmsg;
    public function mount(){
        $userid = Session::get('userid');
        $this->carts = Cart::with('product')->where('user_id', $userid)->get();
        $this->quantity = $this->carts->pluck('quantity')->toArray();
    }
    public function boot(){
        $userid = Session::get('userid');
        $this->carts = Cart::with('product')->where('user_id', $userid)->get();
    }
    public function updateQuantity($productid){
        $product = Cart::where('product_id', $productid)->first();
 
        $product->quantity = $this->quantity;
         
        $product->save();
        
        $this->deletecartmsg = "Product quantity has been updated successfully.";
    }
    public function removecart($pdtid){
        Cart::find($pdtid)->delete();
        $this->deletecartmsg = "Product has been removed from your cart.";
    }
    public function updateremovecart(){
        $this->deletecartmsg = '';
    }
    public function render()
    {
        return view('livewire.carts');
    }
}
