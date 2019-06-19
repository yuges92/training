<?php

namespace App\Http\Controllers\Api;

use App\Trainer;
use App\ClassEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ClassEventController extends Controller
{

    public function show($id)
    {
        $courseClass = ClassEvent::with('classDates', 'trainers')->find($id);
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

    public function addTrainer(Request $request, $class_id)
    {

        // Log::info($request);
        $trainer = Trainer::find($request->user_id);
        $class = ClassEvent::with('trainers')->where('id', $class_id)->first();
        $class->trainers()->wherePivot('type', $request->type)->detach();

        $trainer->classes()->attach($class_id, [
            'type' => $request->type,
            'createdBy' => $request->user()->id
        ]);
        return response()->json($trainer, 201);
    }


    public function getATrainer(Request $request, $class_id)
    {
        // $class=ClassEvent::with()->where($class_id);
        // $trainer= Trainer::with('classes')->whereHas('classes', function ($query) use($request, $class_id){
        //    return  $query->where('class_id',$class_id)->wherePivot('type','Primary');
        // })->first();
        $class = ClassEvent::with('trainers')->where('id', $class_id)->first();

        $trainer = ($class->trainers()->wherePivot('type', $request->type)->first());
        if ($trainer) {
            // Log::info($trainer);
            return response()->json(new UserResource($trainer), 201);
        }

        return response()->json(404);
    }


    public function deleteATrainer(Request $request, $class_id)
    {

        $class = ClassEvent::with('trainers')->find( $class_id);
        Log::info($class);


        if ($class) {
            Log::info('here ');
            Log::warning($request);
            $class->trainers()->wherePivot('type', $request->type)->detach();
        $class->trainers()->wherePivot('type', $request->type)->detach();

            $class = ClassEvent::with('trainers')->where('id', $class_id)->first();
            // Log::error($class);
            return response()->json('Deleted',201);
        }

        return response()->json(404);
    }
}
