<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        // You cannot follow yourself
        if($user->id == auth()->user()->id)
        {
            return back()
                ->with(
                    "failure",
                    "Sorry!, You cannot follow yourself."
                );
        }

        // You can not follow someone you are already following
        $checkExistanceOfFollow =
            Follow::where([
                [
                'user_id',
                '=',
                auth()->user()->id
                ],

                [
                'followed_user_id',
                '=',
                $user->id
                ]
            ])->count();

        if($checkExistanceOfFollow)
        {
            return back()
                ->with(
                    "failure",
                    "Sorry!, You can not follow someone you are already following."
                );
        }

        // Create Actual Follwing If You Passed the Check Above
        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followed_user_id = $user->id;
        $newFollow->save();

        return back()
                ->with(
                    "success",
                    "Congratulations!, You have successfully following '$user->username'"
                );
    }

    public function unfollow(User $user)
    {

    }
}
