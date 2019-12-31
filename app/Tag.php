<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Post};

class Tag extends Model
{
    // POLIMORFISMO MUCHOS A MUCHOS

    // Una etiqueta tiene varios posts
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable'); // taggable_id, taggable_type
    }

    // Una etiqueta tiene varios videos
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable'); // taggable_id, taggable_type
    }
}
