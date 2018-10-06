<?php

namespace App\Http\Controllers;

use App\ClassStudent;
use App\ClassEvent;
use App\User;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
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
        'class_id' => 'required|unique:class_students,class_id,NULL,user_id,user_id,'.$request->input('user_id'),
        'user_id' => 'required|unique:class_students,user_id,NULL,class_id,class_id,'.$request->input('class_id'),
      ]);
      $classEvent= ClassEvent::find($request->input('class_id'));
      $user=User::find($request->input('user_id'));
      $classEvent->learners()->attach($user, ['updatedBY'=>$request->user()->id]);
      return redirect()->back()->with('success', 'Access granted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudent $classStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassStudent $classStudent)
    {
        //
    }
}
