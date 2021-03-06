<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class Order extends Model
{
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function orderDetails(){

    return $this->hasMany('App\OrderDetail');
  }

  public function completeOrder()
  {
    $this->status='completed';
    $this->save();
    Cart::getCartIntance()->emptyCurrentUserCart();

    if($this->isSelf){
      return $this->giveAccess();

    }
    return $this->sendAccessCode();

  }

  public function giveAccess()
  {
    foreach ($this->orderDetails as $detail) {
      $classEvent= $detail->classEvent;
      $user=$this->user;
      if (! $classEvent->learners->contains($user->id)) {
        $classEvent->learners()->attach($user);
        $classEvent->reduceSpace($detail->quantity);
        // dd($detail->quantity);
      }else {
        //send email to tell the user already is enrolled in the course event
      }
    }
    Cart::getCartIntance()->emptyCurrentUserCart();
    return $this;
  }

  public function sendAccessCode()
  {
    //send email with the access code for the order for someoneElse

    // foreach ($this->orderDetails as $detail) {
    //   $classEvent= $detail->classEvent;
    //   $user=$this->user;
    //   if (! $classEvent->learners->contains($user->id)) {
    //     $classEvent->learners()->attach($user);
    //     $classEvent->reduceSpace($detail->quantity);
    //     // dd($detail->quantity);
    //   }
    // }
    return 1;
  }


  public function payment()
  {
    return $this->hasOne('App\OrderPayment');
  }

  public function type()
  {
    if($this->isSelf){
      return 'for self';
    }
    return 'for someone else';
  }

  public function paypalStatus()
  {
    if($this->paymentMethod=='paypal'){
      return $this->payment->payment_status;
    }
    return;
  }


  public function getCssClass()
  {
    # code...
  }


}
