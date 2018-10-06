<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\User;

class LoginController extends Controller
{

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/admin';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }


  /**
  * Handle an authentication attempt.
  *
  * @param  \Illuminate\Http\Request $request
  *
  * @return Response
  */
  public function authenticate(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        Cart::restore(Auth::user()->id);
        // $cart = Cart::content();
// dd($cart);
      return redirect()->route('adminDashboard');
    }

    return redirect()->back()->with('error', 'Login Failed. Please check your credentials');


  }

  public function register(Request $request)
  {
    dd('register');
  }

  public function logout()
  {

    Cart::restore(Auth::user()->id);
    Cart::store(Auth::user()->id);
    Cart::destroy();
    Auth::logout();
    return redirect()->route('home');

  }
}
