<?php

namespace App\Http\Controllers;

use App\CourseType;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseType::all();
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
       $this->validate($request, [
            'title' => 'required|unique:course_types',
            'body' => 'required',
            'status' => 'required',
            'body' => 'required',
            'image' => 'required|image',
            // 'type' => 'required',
        ]);
        $courseType = new CourseType();
        $courseType->title = $request->title;
        $courseType->slug = str_slug($request->input('title'));
        $courseType->body = $request->body;
        $courseType->description = $request->description;
        $courseType->status = $request->status;
        $courseType->body = e($request->body);
        $courseType->createdBy = $request->user()->id;
        $courseType->save();

        if ($request->file('image')) {
            $imageFileName = $courseType->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($courseType->getImageFolder(), $imageFileName);
            $courseType->image = $imageFileName;
            $courseType->update();
        }
        return redirect()->route('courseTypes.index')->with('success', 'Course Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function show($courseTypeID)
    {
        $courseType = CourseType::with('courses', 'courses.classes')->find($courseTypeID);
        return view('admin.courseType.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function edit($courseTypeID)
    {
        $courseType = CourseType::with('courses', 'courses.classes')->find($courseTypeID);
        return view('admin.courseType.edit', compact('courseType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $courseTypeID)
    {
        $courseType = CourseType::find($courseTypeID);

        $this->validate($request, [
            'title' => 'required|unique:course_types,title,'.$courseType->id,
            'slug' => 'required|unique:course_types,slug,'.$courseType->id,
            'body' => 'required',
            'status' => 'required',
            'body' => 'required',
            'image' => 'nullable|image',
        ]);
        $courseType->title = $request->title;
        $courseType->slug = str_slug($request->input('slug'));
        $courseType->body = $request->body;
        $courseType->description = $request->description;
        $courseType->status = $request->status;
        $courseType->body = e($request->body);
        $courseType->updatedBy = $request->user()->id;
        if ($request->file('image')) {
            $imageFileName = $courseType->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($courseType->getImageFolder(), $imageFileName);
            $courseType->image = $imageFileName;
        }
        $courseType->update();

        return redirect()->back()->with('success', 'Course Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseType  $courseType
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseTypeID)
    {
        $courseType = CourseType::find($courseTypeID);
        $courseType->delete();
        return redirect()->back()->with('success', 'Course Type Deleted');
    }
}
