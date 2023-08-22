<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    public function user() {
        return $this->belongsTo(User::class);  //We make sure we have a relation of post to user
    }                                           //so we can access the user through post model object.

    public function likes() {
        return $this->hasMany(Like::class);
    }
}

//Its essential to create a policy that makes sure who does what with this post.
