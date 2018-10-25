<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

use Illuminate\Support\Collection;

class Cart extends Model
{
  public $timestamps = true;

  public function addToBasket(){
    // dd($this);
    if (Auth::check()) {
      $this->user_id=Auth::user()->id;
      // dd($this);
      $itemExist=parent::where('class_id', '=', $this->class_id)
      ->where('user_id', '=', $this->user_id)
      ->first();
      if($this->class){

      if($itemExist){
        $itemExist->quantity=$this->quantity;
        $itemExist->update();
      }else {
        $this->save();
      }
      Session::forget('cart');
    }

      return 1;
    }

    $cart=$this->getCart();
    if($cart){
      if($cart->has($this->class_id)){
        $this->quantity+=$cart->get($this->class_id)->quantity;
      }
    }

    $cart->put($this->class_id, $this);
    Session::put('cart',$cart);
    Session::save();
    $cart=$this->getCart();
    return $cart;
  }


  public static function updateQuantity($class_id,$quantity){


    if (Auth::check()) {
      $user_id=Auth::user()->id;
      // dd($this);
      $cartItem=parent::where('class_id', '=', $class_id)
      ->where('user_id', '=', $user_id)
      ->first();
      if($cartItem){
        $cartItem->quantity=$quantity;
        return $cartItem->update();
      }
      return false;
    }

    $cart=self::getCartIntance()->getCart();
    $cartItem=$cart->where('class_id', '=', $class_id)
    ->first();
    $cartItem->quantity=$quantity;
    $cart->put($class_id, $cartItem);
    Session::put('cart',$cart);
    Session::save();
    $cart=self::getCartIntance()->getCart();
    return $cart;
  }

  public static function deleteClass($class_id)
  {
    $cartInstance = new self;

    return $cartInstance->getCart()->forget($class_id);

  }


  public function class(){
    return $this->belongsTo('App\ClassEvent', 'class_id');
  }



  public function getItemSubTotal()
  {
    return $this->quantity*$this->class->price;
  }
  
  public function subTotal()
  {
    // return $this->quantity*$this->class->price;
    $subTotal=0;
    foreach ($this->getCart() as $cartItem) {
      $subTotal+=$cartItem->getItemSubTotal();
    }
    return $subTotal;
  }

  public function total()
  {
    // echo number_format(2,2);
    return ($this->subTotal()*(1+$this->tax()));
  }

  public function tax()
  {

    return 0.2;
  }

  public function getPriceIncVat()
  {
    return ($this->class->price)*(1+$this->tax());

  }

  public function getVAT()
  {
    return ($this->subTotal()*$this->tax());

  }

  public function getTotalBeforeTax()
  {

  }

  public static function storeToDatabase()
  {
    $cart = Session::has('cart') ? Session::get('cart') : new Collection;
    if ($cart && $cart->count()>0) {
      $cart->each(function ($item)
      {
        $item->user_id=Auth::user()->id;
        $item->addToBasket();
      });
    }
    // dd($cart);
    Session::forget('cart');
  }



  public function getCart()
  {

    if (Auth::check()) {
      return parent::where('user_id',Auth::user()->id)->get();
    }


    $cart = Session::has('cart') ? Session::get('cart') : new Collection;
    return $cart;
    // return $cart instanceof Collection ? $cart : new Collection();
  }

  public static function getCartIntance()
  {
    $cartInstance = new self;
    return $cartInstance;
  }

  public static function checkIfExist($class_id)
  {
    $cartInstance = new self;
    return ( $cartInstance->getCart()->where('class_id',$class_id)->first());
  }

  public static function destroy($class_id)
  {
    if (Auth::check()) {
      $user_id=Auth::user()->id;
      $cartItem=parent::where('class_id', '=', $class_id)
      ->where('user_id', '=', $user_id)
      ->delete();
      return $cartItem;
    }

    return self::deleteClass($class_id);
  }

  public function emptyCurrentUserCart()
  {
    if (Auth::check()) {
      $user_id=Auth::user()->id;
      $cartItem=self::where('user_id', '=', $user_id)
      ->delete();
      return $cartItem;
    }
  return  session()->forgot('cart');

  }

}
