<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

use Cart;

class ClassEvent extends Model implements Buyable

{
  protected $dates = ['date', 'startDate', 'endDate'];

  public function address()
  {
return $this->belongsTo('App\ClassAddress');
  }


  public function course()
  {
    return $this->belongsTo('App\Course');
  }

  public function getFormattedStartDate()
  {
    return $this->startDate->format('j F Y');
  }

  public function getStartEndDate()
  {
    return $this->startDate->format('j F Y').' - '. $this->endDate->format('j F Y');

  }
  public function getFormattedStartDate2()
  {
    return $this->startDate->format('Y-m-d');
  }

  public function getFormattedEndDate2()
  {
    return $this->endDate->format('Y-m-d');
  }



  public function trainers()
  {
    return $this->belongsToMany(User::class, 'classevent_trainer', 'class_id')->withPivot('createdBy');
  }

  public function learners()
  {
    return $this->belongsToMany(User::class, 'class_students', 'class_id', 'user_id')->withPivot('attendance');

  }


  public function getBuyableIdentifier($options = null){
    return $this->id;
  }

  public function getBuyableDescription($options = null){
    return $this->course()->title;
  }

  public function getBuyablePrice($options = null){
    return $this->price;
  }

}
