<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get('/404', function () {
    return view('404');
});

Route::get('/', function () {
    return view('home_guest');
});

Route::get('/about', function () {
    return view('home_guest');
});

Route::get('/contact', function () {
    return view('home_guest');
});

// User routes
Route::get('/user/signup-form', [UserController::class, "signupForm"])->name("login");

Route::post('/user/signup', [UserController::class, "signup"])->middleware('guest');

Route::post('/user/signin', [UserController::class, "signin"])->middleware('guest');

Route::post('/user/signout', [UserController::class, "signout"])->middleware('mustBeSignedIn');


// Post routes
Route::get('/post/create', [PostController::class, "create"])->middleware('mustBeSignedIn');

Route::post('/post/submit', [PostController::class, "submit"])->middleware('mustBeSignedIn');

Route::get('/post/{post}', [PostController::class, "showSinglePost"]);
