<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\{User};

class Group extends Model
{
    public function users() // cuando la entidad es muchos, se escribe en plural. Ej. users
    {
        return $this->belongsToMany(User::class)->withTimestamps(); // Un grupo pertenece a uno o varios usuarios
    }
}
