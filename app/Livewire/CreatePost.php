<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $title; 
    public $description;
 
    public $image;
    public function store()
    {
        
    }

    public function render()
    {
        return view('livewire.create-post');
    }


}
