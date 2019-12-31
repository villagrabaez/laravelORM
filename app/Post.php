<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, User, Comment, Image, Tag};

class Post extends Model
{
    // Un post pertenece a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // METODOS POLIMORFICOS

    // Un post tiene muchos comentarios, esto expresado como polimorfico (morphMany)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); // commentable_id, commentable_type
    }

    // Un post tiene una imagen
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); // imageable_id, imageable_type
    }

    // Un post tiene varias etiquetas y una etiqueta tiene varios posts
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable'); // taggable_id, taggable_type
    }
}
