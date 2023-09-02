<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function home() {
        return '
        <h1>Welcome to the Example Controller Page.</h1>
        <br />
        <a href="/">Home</a>
        ';
    }

    public function contactPage() {
        return '
        <h1>Welcome to the Contact Page.</h1>
        <br />
        <a href="/">Home</a>
        ';
    }
}
