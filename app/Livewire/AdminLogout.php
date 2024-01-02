<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
class AdminLogout extends Component
{
    public function logout(){
        Session::flush();
        $this->redirect('/adminlogin', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin-logout');
    }
}
