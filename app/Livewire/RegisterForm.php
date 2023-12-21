<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Component
{

    public $name;
    public $email;
    public $phone;
    public $username;
    public $password;
    public $password_confirmation;


    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'username' => [
            'required',
            'min:6',
            'unique:users',
            'no_spaces', 
        ],
        'password' => 'required|min:8',
        'password_confirmation' => 'same:password',
        'phone' => 'required|min:10|numeric|unique:users',
    ];

    public function render()
    {
        return view('livewire.register-form');
    }
    public function submit()
    {
        $this->validate();

       $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => Str::lower($this->username),
            'password' => Hash::make($this->password),
            'description' => '',
        ]);

        Auth::login($user);

        return redirect(route('user.index', $this->username));
 
    }
}
