<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  public $timestamps = true;

  public function order(){

  return $this->belongsTo('App\Order');
}
public function class()
{
  return $this->belongsTo('App\ClassEvent', 'class_id');

}

public function getItemSubTotal()
{
  return $this->quantity*$this->price;
}

}
