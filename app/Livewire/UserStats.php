<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Follower;
use App\Models\Notification;

class UserStats extends Component
{
    
public $user;
    public $postCount;
    public $userFind;
    public $follower_id;
    protected $listeners = ['updateFollowingsCount' => 'updateFollowingsCount'];
    public function render()
    {
        return view('livewire.user-stats');
    }

    public $followersCount;
    public $followingCount;

    public function mount($user)
    {   $this->follower_id=  auth()->id();
        $this->userFind = User::find($user->id);
        $this->user = $user;
        $this->followersCount = $this->userFind->followers()->count();
        $this->followingCount = $this->userFind->followings()->count(); 
    }

    public function store()
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


        $this->userFind->followers()->attach($this->follower_id);
        $this->updateFollowersCount();
        
    }
    public function delete()
    {
        $this->userFind->followers()->detach($this->follower_id);
        $this->updateFollowersCount();
       
       
    }
    private function updateFollowersCount()
    {
        $this->followersCount = $this->userFind->followers()->count();
        $this->dispatch('refreshFollowers');
    }

    public function updateFollowingsCount()
    {
        $this->followingCount = $this->userFind->followings()->count(); 
    }


}

