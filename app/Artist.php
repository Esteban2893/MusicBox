<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
  protected $table = 'artists';
  protected $fillable = ['name'];


    public function tracks()
    {
      return $this->hasMany('App\Track');
    }

    public function albums()
    {
      return $this->hasMany('App\Album');
    }
}
