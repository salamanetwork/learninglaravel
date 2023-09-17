<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // for search
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    // Create A relationship to 'user_id' with 'users' table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
