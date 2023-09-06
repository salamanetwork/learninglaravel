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
Route::post('/user/signup', [UserController::class, "signup"]);

Route::post('/user/signin', [UserController::class, "signin"]);

Route::post('/user/signout', [UserController::class, "signout"]);


// Post routes
Route::get('/post/create', [PostController::class, "create"]);

Route::post('/post/submit', [PostController::class, "submit"]);

Route::get('/post/{post}', [PostController::class, "showSinglePost"]);
