<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Course;
use App\AssessmentCriteria;

class AssessmentCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $course_id)
    {
        // Log::error($course_id);
        $criterias = AssessmentCriteria::with('questions')->where('course_id', $course_id)->get();
        // Log::info($criterias);
        return response()->json($criterias, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        $this->validate($request, [
            // 'unique:table_name,column1,null,null,column2,'.$request->column2.',column3,check3'

            'number' => 'required|unique:assessment_criterias,number,NULL,null,course_id,' . $course_id,
            'description' => 'required',

        ]);

        $course = Course::find($course_id);
        Log::info( $request->number);
        $criteria = AssessmentCriteria::create([
            'course_id' => $course_id,
            'number' => $request->number,
            'description' => $request->description,
            'createdBy' => $request->user()->id,
        ]);

        return response()->json($criteria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $course_id)
    { }

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
    public function update(Request $request, $course_id, AssessmentCriteria $assessmentCriteria)
    {

        $this->validate($request, [
            // 'number' => "required|unique:assessment_criterias,number,$assessmentCriteria->id,course_id".$course_id,
            'number' => "required|unique:assessment_criterias,number,{$assessmentCriteria->id}",

            'description' => 'required',

        ]);

        $assessmentCriteria->update([
            'number' => $request->number,
            'description' => $request->description,
            'updatedBy' => $request->user()->id,
        ]);

        return response()->json($assessmentCriteria, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, AssessmentCriteria $assessmentCriteria)
    {
        $assessmentCriteria->delete();
        return response()->json('Deleted', 200);
    }
}
