<?php

namespace App\Livewire;

use Livewire\Component;
class Search extends Component
{
    public $search;
    public function searches(){
        $this->redirect('/searchproducts?search='.$this->search, navigate: true);
    }
    public function render()
    {
        return view('livewire.search');
    }
}
