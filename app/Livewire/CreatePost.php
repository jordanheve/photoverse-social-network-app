<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    public $title; 
    public $description;

    public function store()
    {
        $files = request()->file('filepond');
    }

    public function render()
    {
        return view('livewire.create-post');
    }


}
