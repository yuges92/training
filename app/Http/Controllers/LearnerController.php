<?php

namespace App\Http\Controllers;

use App\Learner;
use App\Course;
use App\Role;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // dd(Learner::findLearner(2));
    $learners=Learner::all();
    // dd($learners);
    return view('admin.learner.learners', compact('learners'));

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Learner  $learner
  * @return \Illuminate\Http\Response
  */
  public function show(Learner $learner)
  {

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Learner  $learner
  * @return \Illuminate\Http\Response
  */
  public function edit(Learner $learner)
  {
    dd($learner);
      $courses=Course::all();
      return view('admin.learner.editLearner', compact('learner', 'courses'));




    return redirect()->route('learners.index')->with('danger', 'Not a learner');

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Learner  $learner
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Learner $learner)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Learner  $learner
  * @return \Illuminate\Http\Response
  */
  public function destroy(Learner $learner)
  {
    //
  }
}
