<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscribe;

class EcommerceSubscribe extends Component
{
    public $email;
    public $subsmsg;
    protected $rules = [
        'email' => 'required|email',
    ];
    public function save(){
        $this->validate();
        $issubscribe = Subscribe::where('email', $this->email)->first();
        if($issubscribe){
            $this->subsmsg="You are already subscribed!";
            $this->email = "";
        }else{
            $subscribe = new Subscribe;
            $subscribe->email = $this->email;
            $subscribe->save();
            $this->subsmsg = "You have subscribed for email subscription.";
            $this->email = "";
        }
    }
public function updatesubsmsg(){
        $this->subsmsg = "";
    }
    public function render()
    {
        return view('livewire.ecommerce-subscribe');
    }
}
