<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $assignments= Assignment::all();
    return view('admin.courseAssignment.index')->with('assignments',$assignments);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $courses=Course::all();
    return view('admin.courseAssignment.createAssignment')->with('courses',$courses);

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
      'course_id' => 'required',
      'title' => 'required',
      'description' => 'required',
      'type' => 'required'

    ]);
    $assignment= new Assignment();
    $assignment->title=$request->input('title');
    $assignment->course_id=$request->input('course_id');
    $assignment->type=$request->input('type');
    if ($request->file('file')) {
      $assignment->originFileName=$request->file('file')->getClientOriginalName();
      $assignment->file=$request->file('file')->storeAs('courseAssignmentDocs', time().'.'.$request->file('file')->getClientOriginalExtension());
    }
    $assignment->description=$request->input('description');
    $assignment->createdBy=$request->user()->id;
    $assignment->save();
    return redirect()->route('assignments.index')->with('success', 'Assignment Created');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function show(Assignment $assignment)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function edit(Assignment $assignment)
  {
    $courses=Course::all();
    return view('admin.courseAssignment.editAssignment', compact('courses', 'assignment'));

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Assignment $assignment)
  {
    $this->validate($request, [
      'course_id' => 'required',
      'title' => 'required',
      'description' => 'required',
      'type' => 'required'

    ]);
    if(!$request->input('oldFile') ){
      Storage::delete($assignment->file);
      $assignment->originFileName='';
      $assignment->file='';
      if ($request->file('file')) {
        $assignment->originFileName=$request->file('file')->getClientOriginalName();
        $assignment->file=$request->file('file')->storeAs('courseAssignmentDocs', time().'.'.$request->file('file')->getClientOriginalExtension());

      }

    }
    $assignment->title=$request->input('title');
    $assignment->course_id=$request->input('course_id');
    $assignment->type=$request->input('type');
    $assignment->description=$request->input('description');
    $assignment->updatedBy=$request->user()->id;
    $assignment->update();
    return redirect()->back()->with('success', 'Assignment Updated');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function destroy(Assignment $assignment)
  {
    Storage::delete($assignment->file);
    $assignment->delete();
    return redirect()->route('assignments.index')->with('success', 'Assignment Deleted');

  }
}
