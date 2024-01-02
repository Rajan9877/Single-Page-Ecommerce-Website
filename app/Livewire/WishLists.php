<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;

class WishLists extends Component
{
    public $wishlists;
    public $products;
    public $deletewishlistmsg;
    public function mount(){
        $userid = Session::get('userid');
        $this->wishlists = Wishlist::with('product')->where('user_id', $userid)->get();
    }
    public function boot(){
        $userid = Session::get('userid');
        $this->wishlists = Wishlist::with('product')->where('user_id', $userid)->get();
    }
    public function updateQuantity(){
        
    }
    public function removewishlist($pdtid){
        Wishlist::find($pdtid)->delete();
        $this->deletewishlistmsg = "Product has been removed from your wishlist.";
    }
    public function updateremovewishlist(){
        $this->deletewishlistmsg = '';
    }
    public function render()
    {
        return view('livewire.wish-lists');
    }
}
