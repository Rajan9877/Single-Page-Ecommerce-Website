<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderItem;

class AdminOrder extends Component
{
    public $orderitems;
    public function mount(){
        $this->orderitems = OrderItem::with('order.user')->get();
    }
    public function render()
    {
        return view('livewire.admin-order')
        ->layout('components.layouts.admin');
    }
}
