<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{   public $errorMessage;
    public $loginInput;
    public $password;
    public function render()
    {
        return view('livewire.login-form');
    }

    public function login()
    {
       $field = filter_var($this->loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($this->loginInput) ? 'phone' : 'username');

       $user = \App\Models\User::where($field, $this->loginInput)->first();

       if ($user && Hash::check($this->password, $user->password)) {
           Auth::login($user);
           return redirect()->intended(route('feed')); 
       } else {
        $this->errorMessage = 'Invalid credentials. Please check your information.';
           
       }
    }
}
