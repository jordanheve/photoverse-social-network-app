<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
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
        'description' => 'required|max:255'
    ];
    // File is an image that is < 10mb

    public function store()
    {
        

        $this->validate();

        $user_id = auth()->id();

        // Carpeta donde se almacenarán los archivos basados en el user_id
        $userFolder = 'public/uploads/' . $user_id;

        // Verificar si la carpeta existe, si no, crearla
        if (!Storage::exists($userFolder)) {
            Storage::makeDirectory($userFolder);
        }


        $uniqueFileName = Str::uuid()->toString() . '.' . $this->image->getClientOriginalExtension();
        
        $filePath = $this->image->storeAs($userFolder, $uniqueFileName);

        // Validation Here
 
       
        $post = Post::create([
            'title'=> $this->title,
            'description' => $this->description,
            'image'=> $filePath,
            'user_id'=> auth()->user()->id,

        ]);
 
 
        // Redirect or send back success message

        return redirect()->route('user.index', auth()->user()->username);
    }

    public function render()
    {
        return view('livewire.create-post');
    }


}
