<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Signup extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $cpassword;
    public $confirm;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required|numeric',
        'password' => 'required|min:8',
        'cpassword' => 'required|same:password',
    ];
    public function save()
    {
        $this->validate();
        $isemail = User::where('email', $this->email)->first();
        $isphone = User::where('phone', $this->phone)->first();
        if($isemail){
            $this->confirm = "Email Already Exists!";
        }else if($isphone){
            $this->confirm = "Mobile Number Already Registered!";
        }else{
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->password = $this->password;
            $user->save();
            $this->confirm = "You have signed up successfully.";
            $this->name = "";
            $this->email = "";
            $this->phone = "";
            $this->password = "";
            $this->cpassword = "";
        }
    }
    public function updateSignup(){
        $this->confirm = "";
    }
    public function render()
    {
        return view('livewire.signup');
    }
}
