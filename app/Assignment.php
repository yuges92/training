<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

  public $timestamps = true;

  protected $guarded=[];

    public function course()
    {
      return $this->belongsTo('App\Course');
    }

    public function questions()
    {
      return $this->hasMany(Question::class);
    }


}
