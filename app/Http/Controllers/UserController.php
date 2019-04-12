<?php

namespace App\Http\Controllers;

use App\ClassEvent;
use App\Course;
use App\User;
use App\Role;
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

    $roles=Role::all();
    return view('admin.user.newUser', compact('roles'));

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
    $roles=$request->input('role');
    $user = new User();
    $user->email=$request->input('email');
    $user->firstName=$request->input('firstName');
    $user->lastName=$request->input('lastName');
    $user->password=Hash::make('password');
    $user->save();
    // foreach ($roles as $role ) {
    $user->roles()->attach($roles);
    // }
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

    $user=$user->load('roles');
    $roles=Role::all();
    return view('admin.user.editUser', compact('user', 'roles'));

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
    $roles=$request->input('role');
    // $role = Role::where('name', $role)->first();
    // $user->roles()->attach($role);

    $user->firstName=$request->input('firstName');
    $user->lastName=$request->input('lastName');
    // $user->role=$request->input('role');
    $user->update();
    $user->roles()->sync($roles);

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
