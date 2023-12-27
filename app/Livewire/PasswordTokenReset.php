<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordTokenReset extends Component

{
    public $token;
    public $email;
    public $token_table;
    public $new_password;
    public $repeat_new_password;

    protected $rules = [
        'new_password' => 'required|min:8',
        'repeat_new_password' => 'same:new_password|required'
    ];

    public function mount()
    {
         $this->token_table = DB::table('password_reset_tokens')
                            ->where(['token'=> $this->token])->first();

                            
                            
        if ($this->token_table !== null) {
         $this->email =  $this->token_table->email;
        }else{
            $this->dispatch('error');
        }


        
    }

    public function render()
    {
        return view('livewire.password-token-reset');
    }


    public function store()
    {   
        $this->validate();
        $user = User::where('email', $this->email)->first();
        $user->password = Hash::make($this->new_password);
        $user->save();
        DB::table('password_reset_tokens')->where(['email' => $this->email])->delete();
        $this->dispatch('updatedPassword');

    }
}
