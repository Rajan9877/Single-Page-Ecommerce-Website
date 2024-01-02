<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{
    public $title = "E-Commerce - About";
    public function render()
    {
        return view('livewire.about');
    }
}
