<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

    public function homeFeedPosts(User $user)
    {
        $posts = $user->feedPosts()->latest()->paginate(5);

        if(auth()->check())
        {
            return view('home_guest', ['posts' => $posts, 'user' => $user]);
        }
        else
        {
            $posts = Post::count();

            return view('home_guest', ['posts' => $posts]);
        }
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

            // New Event with data
            event(new OurExampleEvent([
                'username' => auth()->user()->username,
                'action' => 'signin',
            ]));

            // success
            // redirect the user back to the home page
            // Setup a flash message too
            return redirect('/' . $data['username'] . '/feeds')->with("success", "Successfully signed in!");
            // return $this->showUserHomePage();
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
        // New Event with data
        event(new OurExampleEvent([
            'username' => auth()->user()->username,
            'action' => 'signout',
        ]));

        auth()->logout();

        return
            redirect('/')
                ->with(
                    "success",
                    "Successfully signed out!");
    }

    private function getSharedData(User $user)
    {
        $checkIsFollowing = 0;

        if(auth()->check())
        {
            $checkIsFollowing = Follow::where([
                [
                    'user_id',
                    '=',
                    auth()->user()->id,
                ],
                [
                    'followed_user_id',
                    '=',
                    $user->id,
                ]
            ])->count();
        }

        View::share('sharedData', [

            // output: Gets logged in username from database
            'username' => $user->username,

            // output: Gets avatar from database
            'avatar' => $user->avatar,

            // output: Gets posts counts
            'currentUserPostsCount' => $user->post()->count(),

            // output: Check if user follows another
            'checkIsFollowing' => $checkIsFollowing,

            // output: Follower count
            'followersCount' => $user->followers()->count(),

            // output: Following count
            'followingCount' => $user->following()->count(),

            // output: feed posts
            'feedPosts' => $user->feedPosts()->latest()->get(),
        ]);
    }

    // Show the Profile of the user himself
    public function profilePosts(User $user)
    {
        $this->getSharedData($user);

        // output: Gets logged in userid from session
        $userId = auth()->user()->id;

        return view("profile_posts", [

            // output: Gets logged in username from session
            'username' => auth()->user()->username,

            // output: Gets avatar from database
            'avatar' => auth()->user()->avatar,

            // output: Gets posts counts
            'currentUserPostsCount' => Post::where('user_id', $userId)->get()->count(),

            // output: JSON Object Has Objects' of Data
            'currentUserPosts' => Post::where('user_id', $userId)->latest()->paginate(),

            // output: Gets posts to pages
            // 'posts' => Post::where('user_id', $userId)->latest()->paginate(),

            // output: Check if user follows another
            // 'checkIsFollowing' => $checkIsFollowing,
        ]);
    }

    // Show the Profile of the other user
    public function profile(User $user)
    {
        $this->getSharedData($user);

        return view("profile_posts", [

            // output: Gets logged in username from database
            // 'username' => $user->username,

            // output: Gets avatar from database
            // 'avatar' => $user->avatar,

            // output: Gets posts counts
            // 'currentUserPostsCount' => $user->post()->count(),

            // output: JSON Object Has Objects' of Data
            'currentUserPosts' => $user->post()->latest()->paginate(),

            // output: Check if user follows another
            // 'checkIsFollowing' => $checkIsFollowing,
        ]);
    }

    public function profileFollowers(User $user)
    {
        $this->getSharedData($user);

        // Return the JSON
        // return $user->followers()->latest()->get();

        return view("profile_followers", [

            // Get Followers -> return JSON
            'followers' => $user->followers()->latest()->get(),

            // output: Gets logged in username from database
            // 'username' => $user->username,

            // output: Gets avatar from database
            // 'avatar' => $user->avatar,

            // output: Gets posts counts
            // 'currentUserPostsCount' => $user->post()->count(),

            // output: JSON Object Has Objects' of Data
            'currentUserPosts' => $user->post()->latest()->get(),

            // output: Check if user follows another
            // 'checkIsFollowing' => $checkIsFollowing,
        ]);
    }

    public function profileFollowing(User $user)
    {
        $this->getSharedData($user);

        return view("profile_following", [

            // Get Followers -> return JSON
            'following' => $user->following()->latest()->get(),

            // output: Gets logged in username from database
            // 'username' => $user->username,

            // output: Gets avatar from database
            // 'avatar' => $user->avatar,

            // output: Gets posts counts
            // 'currentUserPostsCount' => $user->post()->count(),

            // output: JSON Object Has Objects' of Data
            'currentUserPosts' => $user->post()->latest()->get(),

            // output: Check if user follows another
            // 'checkIsFollowing' => $checkIsFollowing,
        ]);
    }

    // For SPA
    public function profilePostsRaw(User $user)
    {
        $this->getSharedData($user);

        return response()->json([
            'theHTML' => view('profile_posts_only', ['currentUserPosts' => $user->post()->latest()->get()])->render(),
            'pageTitle' => $user->username . "'s Profile",
        ]);
    }

    // For SPA
    public function profileRaw(User $user)
    {
        $this->getSharedData($user);

        return response()->json([
            'theHTML' => view('profile_posts_only', ['currentUserPosts' => $user->post()->latest()->get()])->render(),
            'pageTitle' => $user->username . "'s Profile",
        ]);
    }

    // For SPA Followers
    public function profileFollowersRaw(User $user)
    {
        $this->getSharedData($user);

        return response()->json([
            'theHTML' => view('profile_followers_only', ['followers' => $user->followers()->latest()->get()])->render(),
            'pageTitle' => $user->username . "'s Followers",
        ]);
    }

    // For SPA Followings
    public function profileFollowingRaw(User $user)
    {
        $this->getSharedData($user);

        return response()->json([
            'theHTML' => view('profile_followings_only', ['following' => $user->following()->latest()->get()])->render(),
            'pageTitle' => $user->username . "'s Followings",
        ]);
    }



    // Manage The Avatar
    public function showAvatarForm()
    {
        return view("avatar_form");
    }

    public function avatarSubmit(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'avatar' => ['required','image','mimes:jpeg,png,jpg,gif','max:3000'],
        ]);

        // Store the avatar attachment on the server storage
        // $request->file('avatar')->store('public/avatars');

        // Using 3rd Party Image Service
        $img = Image::make($request->file('avatar'))->fit(120)->encode('jpg');

        // Rename randomly
        $imgFileName = $user->id . '_' . $user->username . '_' . uniqid() . '.jpg';

        // Store the image in the folder
        Storage::put('public/avatars/' . $imgFileName, $img);

        // Delete the old image first
        $oldAvatar = $user->avatar;

        // Update the database
        $user->avatar = $imgFileName;
        $user->save();

        // Action to Delete the old image file
        if($oldAvatar != "/fallback-avatar.jpg")
        {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }


        return back()->with("success", "uploaded avatar done");
    }

    // REST API

    // Login API
    public function loginAPI(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($data))
        {
            $user = User::where('username', $data['username'])->first();
            $token = $user->createToken('blogtoken')->plainTextToken;
            return $token;
        }

        return "Failed to login though API!";
    }



}
