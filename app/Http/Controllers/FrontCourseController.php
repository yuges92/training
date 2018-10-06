<?php

namespace App\Http\Controllers;

use App\Course;

use Illuminate\Http\Request;

class FrontCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses=Course::all();

        return view('courses.courses')->with('courses', $courses);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
      return view('courses.course')->with('course', $course);

    }


}
