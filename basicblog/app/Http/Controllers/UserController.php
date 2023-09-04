<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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
        User::create($data);

        return "Signup Successfully Done!";
    }
}
