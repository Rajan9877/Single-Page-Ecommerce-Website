<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserMessages;

class Contact extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $subject;
    public $message;
    public $response;
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|regex:/^[0-9]{10}$/',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];
    public function contact()
    {
        $this->validate();
        $usermessage = new UserMessages;
        $usermessage->name = $this->name;
        $usermessage->email = $this->email;
        $usermessage->mobile = $this->mobile;
        $usermessage->subject = $this->subject;
        $usermessage->message = $this->message;
        $usermessage->save();
        $this->response = "Your message has been sent successfully.";
        $this->name = "";
        $this->email = "";
        $this->mobile = "";
        $this->subject = "";
        $this->message = "";
    }
    public function updateResponse(){
        $this->response = "";
    }
    public function render()
    {
        return view('livewire.contact');
    }
}
