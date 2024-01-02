<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminLogin extends Component
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
            if($user->admin == 1){
                $random = rand(1,100);
                Session::put('random', $random);
                $this->redirect('/admin', navigate: true);
            }
            }else{
                $this->addError('failed', 'Invalid credentials!');
            }
    }
    public function render()
    {
        return view('livewire.admin-login')
                ->layout('components.layouts.adminlogin');
    }
}
