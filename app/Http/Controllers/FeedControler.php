<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {   
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('layouts.feed', ['posts'=> $posts]);
    }
}
