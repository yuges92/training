<?php

namespace App\Http\Controllers;

use App\ClassEvent;
use App\Course;
use App\ClassAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cart;
use App\Moderator;

class ClassEventController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassEvent::with('course')->get();
        // return view('admin.course.courses')->with('courses',$courses);
        return view('admin.classEvent.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course_id = $request->course_id ? $request->course_id : null;
        $addresses = ClassAddress::all();
        $courses = Course::all();
        $moderators = Moderator::all();
        // return view('admin.course.courses')->with('courses',$courses);
        return view('admin.classEvent.create', compact('courses', 'addresses', 'course_id', 'moderators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'course_id' => ['required'],
            'type' => 'required',
            'title' => 'required|unique:class_events,title',
            'address_id' => 'required',
            'description' => 'required',
            // 'duration' => 'required',
            // 'startDate' => 'required',
            // 'startTimeStart' => 'required',
            // 'endTimeStart' => 'required',
            // 'endDate' => 'required_if:duration,2',
            // 'startTimeEnd' => 'required_if:duration,2',
            // 'endTimeEnd' => 'required_if:duration,2',
            'price' => 'required',
            'space' => 'required',
            'moderator_id' => 'integer|nullable',
        ]);

        $classEvent = new ClassEvent();
        $classEvent->course_id = $request->input('course_id');
        $classEvent->type = $request->input('type');
        $classEvent->title = $request->input('title');
        $classEvent->slug = str_slug($request->input('title'));
        $classEvent->address_id = $request->input('address_id');
        $classEvent->description = $request->input('description');
        $classEvent->moderator_id = $request->moderator_id ?? null;
        // $classEvent->startDate =$request->input('startDate');
        // $classEvent->startTimeStart =$request->input('startTimeStart');
        // $classEvent->endTimeStart =$request->input('endTimeStart');
        // $classEvent->endDate =$request->input('endDate');
        // $classEvent->startTimeEnd =$request->input('startTimeEnd');
        // $classEvent->endTimeEnd =$request->input('endTimeEnd');
        $classEvent->availableSpace = $request->input('space');
        $classEvent->space = $request->input('space');
        $classEvent->price = $request->input('price');
        // $classEvent->duration =$request->duration;
        // if ($request->file('file')) {

        //   $classEvent->originFileName=$request->file('file')->getClientOriginalName();
        //   $classEvent->file=$request->file('file')->storeAs('classDocs', time().'.'.$request->file('file')->getClientOriginalExtension());
        // }


        $classEvent->createdBy = $request->user()->id;
        $classEvent->save();
        return redirect()->route('classes.show', $classEvent->id)->with('success', 'New class created');
        // return redirect()->route('class.index')->with('success', 'New class created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $class = ClassEvent::with('deadline')->find($class_id);
        // dd($classEvent);

        return view('admin.classEvent.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
        $class = ClassEvent::find($class_id);
        $addresses = classAddress::all();
        $courses = Course::all();
        return view('admin.classEvent.editClassEvent', compact('class', 'courses', 'addresses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {

        $class = ClassEvent::find($class_id);

        $this->validate($request, [
            'course_id' => ['required'],
            'type' => 'required',
            'title' => 'required',
            'address_id' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'startDate' => 'required',
            'startTimeStart' => 'required',
            'endTimeStart' => 'required',
            'endDate' => 'required_if:duration,2',
            'startTimeEnd' => 'required_if:duration,2',
            'endTimeEnd' => 'required_if:duration,2',
            'price' => 'required',
            'space' => 'required',
            'availableSpace' => 'required',
            'moderator_id' => 'integer|nullable',
        ]);

        // if(!$request->input('oldFile') ){
        //   Storage::delete($classEvent->file);
        //   $classEvent->originFileName='';
        //   $classEvent->file='';
        //   if ($request->file('file')) {
        //     $classEvent->originFileName=$request->file('file')->getClientOriginalName();
        //     $classEvent->file=$request->file('file')->storeAs('classDocs', time().'.'.$request->file('file')->getClientOriginalExtension());

        //   }

        // }

        $class->course_id = $request->input('course_id');
        $class->type = $request->input('type');
        $class->address_id = $request->input('address_id');
        $class->description = $request->input('description');
        $class->startDate = $request->input('startDate');
        $class->startTimeStart = $request->input('startTimeStart');
        $class->endTimeStart = $request->input('endTimeStart');
        $class->endDate = $request->input('endDate');
        $class->startTimeEnd = $request->input('startTimeEnd');
        $class->endTimeEnd = $request->input('endTimeEnd');
        $class->availableSpace = $request->input('availableSpace');
        $class->price = $request->input('price');
        $class->space = $request->input('space');
        $class->moderator_id = $request->moderator_id ?? null;
        $class->updatedBy = $request->user()->id;
        $class->duration = $request->duration;
        $class->update();
        return redirect()->back()->with('success', 'Class Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_id)
    {
        $class = ClassEvent::find($class_id);

        // Storage::delete($classEvent->file);
        $class->delete();
        return redirect()->back()->with('success', 'Class Deleted');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\ClassEvent  $classEvent
     * @return \Illuminate\Http\Response
     */
    public function updateAttendance(Request $request, ClassEvent $classEvent)
    {
        $this->validate($request, [
            'user_id' => ['required'],
            'attendance' => 'required',
        ]);


        $user_ids = ($request->input('user_id'));
        $attendance = ($request->input('attendance'));
        foreach ($user_ids as $user_id) {
            $classEvent->learners()->updateExistingPivot($user_id, ['updatedBY' => $request->user()->id, 'attendance' => $attendance]);
        }
        return redirect()->back()->with('success', 'Attendance Updated');
    }


    public function removeClassAccess(Request $request, ClassEvent $classEvent)
    {
        $this->validate($request, [
            'user_id' => ['required'],
        ]);
        $user_id = ($request->input('user_id'));


        $classEvent->learners()->detach($user_id);
        return redirect()->back()->with('success', 'Access removed');

        //
        //
        // $user_ids=($request->input('user_id'));
        // $attendance=($request->input('attendance'));
        // foreach ($user_ids as $user_id) {
        //   $classEvent->learners()->updateExistingPivot($user_id, ['updatedBY'=>$request->user()->id, 'attendance'=>$attendance]);
        // }
        // return redirect()->back()->with('success', 'Attendance Updated');

    }



    public function showClassDetail(Course $course, ClassEvent $classEvent)
    {
        $class = $classEvent;
        // dd ($classEvent);
        $class_id = $class->id;
        // $cartItem=Cart::search(function($cartItem, $rowId) use($class)  {
        //   return $cartItem->id == $class->id;
        // });
        $cartItem = Cart::getCart()->where('class_id', $class->id)->first();
        return view('courses.classDetail', compact('class', 'cartItem'));
    }
}
