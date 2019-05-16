<?php

namespace App\Http\Controllers\Api;

use App\CourseBody;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseBodyController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseBody  $courseBody
     * @return \Illuminate\Http\Response
     */
    public function destroy( $courseBody_id)
    {
        $courseBody=CourseBody::find($courseBody_id);
        $courseBody->delete();
        return response()->json(200);
    }


    public function update(Request $request,$courseBody_id)
    {
        $courseBody=CourseBody::find($courseBody_id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'order'    => 'required'
        ]);

        $courseBody->title = $request->title;
        $courseBody->content = $request->content;
        $courseBody->order = $request->order;
        $courseBody->updatedBy = $request->user()->id;
        $courseBody->update();

        return response()->json($courseBody, 200);
    }
}
