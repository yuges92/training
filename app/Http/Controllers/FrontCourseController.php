<?php

namespace App\Http\Controllers;

use App\Course;

use Illuminate\Http\Request;
use App\CourseType;

class FrontCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses=CourseType::with('courses')->where('status','publish')->get();
      // dd($courses);

        return view('courses.courses')->with('courses', $courses);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseType $courseType)
    {
      $courseType=$courseType->load('courses','courses.classes');
      // dd($course);
      return view('courses.courseType')->with('courseType', $courseType);

    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCourse(CourseType $courseType,Course $course)
    {
      $course=$course->load('classes');
      // dd($course);
      return view('courses.course')->with('course', $course);

    }


}
