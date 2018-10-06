<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassEvent;
use App\Course;

use App\User;



class AttendanceController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $courses=Course::all();
    return view('admin.classLearner.courses', compact('courses'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    // $learners=User::where('role','learner')->get();
    // $courses= Course::all();
    // $classess= ClassEvent::all();
    // // return view('admin.course.courses')->with('courses',$courses);
    // return view('admin.classTrainer.createClassTrainer', compact('trainers', 'courses','classess'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($course_id)
  {
    $course=Course::find($course_id);
    return view('admin.classLearner.classList', compact('course'));

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function showClassLearners($class_id)
  {
    $class=ClassEvent::find($class_id);
    return view('admin.classLearner.classLearnersList', compact('class'));

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
