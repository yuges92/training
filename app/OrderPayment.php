<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
  public $timestamps = true;

  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
