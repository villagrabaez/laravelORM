<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Post,Video};

class Category extends Model
{
    // Una categoria tiene muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Una categoria tiene muchos videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
