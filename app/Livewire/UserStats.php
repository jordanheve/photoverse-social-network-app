<?php

namespace App\Livewire;

use App\Models\Follower;
use Livewire\Component;
use App\Models\User;

class UserStats extends Component
{
    
public $user;
    public $postCount;
    public $userFind;
    public $follower_id;

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
    }



}

