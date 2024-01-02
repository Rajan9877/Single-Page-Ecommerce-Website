<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class UserAccount extends Component
{
    public $msg;
    public $orders;
    public function mount(){
        $userid = Session::get('userid');
        $this->orders = OrderItem::with(['order', 'product'])
        ->whereHas('order', function ($query) use ($userid) {
            $query->where('user_id', $userid);
        })
        ->orderBy('created_at', 'desc')
        ->get();
       
    }
    public function boot(){
        $userid = Session::get('userid');
        $this->orders = OrderItem::with(['order', 'product'])
        ->whereHas('order', function ($query) use ($userid) {
            $query->where('user_id', $userid);
        })
        ->orderBy('created_at', 'desc')
        ->get();    
    }
    public function cancelorder($orderitemid){
        $orderitem = OrderItem::find($orderitemid);
        $orderitem->status = -1;
        $orderitem->save();
        $this->msg = "Order has been cancelled successfully.";
    }
    public function updatemsg(){
        $this->msg = '';
    }
    public function render()
    {
        return view('livewire.user-account');
    }
}
