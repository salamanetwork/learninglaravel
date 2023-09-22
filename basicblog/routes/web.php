<?php


use App\Events\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;


Route::get('/404', function () {
    return view('404');
});

Route::get('/', function () {
    if(auth()->check())
        return redirect('/' . auth()->user()->username . '/feeds');
    else
    return view('home_guest');
})->name('home');


// Chat Routes
Route::post('/send-chat-message', function(Request $request) {

    // validate the message
    $data = $request->validate([
        'textvalue' => 'required',
    ]);

    // trim the message
    if(!trim(strip_tags($data['textvalue'])))
    {
        return response()->noContent();
    }

    // broadcast the message
    broadcast(new ChatMessage([
        'username' => auth()->user()->username,
        'textvalue' => strip_tags($request->textvalue),
        'avatar' => auth()->user()->avatar,
    ]))->toOthers();

    return response()->noContent();

})->middleware('mustBeSignedIn');

// Search Routes
Route::get('/search/{term}', [PostController::class, 'search']);



// home feed posts
Route::get('/{user:username}/feeds', [UserController::class, "homeFeedPosts"])->middleware('mustBeSignedIn')->name('feeds');

// User routes
Route::get('/user/signup-form', [UserController::class, "signupForm"])->name("login");

Route::post('/user/signup', [UserController::class, "signup"])->middleware('guest');

Route::post('/user/signin', [UserController::class, "signin"])->middleware('guest');

Route::post('/user/signout', [UserController::class, "signout"])->middleware('mustBeSignedIn');



// Post routes
Route::get('/post/create', [PostController::class, "create"])->middleware('mustBeSignedIn');

Route::post('/post/submit', [PostController::class, "submit"])->middleware('mustBeSignedIn');

Route::get('/post/{post}', [PostController::class, "showSinglePost"]);

// Profile routes
Route::get('/user/profile/posts', [UserController::class, "profilePosts"])->middleware('mustBeSignedIn');

// to show url with the username not user id
// Looked up by username in the database
Route::get('/user/profile/{user:username}', [UserController::class, "profile"])->middleware('mustBeSignedIn');

// Delete Post from the database
Route::delete('/post/delete/{post}', [PostController::class, 'deletePost'])->middleware('can:delete,post');

// Show Update Form For The Post
Route::get('/post/{post}/edit', [PostController::class, "edit"])->middleware('can:update,post');

// Update Post
Route::put('/post/{post}/update', [PostController::class, "update"])->middleware('can:update,post');

// Using Gates API
// 01 - Using Gate With Controller Method
// Route::get('/admins-only',function() {


//     if(Gate::allows('visitAdminPages'))
//         return "Yes, You are an Admin, that is why you can see this page!";

//     return "Sorry, you are not allowed to visit this page";
// });

// 02 - Using Gate With Middleware Method
Route::get('/admins-only',function() {
    return "Yes, You are an Admin, that is why you can see this page!";
})->middleware('can:visitAdminPages');

// manage the avatars
Route::get('/user/avatar/manage', [UserController::class, 'showAvatarForm'])->middleware('mustBeSignedIn');

Route::post('/user/avatar/submit', [UserController::class, 'avatarSubmit'])->middleware('mustBeSignedIn');


// Following routes
Route::post('/follow/{user:username}', [FollowController::class, 'follow'])->middleware('mustBeSignedIn');
Route::post('/unfollow/{user:username}', [FollowController::class, 'unfollow'])->middleware('mustBeSignedIn');

Route::get('/user/profile/{user:username}/followers', [UserController::class, "profileFollowers"])->middleware('mustBeSignedIn');
Route::get('/user/profile/{user:username}/following', [UserController::class, "profileFollowing"])->middleware('mustBeSignedIn');

// SPA
Route::get(
    '/user/profile/{user:username}/followers/raw',
    [UserController::class, "profileFollowersRaw"]
)->middleware('mustBeSignedIn');

Route::get(
    '/user/profile/{user:username}/following/raw',
    [UserController::class, "profileFollowingRaw"]
)->middleware('mustBeSignedIn');

Route::get(
    '/user/profile/posts/raw',
    [UserController::class, "profilePostsRaw"]
)->middleware('mustBeSignedIn');

Route::get(
    '/user/profile/{user:username}/raw',
    [UserController::class, "profileRaw"]
)->middleware('mustBeSignedIn');


Route::get('/x', function() {
    return "x";
});
