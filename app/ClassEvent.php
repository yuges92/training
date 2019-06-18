<?php

namespace App;

use App\Cart;
use App\ClassDate;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassEvent extends Model

{
  public $timestamps = true;
  protected $dates = ['date', 'startDate', 'endDate'];

  public function getRouteKeyName()
  {
      return 'slug';
  }
  

  public function address()
  {
    return $this->belongsTo('App\ClassAddress');
  }

  // public function cart()
  // {
  //     return $this->hasMany('App\Comment');
  // }

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
    return 1;
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
    return $this->belongsToMany(User::class, 'classEvent_trainer', 'class_id', 'user_id')->withPivot('createdBy', 'type')->withTimestamps();
  }

  public function learners()
  {
    return $this->belongsToMany(User::class, 'class_students', 'class_id', 'user_id')->withPivot('attendance')->withTimestamps();

  }

  public function classDates()
  {
    return $this->hasMany(ClassDate::class, 'class_id');
  }

  public function reduceSpace($space)
  {
    $this->availableSpace=$this->availableSpace-$space;
    $this->save();
  }

  // public function getBuyableIdentifier($options = null){
  //   return $this->id;
  // }
  //
  // public function getBuyableDescription($options = null){
  //   return $this->course()->title;
  // }
  //
  // public function getBuyablePrice($options = null){
  //   return $this->price;
  // }

}
