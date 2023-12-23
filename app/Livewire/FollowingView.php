<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FollowingView extends Component
{
    use WithPagination;
    public $user;
    
    protected $listeners = ['refreshFollowings' => 'refreshFollowings'];

    public function refreshFollwings()
    {
        $this->user = User::findOrFail($this->user->id);
    }

    public function mount($userId)
    {
        $this->user = User::findOrFail($userId);
    }
    
    public function render()
    {
        $followings = $this->user->followings()->latest()->paginate(10);
        return view('livewire.following-view', ['followings' => $followings]);
    }


    public function store($follower_id)
    {
        if(auth()->id()=== $this->user->id)
        { 
            $this->dispatch('updateFollowingsCount');
        }
        User::find($follower_id)->followers()->attach(auth()->id());
    }
    
    
    
    public function delete($follower_id)
    {   
        if(auth()->id()=== $this->user->id)
        { 
            $this->dispatch('updateFollowingsCount');
        }

        User::find($follower_id)->followers()->detach(auth()->id());
       
    }
}
