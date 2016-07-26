<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Obtiene el artista del álbum
     */
     public function artist()
     {
       return $this->belongsTo('App\Artist');
     }

     /**
      * Obtiene las pistas que aparecen en el álbu,
      */
      public function tracks()
      {
        return $this->belongsToMany('App\Track')
        ->withPivot('number')->withTimestamps();
      }
}
