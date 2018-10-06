<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
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

    $this->validate($request, [
      'line1' => [ 'required', 'string'],
      'town' => 'required|string',
      'county' => 'required|string',
      'postcode' => 'required|string',
      'country' => 'required',
      'user_id' => 'required',
      'type' => 'required',
    ]);

    if($address=Address::where('user_id',$request->input('user_id'))->where('type',$request->input('type'))->first()){
      return $this->update($request,$address);
    }


    $address=new Address();
    $address->user_id =$request->input('user_id');
    $address->type =$request->input('type');
    $address->line1 =$request->input('line1');
    $address->line2 =$request->input('line2');
    $address->town =$request->input('town');
    $address->county =$request->input('county');
    $address->postcode =$request->input('postcode');
    $address->country =$request->input('country');
    $address->createdBy =$request->user()->id;

    $address->save();

    return redirect()->back()->with('success', 'User Address Added');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Address  $address
  * @return \Illuminate\Http\Response
  */
  public function show(Address $address)
  {
    
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Address  $address
  * @return \Illuminate\Http\Response
  */
  public function edit(Address $address)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Address  $address
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Address $address)
  {
    $this->validate($request, [
      'line1' => [ 'required', 'string'],
      'town' => 'required|string',
      'county' => 'required|string',
      'postcode' => 'required|string',
      'country' => 'required',
      'user_id' => 'required',
      'type' => 'required',
    ]);

    $address->user_id =$request->input('user_id');
    $address->type =$request->input('type');
    $address->line1 =$request->input('line1');
    $address->line2 =$request->input('line2');
    $address->town =$request->input('town');
    $address->county =$request->input('county');
    $address->postcode =$request->input('postcode');
    $address->country =$request->input('country');
    $address->updatedBY =$request->user()->id;
    $address->update();
    return redirect()->back()->with('success', 'User Address Updated');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Address  $address
  * @return \Illuminate\Http\Response
  */
  public function destroy(Address $address)
  {
    //
  }
}
