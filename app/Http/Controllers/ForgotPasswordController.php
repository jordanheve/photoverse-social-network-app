<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('layouts.forgot-password-view');
        
       
       
    }

    public function passwordReset($token)
    {   
        return view ('auth.password-token',['token'=>$token]);
       
    }
}
