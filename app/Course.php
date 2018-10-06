<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{


    public function assignments()
    {
      return $this->hasMany('App\Assignment');
    }


    public function classes()
 {
     return $this->hasMany('App\ClassEvent');
 }
}
