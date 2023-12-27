<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsView extends Component
{   
    public $email;
    public $phone;
    public $password;
    public $new_password;
    public $new_password_repeat;

    public function mount()
   {
        $user = Auth::user();
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->password = "";
        $this->new_password = "";
        $this->new_password_repeat = "";
   }

   public function profileRules()
   {
    return [
        "email" => [
            'required',
                Rule::unique('users', 'email')->ignore(Auth::id()),
               'email'
            ],
         "phone" => [
            'required',
                Rule::unique('users', 'phone')->ignore(Auth::id()),
               'numeric',
               'min:10'
            ],
        
    ];
    
   }

   public function passwordRules ()
   {
    return [
        'password' => 'required', 
        'new_password' => 'required|min:8', 
        'new_password_repeat' => 'required|same:new_password', 
    ];
   }

   public function updateUser()
   {
        $this->validate($this->profileRules());
        $user = User::find(auth()->user()->id);
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->save();

        $this->dispatch('updatedProfile');
   }

   public function updatePassword()
   {
        $this->validate($this->passwordRules());

        if (!Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'Incorrect password , try again.');
            return;
        }

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($this->new_password);
        $user->save();
        $this->password = '';
        $this->new_password = '';
        $this->new_password_repeat = '';

        $this->dispatch('updatedPassword');
   }


    public function render()
    {
        return view('livewire.settings-view');
    }
}
