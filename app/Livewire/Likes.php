<?php

namespace App\Livewire;
use App\Models\Like;
use Livewire\Component;

class Likes extends Component
{

    public $post;
    public $user_id;

    public function render()
    {
        return view('livewire.likes');

    }

    public function store()
    {
        Like::create([
            'post_id'=> $this->post->id,
            'user_id' => auth()->id(),
        ]);
    }

    public function destroy () {
        Like::where('post_id', $this->post->id)
        ->where('user_id', auth()->id())
        ->delete();
            
    }
}
