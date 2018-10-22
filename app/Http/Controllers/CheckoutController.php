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
