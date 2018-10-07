<?php

namespace App\Http\Controllers;

use App\ClassEvent;
use App\Course;
use App\ClassAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cart;

class ClassEventController extends Controller
{



  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $classes=ClassEvent::all();
    // return view('admin.course.courses')->with('courses',$courses);
    return view('admin.classEvent.classes', compact('classes'));

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $addresses=ClassAddress::all();
    $courses= Course::all();
    // return view('admin.course.courses')->with('courses',$courses);
    return view('admin.classEvent.createClassEvent', compact('courses', 'addresses'));
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
      'course_id' => [ 'required'],
      'type' => 'required',
      'address_id' => 'required',
      'description' => 'required',
      'startDate' => 'required',
      'startTimeStart' => 'required',
      'endTimeStart' => 'required',
      'endDate' => 'required',
      'startTimeEnd' => 'required',
      'endTimeEnd' => 'required',
      'price' => 'required',
    ]);

    $classEvent=new ClassEvent();
    $classEvent->course_id =$request->input('course_id');
    $classEvent->type =$request->input('type');
    $classEvent->title =$request->input('title');
    $classEvent->slug =str_slug($request->input('title'));
    $classEvent->address_id =$request->input('address_id');
    $classEvent->description =$request->input('description');
    $classEvent->startDate =$request->input('startDate');
    $classEvent->startTimeStart =$request->input('startTimeStart');
    $classEvent->endTimeStart =$request->input('endTimeStart');
    $classEvent->endDate =$request->input('endDate');
    $classEvent->startTimeEnd =$request->input('startTimeEnd');
    $classEvent->endTimeEnd =$request->input('endTimeEnd');
    $classEvent->availableSpace =$request->input('availableSpace');
    $classEvent->space =$request->input('availableSpace');
    $classEvent->price =$request->input('price');
    if ($request->file('file')) {

      $classEvent->originFileName=$request->file('file')->getClientOriginalName();
      $classEvent->file=$request->file('file')->storeAs('classDocs', time().'.'.$request->file('file')->getClientOriginalExtension());
    }


    $classEvent->createdBy =$request->user()->id;
    $classEvent->save();
    return redirect()->route('classEvent.index')->with('success', 'New class created');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\ClassEvent  $classEvent
  * @return \Illuminate\Http\Response
  */
  public function show(ClassEvent $classEvent)
  {
    dd($classEvent);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\ClassEvent  $classEvent
  * @return \Illuminate\Http\Response
  */
  public function edit(ClassEvent $classEvent)
  {
    $addresses=classAddress::all();
    $courses= Course::all();
    return view('admin.classEvent.editClassEvent', compact('classEvent','courses', 'addresses'));


  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ClassEvent  $classEvent
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, ClassEvent $classEvent)
  {
    $this->validate($request, [
      'course_id' => [ 'required'],
      'type' => 'required',
      'address_id' => 'required',
      'description' => 'required',
      'startDate' => 'required',
      'startTimeStart' => 'required',
      'endTimeStart' => 'required',
      'endDate' => 'required',
      'startTimeEnd' => 'required',
      'endTimeEnd' => 'required',
      'price' => 'required',
    ]);

    if(!$request->input('oldFile') ){
      Storage::delete($classEvent->file);
      $classEvent->originFileName='';
      $classEvent->file='';
      if ($request->file('file')) {
        $classEvent->originFileName=$request->file('file')->getClientOriginalName();
        $classEvent->file=$request->file('file')->storeAs('classDocs', time().'.'.$request->file('file')->getClientOriginalExtension());

      }

    }

    $classEvent->course_id =$request->input('course_id');
    $classEvent->type =$request->input('type');
    $classEvent->address_id =$request->input('address_id');
    $classEvent->description =$request->input('description');
    $classEvent->startDate =$request->input('startDate');
    $classEvent->startTimeStart =$request->input('startTimeStart');
    $classEvent->endTimeStart =$request->input('endTimeStart');
    $classEvent->endDate =$request->input('endDate');
    $classEvent->startTimeEnd =$request->input('startTimeEnd');
    $classEvent->endTimeEnd =$request->input('endTimeEnd');
    $classEvent->availableSpace =$request->input('availableSpace');
    $classEvent->price =$request->input('price');
    $classEvent->updatedBy =$request->user()->id;
    $classEvent->update();
    return redirect()->back()->with('success', 'Class Updated');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\ClassEvent  $classEvent
  * @return \Illuminate\Http\Response
  */
  public function destroy(ClassEvent $classEvent)
  {
    Storage::delete($classEvent->file);
    $classEvent->delete();
    return redirect()->route('classEvent.index')->with('success', 'Assignment Deleted');
  }





  /**
  * Display the specified resource.
  *
  * @param  \App\ClassEvent  $classEvent
  * @return \Illuminate\Http\Response
  */
  public function updateAttendance(Request $request,ClassEvent $classEvent)
  {
    $this->validate($request, [
      'user_id' => [ 'required'],
      'attendance' => 'required',
    ]);


    $user_ids=($request->input('user_id'));
    $attendance=($request->input('attendance'));
    foreach ($user_ids as $user_id) {
      $classEvent->learners()->updateExistingPivot($user_id, ['updatedBY'=>$request->user()->id, 'attendance'=>$attendance]);
    }
    return redirect()->back()->with('success', 'Attendance Updated');

  }


  public function removeClassAccess(Request $request,ClassEvent $classEvent)
  {
    $this->validate($request, [
      'user_id' => [ 'required'],
    ]);
    $user_id=($request->input('user_id'));


    $classEvent->learners()->detach($user_id);
    return redirect()->back()->with('success', 'Access removed');

    //
    //
    // $user_ids=($request->input('user_id'));
    // $attendance=($request->input('attendance'));
    // foreach ($user_ids as $user_id) {
    //   $classEvent->learners()->updateExistingPivot($user_id, ['updatedBY'=>$request->user()->id, 'attendance'=>$attendance]);
    // }
    // return redirect()->back()->with('success', 'Attendance Updated');

  }



  public function getshowClassDetailC(ClassEvent $classEvent)
  {
    $class=$classEvent;
    // dd ($classEvent);
    $class_id=$class->id;
    // $cartItem=Cart::search(function($cartItem, $rowId) use($class)  {
    //   return $cartItem->id == $class->id;
    // });
    $cartItem=Cart::content()->where('id', $class->id)->first();
    return view('courses.classDetail', compact('class','cartItem'));

  }


}
