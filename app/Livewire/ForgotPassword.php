<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Resend\Laravel\Facades\Resend;


class ForgotPassword extends Component
{
    public $email;

    

    protected $rules = [
        'email' => "required|email|exists:users,email",
    ];

    public function render()
    {
        return view('livewire.forgot-password');
    }

    public function store()
    {
        $this->validate();
        
        $token = Str::random(64);
        $resetUrl = route('forgot-password.index')."/".$token;

        $existingToken = DB::table('password_reset_tokens')
                    ->where('email', $this->email)
                    ->first();

        if($existingToken){
            DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->update(['token' => $token, 'created_at' => now()]);
        }else {    
            DB::table('password_reset_tokens')->insert([
                'email'=> $this->email,
                'token' => $token,
                'created_at' => now() 
            ]);
        }
            

        
        Resend::emails()->send([
            'from' => 'Photoverse <onboarding@resend.dev>',
            'to' => [$this->email],
            'subject' => 'Password Reset',
            'html' => "<!DOCTYPE html>
            <html>
            <head>
                <title>Password Reset</title>
                <style>
                    /* Estilos generales */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
            
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
            
                    h1 {
                        font-size: 24px;
                        margin-bottom: 20px;
                    }
            
                    p {
                        margin-bottom: 20px;
                    }
            
                    .reset-link {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        text-decoration: none;
                        border-radius: 4px;
                    }
            
                    .reset-link:hover {
                        background-color: #0056b3;
                    }

                    .reset-link,
                    .reset-link:hover,
                    .reset-link:visited,
                    .reset-link:active {
                        color: #ffffff !important;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Password Reset</h1>
                    <p>Click the following link to reset your password:</p>
                    <p><a class='reset-link' href='{$resetUrl}'>Reset Password</a></p>
                </div>
            </body>
            </html>",
        ]);
       



    }
}
