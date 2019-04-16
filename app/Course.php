<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

  public $timestamps = true;


  public function getRouteKeyName()
  {
    return 'slug';
  }
  public function assignments()
  {
    return $this->hasMany('App\Assignment');
  }

  public function courseType()
  {
    return $this->belongsTo(CourseType::class);
  }

  public function classes()
  {
    return $this->hasMany('App\ClassEvent');
  }
}
