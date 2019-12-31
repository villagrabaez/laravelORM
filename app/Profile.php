<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\{Location};

class Profile extends Model
{
  public function location()
  {
    return $this->hasOne(Location::class); // Un perfil tiene una localizacion
  }
}
