<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

  protected $dates = ['dob'];

  public function user()
{
  return $this->belongsTo('App\User');
}

public function getFormattedDoB()
{
  return $this->dob->format('d-m-Y');
}
}
