<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function home() {

        // Passing Data
        $myName = "Ahmed Salama";
        $pets = ["Cat", "Dog", "Goat", "Sparrow", "Hawke"];

        // Passing Only view template
        // return view('homepage');

        // Passing the data from this controller
        // Pass As A Property
        return view('homepage', ['name' => $myName, 'pets' => $pets]);
    }

    public function contactPage() {
        return '
        <h1>Welcome to the Contact Page.</h1>
        <br />
        <a href="/">Home</a>
        ';
    }

    public function aboutPage() {
        return '
        <h1>Welcome to the About Page.</h1>
        <br />
        <a href="/">Home</a>
        ';
    }
}
