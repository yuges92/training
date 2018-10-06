<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassAddress extends Model
{



  public function classes()
  {
    return $this->hasMany('App\ClassEvent');
  }

  public function getFullAddress()
  {

    return $this->line1.', '.$this->town.', '.$this->county.', '.$this->postcode.', '.$this->country;
  }
}
