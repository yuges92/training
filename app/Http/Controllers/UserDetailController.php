<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
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
          'user_id' => 'required',
          'phone' => 'required|digits:11',
          'jobStatus' => 'required',
          'jobRole' => 'required',
          'dob' => 'required',
          'gender' => 'required',
          'ethnicity' => 'required',
          'ability' => 'required',
          'organisation' => 'required'
        ]);

        $userDetail= new UserDetail();
        $userDetail->user_id=$request->input('user_id');
        $userDetail->phone=$request->input('phone');
        $userDetail->jobStatus=$request->input('jobStatus');
        $userDetail->jobRole=$request->input('jobRole');
        $userDetail->dob=$request->input('dob');
        $userDetail->gender=$request->input('gender');
        $userDetail->ethnicity=$request->input('ethnicity');
        $userDetail->ability=$request->input('ability');
        $userDetail->disability=$request->input('disability');
        $userDetail->organisation=$request->input('organisation');
        $userDetail->createdBy=$request->user()->id;
        $userDetail->save();

        return redirect()->back()->with('success', 'User Details Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {

      $this->validate($request, [
        'user_id' => 'required',
        'phone' => 'required|digits:11',
        'jobStatus' => 'required',
        'jobRole' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'ethnicity' => 'required',
        'ability' => 'required',
        'organisation' => 'required'
      ]);

      $userDetail->phone=$request->input('phone');
      $userDetail->jobStatus=$request->input('jobStatus');
      $userDetail->jobRole=$request->input('jobRole');
      $userDetail->dob=$request->input('dob');
      $userDetail->gender=$request->input('gender');
      $userDetail->ethnicity=$request->input('ethnicity');
      $userDetail->ability=$request->input('ability');
      $userDetail->disability=$request->input('disability');
      $userDetail->organisation=$request->input('organisation');
      $userDetail->updatedBY=$request->user()->id;
      $userDetail->update();

      return redirect()->back()->with('success', 'User Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
