<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

  public $timestamps = true;

  protected $guarded=[];
  protected $with=['deadline'];

    public function course()
    {
      return $this->belongsTo('App\Course');
    }

    public function questions()
    {
      return $this->hasMany(Question::class);
    }

    public function deadline()
    {
        return $this->belongsToMany(ClassEvent::class, 'assignment_deadline', 'assignment_id', 'class_id')->withPivot('date')->withTimestamps();
    }


}
