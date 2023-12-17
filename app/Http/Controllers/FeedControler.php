<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedControler extends Controller
{
    public function index() 
    {
        return view('layouts.feed');
    }
}
