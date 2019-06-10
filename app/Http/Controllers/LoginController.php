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
    $emailOrUsername = request()->input('email');
 
    $fieldType = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
    if (Auth::attempt([$fieldType => $emailOrUsername, 'password'=>$request->password])) {
      Cart::storeToDatabase();

      // return redirect()->route('adminDashboard');
      return redirect()->back();
    }

    return redirect()->back()->with('error', 'Login Failed. Please check your credentials');
  }

  public function register(Request $request)
  {
    dd('register');
  }

  public function logout()
  {

    // Cart::store(Auth::user()->id);
    // Cart::destroy();
    Auth::logout();
    return redirect()->route('home');
  }


  protected function credentials(Request $request)
  {
      $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
          ? $this->username()
          : 'username';
      return [
          $field => $request->get($this->username()),
          'password' => $request->password,
      ];
  }
}
