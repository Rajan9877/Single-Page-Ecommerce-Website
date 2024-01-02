<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AddToCartFromWishlist extends Component
{
    public $productid;
    public $categoryid;
    public $addtocartmsg;
    public function add(){
        if(session('rand')){
            $iscart = Cart::where([
                'product_id' => $this->productid,
                'user_id' => Session::get('userid'),
            ])->first();
            if(!$iscart){
                $cart = new Cart;
                $cart->user_id = Session::get('userid');
                $cart->product_id = $this->productid;
                $cart->category_id = $this->categoryid;
                $cart->save();
                $this->addtocartmsg="Product has been added in the cart successfully.";
            }else{
                $this->addtocartmsg = "Product is already in the cart.";
            }
        }else{
            $this->addtocartmsg = "You need to login first.";
        }
    }
    public function updateAddToCartMsg(){
        $this->addtocartmsg = "";
    }
    public function render()
    {
        return view('livewire.add-to-cart-from-wishlist');
    }
}
