<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserviewController extends Controller
{
    public function index(User $user) 
    { 
        $post = Post::where('user_id', $user->id)->paginate(16);
        
        return view('layouts.user-view', [
                'user' => $user,
                'posts'=> $post,
            ]);
    }

}
