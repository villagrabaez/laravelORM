<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, User, Comment, Image, Tag};

class Video extends Model
{
    // Un video pertenece a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un video pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // METODOS POLIMORFICOS

    // Un video tiene muchos comentarios, esto expresado como polimorfico (morphMany)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); // commentable_id, commentable_type
    }

    // Un video tiene una imagen
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); // imageable_id, imageable_type
    }

    // Un video tiene varias etiquetas y una etiqueta tiene varios videos
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable'); // taggable_id, taggable_type
    }
}
