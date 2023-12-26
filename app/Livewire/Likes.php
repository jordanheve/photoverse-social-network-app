<?php

namespace App\Livewire;
use App\Models\Like;
use Livewire\Component;
use App\Models\Notification;

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
        

        //store like  notification
        $existingNotification = Notification::where('type', 'like')
        ->where('user_id', $this->post->user_id)
        ->first();

        if($existingNotification)
        {
            $existingNotification->data = json_encode([
                    "post_id" => "$this->post->id",
                    
                    "message" => auth()->user()->username."and some others liked your post: ".$this->post->title,
                ]);
            $existingNotification->save();
        } else {
            Notification::create([
                'user_id' => $this->post->user_id,
                'type' => 'like',
                'data' => json_encode(

                    [
                        'post_id' => $this->post->id,
                        "message" => auth()->user()->username." liked your post: ".$this->post->title,
                    ]
                ),
                'read_at' => null,
            ]);
        }



        //store like
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
