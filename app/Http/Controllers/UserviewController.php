<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserviewController extends Controller
{
    public function index(User $user) 
    {
            return view('layouts.user-view', [
                'user' => $user,
            ]);
    }
}
