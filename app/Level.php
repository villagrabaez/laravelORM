<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\{Post, Video, User};

class Level extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class); // Muchos post a traves de usuarios
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, User::class); // Muchos videos a traves de usuarios
    }
}
