<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $comment;
    public $user_id;
    public $post_id;

    public function render()
    {
        $comments = Comment::where('post_id', $this->post_id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        
        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }

    public $rules = [
        'comment' => 'required|max:255'
    ];

    public function store()
    {
        $user_id = auth()->id();
        
        $this->validate();
        Comment::create([
            'user_id'=> $user_id,
            'post_id' => $this->post_id,
            'comment' => $this->comment,
        ]);

        $this->comment = '';
    }
}
