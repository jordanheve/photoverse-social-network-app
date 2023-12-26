<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use Livewire\WithPagination;

class FollowersView extends Component
{   
    use WithPagination;
   
    public $user;


  
    protected $listeners = ['refreshFollowers' => 'refreshFollowers'];

    public function refreshFollowers()
    {
        $this->user = User::findOrFail($this->user->id);
    }

    public function mount($userId)
    {
        $this->user = User::findOrFail($userId);
    }

    public function render()
    {
        $followers = $this->user->followers()->latest()->paginate(10);
        return view('livewire.followers-view', ['followers' => $followers]);
    }



    public function store($follower_id)
    {   

        
         //store notification
 
 
         Notification::create([
            'user_id' => $this->user->id,
            'type' => 'follow',
            'data' => json_encode(

                [
                    "user_id" => auth()->id(),
                    "message" => auth()->user()->username." is following you",
                ]
            ),
            'read_at' => null,
        ]);
 
         //store follow

        
        if(auth()->id() === $this->user->id)
        { 
            $this->dispatch('updateFollowingsCount');
            $this->dispatch('refreshFollowings');
        }
        User::find($follower_id)->followers()->attach(auth()->id());
    }
    public function delete($follower_id)
    {
        if(auth()->id()=== $this->user->id)
        { 
            $this->dispatch('updateFollowingsCount');
            $this->dispatch('refreshFollowings');
        }

        User::find($follower_id)->followers()->detach(auth()->id());
       
    }



}

