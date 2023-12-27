<?php

namespace App\Livewire;

use App\Models\Notification;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;
    public $user;
    public $unreadNotificationsCount;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->notifications = $this->user->notifications()->orderBy('created_at', 'desc')->limit(8)->get();
        $this->unreadNotificationsCount = $this->notifications->whereNull('read_at')->count();
        
    }

    public function render()
    {
        
        return view('livewire.notifications');
    }

    public function markAsRead()
    {
        if ($this->unreadNotificationsCount) {
         
            Notification::where('user_id', $this->user->id)->whereNull("read_at")->update(["read_at" => now()]);

            $this->unreadNotificationsCount = 0;
        }
    }

    public function destroy()
    {
        $this->user->notifications()->delete();
        $this->mount();
    }
}
