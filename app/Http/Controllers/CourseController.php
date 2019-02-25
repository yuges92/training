<?php

namespace App\Http\Controllers;

use App\Course;
use App\Learner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class CourseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $courses= Course::all();
    return view('admin.course.courses')->with('courses',$courses);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.course.courseCreate');
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
      'title' => 'required|unique:courses',
      'body' => 'required',
      'description' => 'required',
      'type' => 'required',

    ]);

    $course= new Course();
    $course->title=$request->input('title');
    $course->slug= str_slug($request->input('title'));
    $course->body=$request->input('body');
    $course->description=$request->input('description');
    $course->type=$request->input('type');
    if ($request->file('file')) {

      $course->originFileName=$request->file('file')->getClientOriginalName();
      $course->file=$request->file('file')->storeAs('courseDocs', time().'.'.$request->file('file')->getClientOriginalExtension());
    }
    $course->createdBy=1;
    // $course->createdBy=1;
    $course->save();
    return redirect()->route('adminCourses')->with('success', 'Course Created');

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function show(Course $course)
  {
    return view('admin.course.courseCreate');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function edit(Course $course)
  {
    // dd($course);
    // echo  Storage::download($course->file);

    return view('admin.course.courseEdit')->with('course',$course );

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Course $course)
  {
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
      'description' => 'required'

    ]);
    if(!$request->input('oldFile') ){
      Storage::delete($course->file);
      $course->originFileName='';
      $course->file='';
      if ($request->file('file')) {
        $course->originFileName=$request->file('file')->getClientOriginalName();
        $course->file=$request->file('file')->storeAs('courseDocs', time().'.'.$request->file('file')->getClientOriginalExtension());
      }
    }
    $course->title=$request->input('title');
    $course->body=$request->input('body');
    $course->description=$request->input('description');
    $course->type=$request->input('type');
    $course->createdBy=1;
    $course->update();
    return redirect()->back()->with('success', 'Course Updated');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function destroy(Course $course)
  {
    Storage::delete($course->file);
    $course->delete();
    return redirect()->route('adminCourses')->with('success', 'Course Deleted');

  }


  public function getClasses(Course $course)
  {
    return response()->json($course->classes);
  }


  public function dashboard(Course $course)
  {
    $faker = Faker::create();
    $title='Course Dashboard';
    return view('admin.course.dashboard',compact('title', 'faker'));
  }

  public function learnerCourseOverview(Course $course, Learner $learner)
  {
    $title='Course page for learner';
    return view('admin.course.learnerCourseOverview',compact('title'));
  }

  public function assignmentMarking()
  {
    $title='Assignment Marking';
    return view('admin.courseAssignment.assignmentMarking',compact('title'));
  }


}
