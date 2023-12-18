<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $title; 
    public $description;
    public $image;

    public $rules = [
        'image' => 'required|image|max:10000',
        'title' => 'required| max:255',
        'description' => 'required|max255'
    ];

    public function store()
    {
        $uniqueFileName = Str::uuid()->toString() . '.' . $this->image->getClientOriginalExtension();
        dd($uniqueFileName);
        $this->validate();
        // File is an image that is < 10mb

        // Validation Here
 
       
        $post = Post::create([
            'title'=> $this->title,
            'description' => $this->description,
            'image'=> $uniqueFileName,

        ]);
 
        // Add the file to the collection
        $post->addMedia($this->image->getRealPath())
        ->usingFileName($uniqueFileName)
        ->toMediaCollection('image');
 
        // Redirect or send back success message

    }

    public function render()
    {
        return view('livewire.create-post');
    }


}
