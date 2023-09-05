<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show Create post form
    public function create()
    {
        return view('create_post_form');
    }
}
