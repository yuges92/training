<?php

namespace App\Http\Controllers;

use App\ReferralCode;
use Illuminate\Http\Request;

class ReferralCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.referralCode.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReferralCode  $referralCode
     * @return \Illuminate\Http\Response
     */
    public function show(ReferralCode $referralCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReferralCode  $referralCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ReferralCode $referralCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReferralCode  $referralCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReferralCode $referralCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReferralCode  $referralCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReferralCode $referralCode)
    {
        //
    }
}
