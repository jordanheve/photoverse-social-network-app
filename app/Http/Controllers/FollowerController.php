<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function index(){
        return view('layouts.followers');
    }
}
