<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Order;
use App\UserGdpr;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // dd();
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    dd($request);
    if($request->input('differentAddress')=='yes'){

    $this->validate($request, [
      'billingFirstName' => 'required',
      'billingLastName' => 'required',
      'billingTel' => 'required|numeric',
      'billingLine1' => 'required',
      'billingTown' => 'required',
      'billingCounty' => 'required',
      'billingPostcode' => 'required',
      'billingCountry' => 'required',
      'paymentMethod' => 'required',
      'termsCondition' => 'required',
      'poNumber' => 'required_if:paymentMethod,invoiceRequest',
    ]);
  }else {
    $this->validate($request, [

      'paymentMethod' => 'required',
      'termsCondition' => 'required',
      'poNumber' => 'required_if:paymentMethod,invoiceRequest',
    ]);
  }

  // 'signUpForNews' => 'required',
  // 'contacts' => 'required_if:signUpForNews,Yes',


    $userData=$request->session()->get('userData');
    $newUser=$userData['userInfo'];
    $newUserDetails=$userData['userAdditionalDetail'];
    $userAddress=$userData['address'];
    $whoIsItFor=$userData['whoIsItFor'];
    // dd($newUserDetails);
    $role = Role::where('name', 'Learner')->first();
    $newUser->save();
    if(!$newUser->roles->contains('role_id',$role->id)){
      $newUser->roles()->attach($role);
    }

    if(!$newUser->addresses->contains('type','home')){
      $newUser->addresses()->save($userAddress);
    }

    if ($whoIsItFor=='self') {
      if ($newUser->detail === null)
      {
        $newUser->detail()->save($newUserDetails);
        // $newUserDetails->user_id=$newUser->id;
        // $newUserDetails->save();
      }
    }

    $order= new Order();
    $order->billingFirstName=$request->input('billingFirstName');
    $order->billingLastName=$request->input('billingLastName');
    $order->billingTel=$request->input('billingTel');
    $order->billingLine1=$request->input('billingLine1');
    $order->billingLine2=$request->input('billingLine2');
    $order->billingTown=$request->input('billingTown');
    $order->billingCounty=$request->input('billingCounty');
    $order->billingPostcode=$request->input('billingPostcode');
    $order->billingCountry=$request->input('billingCountry');
    // $order->signUpForNews=$request->input('signUpForNews');
    $order->referralCode=$request->referralCode;


    $order->paymentMethod=$request->input('paymentMethod');
    $order->termsCondition=$request->input('termsCondition');
    $order->poNumber=$request->input('poNumber');
    $cart=Cart::getCartIntance();
    $order->total=$cart->total();
    $order->subTotal=$cart->subtotal();
    $order->totalVat=$cart->getVAT();
    $order->vat=$cart->tax();


    $savedOrder=$newUser->orders()->save($order);

    foreach ($cart->getCart() as $cartItem) {
      # code...
      $orderDetails= new OrderDetail();
      $orderDetails->order_id=$savedOrder->id;
      $orderDetails->class_id=$cartItem->class_id;
      $orderDetails->quantity=$cartItem->quantity;
    }

    $userGDPR= new UserGdpr();
    $userGDPR->agreed=$request->input('signUpForNews');
    if($request->input('signUpForNews')=='Yes'){
      $userGDPR->byEmail='yes';
      $userGDPR->byPhone='yes';
    }else {
      $userGDPR->byEmail='no';
      $userGDPR->byPhone='no';
    }

    $newUser->gdpr()->save($userGDPR);

    if (Auth::loginUsingId($newUser->id)) {

      // dd($newUser);
      return redirect()->route('thankYou');
    }

  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
