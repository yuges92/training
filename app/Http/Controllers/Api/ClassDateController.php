<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassDate;
use App\Trainer;
use Illuminate\Support\Facades\Log;

class ClassDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $classDates=ClassDate::where('class_id', $class_id)->orderBy('day')->get();
        return response()->json($classDates, 201);

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
    public function store(Request $request, $class_id)
    {
        $data = $this->validate($request, [
            'class_id' => 'required',
            'day' => 'required',
            'date' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',

        ]);
        $classDate = new ClassDate();
        $classDate->class_id = $request->class_id;
        $classDate->day = $request->day;
        $classDate->date = $request->date;
        $classDate->startTime = $request->startTime;
        $classDate->endTime = $request->endTime;
        $classDate->createdBy = $request->user()->id;
        $classDate->save();
        return response()->json($classDate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $class_id, $id)
    {
        $data = $this->validate($request, [
            'day' => 'required',
            'date' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',

        ]);
        $classDate = ClassDate::find($id);
        $classDate->day = $request->day;
        $classDate->date = $request->date;
        $classDate->startTime = $request->startTime;
        $classDate->endTime = $request->endTime;
        $classDate->updatedBy = $request->user()->id;
        $classDate->update();
        return response()->json($classDate, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_id,$id)
    {
        $classDate = ClassDate::find($id);
        $classDate->delete();
        return response()->json(200);

    }


}
