<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show signup form
    public function signupForm()
    {
        return view("signup_form");
    }

    public function signup(Request $request)
    {
        // Validate the data before submitting
        $data  = $request->validate([
            'username' => ['required', 'min:3', 'max:35', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        // Store the values comming from the form to the model
        // Using Model User model
        $user = User::create($data);

        // Login the user automatically
        auth()->login($user);

        // success
        // redirect the user back to the home page
        // Setup a flash message too
        return redirect('/')->with("success", "Successfully created a new user!");
    }

    public function signin(Request $request)
    {
        $data  = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // try to authenticate
        if(auth()->attempt([
            'username' => $data['username'],
            'password' => $data['password']
        ]))
        {
            // Store the authentication information in the session/Cookie
            $request->session()->regenerate();

            // success
            // redirect the user back to the home page
            // Setup a flash message too
            return redirect('/')->with("success", "Successfully signed in!");
        }
        else
        {
            // failure
            // redirect the user back to the home page
            // Setup a flash message too
            return redirect('/')->with("failure", "Oops!, Something went wrong, please try to login again.");
        }

    }

    public function signout(Request $request)
    {
        auth()->logout();

        return redirect('/')->with("success", "Successfully signed out!");;
    }
}
