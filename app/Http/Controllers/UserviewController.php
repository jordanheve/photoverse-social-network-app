<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserviewController extends Controller
{
    public function index(User $user) 
    { 
        $post = Post::where('user_id', $user->id)->latest()->paginate(16);
        
        return view('layouts.user-view', [
                'user' => $user,
                'posts'=> $post,
            ]);
    }

    public function show(User $user, Post $post) 
    {
        return view ('layouts.user-post',[
            'post'=> $post,
            'user' => $user,  ]
        );
    }

}
