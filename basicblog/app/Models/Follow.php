<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;

    public function userDoingFollowing()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userBeingFollowed()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }
}
