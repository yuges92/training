<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\CourseDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CourseDocumentResource;

class CourseDocumentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        // die();

        $this->validate($request, [
            'title' => 'required',
            'filename' => 'required|file',
        ]);
        $course = Course::find($course_id);
        if ($request->file('filename')) {
            $filename = $request->file('filename')->getClientOriginalName();
            $storedName = uniqid() . '.' . $request->file('filename')->getClientOriginalExtension();
            $request->file('filename')->storeAs(CourseDocument::getFolderName(), $storedName);
            $document = CourseDocument::create([
                'course_id' => $course_id,
                'title' => $request->title,
                'filename' => $filename,
                'storedName' => $storedName,
            ]);

            return response()->json(new CourseDocumentResource($document), 201);
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $document_id)
    {
        $document = CourseDocument::find($document_id);
        Storage::delete(CourseDocument::getFolderName() . $document->storedName);
        $document->delete();

        return response()->json(204);
    }
}
