<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function home() {
        return view('homepage');
    }

    public function contactPage() {
        return '
        <h1>Welcome to the Contact Page.</h1>
        <br />
        <a href="/">Home</a>
        ';
    }
}
