<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\ClassEvent;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller {

  public function __construct()
  {
    $this->middleware('checkCart');
    // $this->middleware('checkBuyingForSelf', ['only' => ['paymentAndBillingSelf']]);

  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(){
    return view('checkout.buyingForSelf', compact('cart'));

  }

  public function whoIsItFor(Request $request){
      $cartInstance= Cart::getCartIntance();
    //   foreach ($cartInstance->getCart() as $item) {
    //     // if($item->quantity>1){
    //     //   return redirect(('cart'))->with('error', 'You can not buy more than 1 space for a course if you are buying it for your self. If you want to buy more than 1 then please click on someone else button on the next page. Otherwise please change the quantity for the course to 1.');
    //     // }
    //     dump($item->class);
    //   }
      if($cartInstance->getCart()->where('class.type', 'private')->count()>0){
          return redirect()->route('someoneElse.index');
      }
    //   if(){

    //   }

    return view('checkout.whoIsItFor');

  }



  // public function paymentAndBillingSelf(Request $request){
  //
  //   $userData=$request->session()->get('userData');
  //   $userAddress=$userData['address'];
  //
  //   if(Auth::check()){
  //     $userAddress=Auth::user()->getAddressByType('billing');
  //     if(!$userAddress){
  //       $userAddress=Auth::user()->getAddressByType('home');
  //     }
  //   }
  //
  //   return view('checkout.paymentAndBilling', compact('userAddress'));
  // }


  // public function paymentAndBillingSomeoneElse(Request $request){
  //
  //   $userData=$request->session()->get('userData');
  //   $userAddress=$userData['address'];
  //
  //   if(Auth::check()){
  //     $userAddress=Auth::user()->getAddressByType('billing');
  //     if(!$userAddress){
  //       $userAddress=Auth::user()->getAddressByType('home');
  //     }
  //   }
  //
  //   return view('checkout.paymentAndBilling', compact('userAddress'));
  // }


}
