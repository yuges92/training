<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessCode extends Model
{

  public $timestamps = true;



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

  public static function generateAccessCode(){
    $accessCode = "";
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $coupon_valid=false;

    for ($i = 0; $i < 10; $i++) {
      $accessCode .= $chars[mt_rand(0, strlen($chars)-1)];
    }



    return $accessCode;
  }

  public static function getValidAccessCode()
  {
    do {
      $accessCode=self::generateAccessCode();

    } while (self::where("accessCode", "=", $accessCode)->first() instanceof AccessCode);

    return $accessCode;
  }


}
