<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\{Profile, Level, Group, Location, Post, Video, Comment, Image};

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class); // Un usuario tiene un perfil
    }

    public function level()
    {
        return $this->belongsTo(Level::class); // Un usuario pertenece a un nivel
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps(); // Un usuario pertenece a uno o varios grupos
    }

    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class); // Un usuario tiene una localizacion a trevez de (Through) perfil
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); // imageable_id, imageable_type
    }
}
