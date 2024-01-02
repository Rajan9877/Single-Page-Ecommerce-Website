<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class MakeAdmin extends Component
{
    public $users;
    public $userid;
    public $makeadminmsg;
    public function mount(){
        $this->users = User::all();
    }
    public function updateadmin(){
        $user = User::find(intval($this->userid));
        if($user->admin == 1){
            $this->makeadminmsg = "You are already an admin.";
        }
        else{
            $user->admin = 1;
            
            $user->save();
    
            $this->makeadminmsg = "Congrats! Selected User Made Admin Successfully.";
        }
    }
    public function updatemakeadminmsg(){
        $this->makeadminmsg = "";
    }
    public function render()
    {
        return view('livewire.make-admin')
                ->layout('components.layouts.admin');
    }
}
