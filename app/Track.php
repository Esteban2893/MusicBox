<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //
    public function artist()
    {
      return $this->belongsTo('App\Artist');
    }

    public function albums()
    {
      return $this->belongsToMany('App\Album')
      ->withPivot('number')->withTimestamps();
    }
}
