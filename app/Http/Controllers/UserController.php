<?php

namespace App\Http\Controllers;

use App\ClassEvent;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users=User::all();
    // return view('admin.course.courses')->with('courses',$courses);
    return view('admin.user.users', compact('users'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.user.newUser');

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
      'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users,email'],
      'firstName' => 'required|string|alpha',
      'lastName' => 'required|string|alpha',
      'role' => 'required',
    ]);

    $user = new User();
    $user->email=$request->input('email');
    $user->firstName=$request->input('firstName');
    $user->lastName=$request->input('lastName');
    $user->role=$request->input('role');
    $user->password=Hash::make('password');
    $user->save();
    return redirect()->route('users.index')->with('success', 'new user Created');

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {


  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    return view('admin.user.editUser', compact('user'));

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $this->validate($request, [
      'firstName' => 'required|string',
      'lastName' => 'required|string',
      'role' => 'required',
    ]);

    $user->firstName=$request->input('firstName');
    $user->lastName=$request->input('lastName');
    $user->role=$request->input('role');
    $user->update();
    return redirect()->route('users.index')->with('success', 'User updated');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {

    $user->delete();
    return redirect()->route('users.index')->with('success', 'User Deleted');

  }
}
