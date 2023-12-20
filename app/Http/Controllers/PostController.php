<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function create()
{
    return view('layouts.create');
} 

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        //remove image from storage

        $image_path = public_path('storage/uploads/'.auth()->id().'/'.$post->image);

        if(File::exists($image_path)){
            unlink($image_path);
        }

        return redirect()->route('user.index', auth()->user()->username);
    }
}
