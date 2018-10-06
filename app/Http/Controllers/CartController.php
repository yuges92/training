<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Session;
class CartController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    dd(Session::get('basket'));
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
    $cart= new Cart();
    $cart->class_id=1;
    $cart->user_id=2;
    $cart->quantity=55;
    // $request->session()->push('basket', $cart);
    dd(Session::get('basket'));

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function show(Cart $cart)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function edit(Cart $cart)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Cart $cart)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function destroy(Cart $cart)
  {
    //
  }
}
