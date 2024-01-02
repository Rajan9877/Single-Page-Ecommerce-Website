<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function logout(){
        Session::flush();
        $this->redirect('/login', navigate: true);
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
