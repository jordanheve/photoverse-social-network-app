<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Notification;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $comment;
    public $post;

    public function render()
    {
       

        $comments = Comment::where('post_id', $this->post->id)
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

         //store comment notification
        if($this->post->user_id !== $user_id){

            
            $existingNotification = Notification::where('type', 'comment')
            ->where('user_id', $this->post->user_id)
            ->first();
            
            
            if($existingNotification)
            {
                $existingNotification->data = json_encode([
                    "post_id" => "$this->post->id",
                    
                    "message" => auth()->user()->username."and some others commented your post: ".$this->post->title,
                ]);
                $existingNotification->save();
            } else {
                Notification::create([
                    'user_id' => $this->post->user_id,
                    'type' => 'comment',
                    'data' => json_encode(
                        
                        [
                            'post_id' => $this->post->id,
                            "message" => auth()->user()->username." commented your post: ".$this->post->title,
                            ]
                        ),
                        'read_at' => null,
                    ]);
                }
            }
 
         //store comment

        
        $this->validate();
        Comment::create([
            'user_id'=> $user_id,
            'post_id' => $this->post->id,
            'comment' => $this->comment,
        ]);

        $this->comment = '';
    }
}
