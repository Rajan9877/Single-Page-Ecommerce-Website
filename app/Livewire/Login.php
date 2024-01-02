<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];
    public function login(){
        $this->validate();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $this->email)->first();
            Session::put('name', $user->name);
            Session::put('userid', $user->id);
            $rand = rand(1,100);
            Session::put('rand', $rand);
            $this->redirect('/', navigate: true);  
        }else{
            $this->addError('failed', 'Invalid credentials!');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
