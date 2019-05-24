<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassEvent;

class ClassEventController extends Controller
{
    
    public function show($id)
    {
        $courseClass= ClassEvent::find($id);

        return response()->json($courseClass, 200);
    }
}
