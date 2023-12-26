<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;
    public $user;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->notifications = $this->user->notifications()->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        
        return view('livewire.notifications');
    }
}
