<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreatePost extends Component
{
    use WithFileUploads;
    public $title; 
    public $description;
    public $image;
    

    public $rules = [
        'image' => 'required|image|max:10000',
        'title' => 'required| max:255',
        'description' => 'required|max:255'
    ];
    // File is an image that is < 10mb

    
    public function store()
    {

        $this->validate();

  

        $uniqueFileName = Str::uuid()->toString() . '.' . $this->image->getClientOriginalExtension();
        
         $this->image->storeAs('public', $uniqueFileName);

 
       
       $post = Post::create([
            'title'=> $this->title,
            'description' => $this->description,
            'image'=> $uniqueFileName,
            'user_id'=> auth()->user()->id,

   ]);
        
        // Redirect or send back success message
        $this->image->delete();
        return redirect()->route('user.index', auth()->user()->username);
    }

    public function render()
    {
        return view('livewire.create-post');
    }


}
