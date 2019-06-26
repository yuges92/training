<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;

class CourseAssignmentController extends Controller
{
    

    public function index(Request $request, $course_id)
    {
       
    }

    public function show(Request $request, $course_id, Assignment $assignment)
    {

        return view('admin.courseAssignment.show', compact('assignment'));
    }
}
