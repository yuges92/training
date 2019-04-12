<?php

namespace App\Http\Controllers;

use App\CourseType;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=CourseType::all();
        return view('admin.courseType.index', compact('courses'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courseType.create');
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
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function show(CourseType $courseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseType $courseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseType $courseType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseType $courseType)
    {
        //
    }
}
