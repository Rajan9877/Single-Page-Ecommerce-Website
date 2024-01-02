<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\ShippingAddress;

class AdminOrderItems extends Component
{
    public $orderitems;
    public $msg;
    public $orderid;
    public function mount(Request $req){
        $this->orderid = (int)$req->input('orderid');
        $this->orderitems = OrderItem::with(['order', 'product'])
        ->where('order_id', $this->orderid)
        ->orderBy('created_at', 'desc')
        ->get();
    }
    public function boot(){
        $this->orderitems = OrderItem::with(['order', 'product'])
        ->where('order_id', $this->orderid)
        ->orderBy('created_at', 'desc')
        ->get();
    }
    public function confirmorder($orderitemid){
        $orderitem = OrderItem::find($orderitemid);
        $orderitem->status = 1;
        $orderitem->save();
        $this->msg = "Order has been confirmed successfully.";
    }
    public function completeorder($orderitemid){
        $orderitem = OrderItem::find($orderitemid);
        $orderitem->status = 2;
        $orderitem->save();
        $this->msg = "Order has been completed successfully.";
    }
    public function cancelorder($orderitemid){
        $orderitem = OrderItem::find($orderitemid);
        $orderitem->status = -1;
        $orderitem->save();
        $this->msg = "Order has been cancelled successfully.";
    }
    public function deleteorder($orderitemid){
        $orderitem = OrderItem::with('order')->where('id', $orderitemid)->first();
        $userid = $orderitem->order->user_id;
        $shipping_address = ShippingAddress::where('user_id', $userid)->first();
        $shipping_address->delete();
        $orderitem->delete();
        $orderitem->order->delete();
        $this->msg = "Order has been deleted successful.";
    }
    public function updatemsg(){
        $this->msg = '';
    }
    public function render()
    {
        return view('livewire.admin-order-items')
        ->layout('components.layouts.admin');
    }
}
