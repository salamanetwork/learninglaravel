<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExampleController as ExampleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page [index]
Route::get('/', [ExampleController::class, "home"]);

// About Page [index]
Route::get('/about', [ExampleController::class, "aboutPage"]);

// Contact Page
Route::get('/contact', [ExampleController::class, "contactPage"]);
