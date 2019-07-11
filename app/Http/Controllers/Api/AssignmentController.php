<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AssignmentController extends Controller
{

    public function index(Request $request, $course_id)
    {
        // Log::error($course_id);
        $assignments = Assignment::where('course_id', $course_id)->get();
        // Log::error($criterias);
        return response()->json($assignments, 201);
    }

    public function store(Request $request, $course_id)
    {
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required',

        ]);

        $course = Course::find($course_id);
        $criteria = Assignment::create([
            'course_id' => $course_id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'introduction' => $request->introduction,
            'createdBy' => $request->user()->id,
        ]);

        return response()->json($criteria, 201);
    }


    public function show(Request $request, $course_id, Assignment $assignment)
    {

        Log::info('here');

        $assignment->load('deadline');
        Log::info($assignment);
        return response()->json($assignment, 201);
    }


    public function update(Request $request, $course_id, Assignment $assignment)
    {
        Log::info($request);

        $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);

        $course = Course::find($course_id);
        $assignment->update([
            // 'course_id' => $course_id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'introduction' => $request->introduction,
            'updatedBy' => $request->user()->id,
        ]);

        return response()->json($assignment, 201);
    }


    public function destroy($course_id, Assignment $assignment)
    {
        $assignment->delete();
        return response()->json('Deleted', 200);
    }
}
