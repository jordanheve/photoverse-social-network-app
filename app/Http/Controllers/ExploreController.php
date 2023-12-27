<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(100)->get();

        // Verifica si hay al menos 25 posts en total
        if ($latestPosts->count() >= 25) {
            $randomPosts = $latestPosts->random(25);
        } else {
            
            $randomPosts = $latestPosts;
        }

        return view ('layouts.explore', ['posts' => $randomPosts]);
    } 

    public function refresh()
    {
         
    }
}
