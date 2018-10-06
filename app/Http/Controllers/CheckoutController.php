<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\ClassEvent;
use App\Course;
use App\User;

class CheckoutController extends Controller
{

  public function buyForSelf(Request $request)
  {
    if (Auth::check()) {
      Cart::restore(Auth::user()->id);
      Cart::store(Auth::user()->id);
    }
    $cart = Cart::content();
    return view('checkout.buyingForSelf', compact('cart'));

    // dd($request);
  }

  public function buyForSomeoneElse(Request $request)
  {
    if (Auth::check()) {
      Cart::restore(Auth::user()->id);
      Cart::store(Auth::user()->id);
    }
    $cart = Cart::content();
    return view('checkout.someoneElse', compact('cart'));


  }

  public function customerDetail(Request $request)
  {
    // return view('checkout.whoIsItFor');

    dd($request);
  }

  public function whoIsItFor(Request $request)
  {
    return view('checkout.whoIsItFor');

  }

  public function payment()
  {
    if (Auth::check()) {
      Cart::restore(Auth::user()->id);
      Cart::store(Auth::user()->id);
    }
    $cart = Cart::content();
    return view('checkout.paymentAndBilling', compact('cart'));

  }
}
