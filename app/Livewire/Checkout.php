<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\OrderItem;
class Checkout extends Component
{   
    public $msg;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $address;
    public $country;
    public $city;
    public $state;
    public $pincode;
    public $carts;
    public $subtotal;
    protected $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email',
        'mobile' => 'required|string|max:20',
        'address' => 'required|string',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'pincode' => 'required|string|max:20',
    ];
    public function placeorder(){
        $this->validate();
        $jsonString = ''.$this->carts.'';
        $arrayData = json_decode($jsonString, true);
        if(empty($arrayData)){
            $this->msg = "Your cart is empty";
            $this->dispatch('orderplaced');
        }else{
            $userid = Session::get('userid');
            $shippingaddress = new ShippingAddress;
            $shippingaddress->user_id = $userid;
            $shippingaddress->firstname = $this->firstname;
            $shippingaddress->lastname = $this->lastname;
            $shippingaddress->email = $this->email;
            $shippingaddress->mobile = $this->mobile;
            $shippingaddress->address = $this->address;
            $shippingaddress->country = $this->country;
            $shippingaddress->city = $this->city;
            $shippingaddress->state = $this->state;
            $shippingaddress->pincode = $this->pincode;
            $shippingaddress->save();
            $order = Order::create([
                'user_id' => $userid,
                'total_amount' => $this->subtotal,
            ]);
            foreach ($this->carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                    'subtotal' => $cart->quantity * $cart->product->price,
                ]);
                $cart->delete();
            }
            $this->subtotal = 0;
            $this->msg = "Your order is placed successfully.";
            $this->dispatch('orderplaced');
        }
    }
    public function mount(){
        $userid = Session::get('userid');
        $this->carts = Cart::with('product')->where('user_id', $userid)->get();
        $this->subtotal = $this->calculateSubtotal($this->carts);
    }
    public function updatecheckout(){
        $userid = Session::get('userid');
        $this->carts = Cart::with('product')->where('user_id', $userid)->get();
        $this->subtotal = $this->calculateSubtotal($this->carts);
    }

    public function redirecthome(){
        $this->redirect('/', navigate: true);
    }

    // ... other methods

    private function calculateSubtotal($carts)
    {
        $subtotal = 0;

        foreach ($carts as $cart) {
            $subtotal += (int)$cart->product->price * $cart->quantity;
        }

        return $subtotal;
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
