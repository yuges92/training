<?php

namespace App\Http\Controllers\Api;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseResource::collection(Course::all());
        return response()->json($courses, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = new CourseResource(Course::with('classes', 'courseBodies')->find($id));
        \Debugbar::error($course);

        return response()->json($course, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $course = Course::find($id);
        // return response()->json($request, 200);
        
        $validatedData= $this->validate($request,[
          'title' => 'required|unique:course_types,title,' . $course->id,
          'course_code' => 'required|unique:courses,course_code,' . $course->id,
          'course_type_id' => 'required',
          'description' => 'required',
          'status' => 'required',
          'position' => 'required_if:enable_megamenu,1',
          'password' => 'required_if:status,password_protected',
          ]);
      
          $course->title = $request->input('title');
          $course->slug = str_slug($request->input('title'));
          $course->course_code = $request->input('course_code');
          $course->description = $request->input('description');
          $course->course_type_id = $request->input('course_type_id');
          $course->enable_megamenu = ($request->enable_megamenu) ? 1 : 0;
          $course->body = $request->input('body');
          $course->status = $request->input('status');
          $course->position = $request->input('position');
          $course->password = $request->password ? $request->password :'';
          $course->updatedBy = $request->user()->id;
      
      
          if ($request->file('image')) {
            $imageFileName = $course->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($course->getImageFolder(), $imageFileName);
            $course->image = $imageFileName;
          }
          $course->update();

        return response()->json($course);
    }

    public function addBody(Request $request, $course_id)
    {
     $request->validate([
        'title' => 'required',
        'content' => 'required',
      ]);



      $course = Course::find($course_id);
      $course->courseBodies()->create([
        'title' => $request->title,
        'content' => $request->content,
        'createdBy' => $request->user()->id
      ]);

        return response()->json($course, 200);
  
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
      $course = Course::find($course_id);
      Storage::delete($course->getImage());
      $course->delete();
      return response()->json($course, 204);
    }
}
