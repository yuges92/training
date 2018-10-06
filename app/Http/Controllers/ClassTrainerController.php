<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassEvent;
use App\Course;
use App\ClassAddress;
use App\User;

class ClassTrainerController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $classes=ClassEvent::all();
    return view('admin.classTrainer.trainers', compact('classes'));

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $trainers=User::where('role','trainer')->get();
    $courses= Course::all();
    $classess= ClassEvent::all();
    // return view('admin.course.courses')->with('courses',$courses);
    return view('admin.classTrainer.createClassTrainer', compact('trainers', 'courses','classess'));
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
      'class_id' => 'required|unique:classevent_trainer,class_id,NULL,user_id,user_id,'.$request->input('user_id'),
      'user_id' => 'required|unique:classevent_trainer,user_id,NULL,class_id,class_id,'.$request->input('class_id'),
    ]);
    $classEvent= ClassEvent::find($request->input('class_id'));
    $user=User::find($request->input('user_id'));
    $classEvent->trainers()->attach($user, ['createdBy'=>$request->user()->id]);
    return redirect()->route('classTrainer.index')->with('success', 'Trainer added');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show( $classid)
  {
    $class= ClassEvent::find($classid);

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($classid)
  {
    $class= ClassEvent::find($classid);
    return view('admin.classTrainer.showClassTrainers', compact('class'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request,  $classid)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($class_id, $trainer_id)
  {
    $class=ClassEvent::find($class_id);
    $class->trainers()->detach($trainer_id);
    return redirect()->route('classTrainer.index')->with('success', 'Trainer removed');

  }
}
