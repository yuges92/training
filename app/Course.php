<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{

  public $timestamps = true;
  private $imageFolder = 'course/type/';


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

  public function courseBodies()
  {
    return $this->hasMany(CourseBody::class);
  }

  public function getImageFolder()
  {
      return $this->imageFolder;
  }
  
  public function getImage()
  {
      // \Debugbar::error($this->image);
      if ($this->image == null) {
          return Storage::url('no-image.jpg');
      }
      return Storage::url($this->getImageFolder() . $this->image);
  }
}
