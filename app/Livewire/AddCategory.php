<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class AddCategory extends Component
{
    public $category;
    public $message;
    protected $rules = [
        'category' => 'required|string',
    ];
    public function save(){
        $this->validate();
        $category = new Category;
        $category->name = $this->category;
        $category->save();
        $this->message = "Your category has been saved successfully.";
        $this->category = "";
    }
    public function render()
    {
        return view('livewire.add-category')
                ->layout('components.layouts.admin');
    }
}
