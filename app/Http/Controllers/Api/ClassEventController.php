<?php

namespace App\Http\Controllers\Api;

use App\ClassEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ClassEventController extends Controller
{

    public function show($id)
    {
        $courseClass = ClassEvent::with('classDates')->find($id);
        return response()->json($courseClass, 200);
    }

    public function update(Request $request, $class_id)
    {
        $class = ClassEvent::find($class_id);
        // Log::debug($class);

        $data = $this->validate($request, [
            'course_id' => ['required'],
            'type' => 'required',
            'title' => 'required',
            'address_id' => 'required',
            'description' => 'required',
            // 'duration' => 'required',
            'price' => 'required',
            'space' => 'required',
            'availableSpace' => 'required'
        ]);

        $class->course_id = $request->course_id;
        $class->type = $request->type;
        $class->title = $request->title;
        $class->slug = str_slug($request->title);
        $class->address_id = $request->address_id;
        $class->description = $request->description;
        // $class->duration = $request->duration;
        $class->price = $request->price;
        $class->space = $request->space;
        $class->availableSpace = $request->availableSpace;
        $class->updatedBy = $request->user()->id;
        $class->update();

        return response()->json($class, 201);
    }
}
