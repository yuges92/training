<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassEvent;
use App\Assignment;
use Illuminate\Support\Facades\Log;

class AssignmentDeadlineController extends Controller
{

    public function store(Request $request, $class_id, Assignment $assignment)
    {
        $this->validate($request, [
            'date' => 'required|date'
        ]);

        $assignment->deadline()->detach($class_id);
        $assignment->deadline()->attach($class_id, ['date' => $request->date]);

        return response()->json($assignment->load('deadline'), 201);
    }


    public function index($class_id, Assignment $assignment)
    {

        $assignment->load('deadline');
        $deadline = $assignment->deadline()->wherePivot('class_id', $class_id)->first();
        if ($deadline) {
            return response()->json($deadline->pivot, 201);
        }

        return response()->json($deadline, 201);
    }
}
