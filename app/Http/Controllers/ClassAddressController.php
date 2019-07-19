<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassAddress;
use App\Http\Resources\ClassAddressResource;

class ClassAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses = classAddress::all();
        // return view('admin.course.courses')->with('courses',$courses);
        if ($request->wantsJson()) {
            return response()->json(ClassAddressResource::collection($addresses), 200);
        }
        return view('admin.classAddress.classAddresses', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classAddress.createClassAddress');
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
            'line1' => ['required', 'string'],
            'town' => 'required|string',
            'county' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required',
        ]);

        $address = new ClassAddress();
        $address->line1 = $request->input('line1');
        $address->line2 = $request->input('line2');
        $address->town = $request->input('town');
        $address->county = $request->input('county');
        $address->postcode = $request->input('postcode');
        $address->country = $request->input('country');
        $address->detail = $request->detail;
        $address->createdBy = $request->user()->id;
        $address->save();
        return redirect()->route('classAddress.index')->with('success', 'New address created');
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
    public function edit(ClassAddress $classAddress)
    {

        return view('admin.classAddress.editClassAddress', compact('classAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassAddress $classAddress)
    {

        $this->validate($request, [
            'line1' => ['required', 'string'],
            'town' => 'required|string',
            'county' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required',
        ]);


        $classAddress->line1 = $request->input('line1');
        $classAddress->line2 = $request->input('line2');
        $classAddress->town = $request->input('town');
        $classAddress->county = $request->input('county');
        $classAddress->postcode = $request->input('postcode');
        $classAddress->country = $request->input('country');
        $classAddress->detail = $request->detail;
        $classAddress->updatedBy = $request->user()->id;
        $classAddress->update();
        return redirect()->back()->with('success', 'Address updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassAddress $classAddress)
    {

        $classAddress->delete();
        return redirect()->route('classAddress.index')->with('success', 'Address deleted.');
    }
}
