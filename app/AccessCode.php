<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessCode extends Model
{



  public function class()
  {
    return $this->belongsTo('App\ClassEvent');

  }

  public function order()
  {
    # code...
  }

  public function buyer()
  {
    return $this->belongsTo('App\User', 'buyer_id');

  }

  public function learner()
  {
    return $this->belongsTo('App\User', 'user_id');

  }


}
