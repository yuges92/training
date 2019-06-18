<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Course;
use App\ClassEvent;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Notifications\NewUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->user()->isSuperAdmin()) {
      $users = User::with('roles')->get();
    } else {
      $users = User::whereHas('roles', function ($query) {
        $query->where('name', '!=', 'Super Admin');
      })->get();
    }

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

    $roles = Role::all();
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
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
      'username' => ['required', 'string', 'max:255', 'unique:users,username'],
      'firstName' => 'required|string|alpha',
      'lastName' => 'required|string|alpha',
      'status' => 'required',
      'role' => 'required',
    ]);
    $roles = $request->input('role');
    $user = new User();
    $user->email = $request->input('email');
    $user->username = $request->username;
    $user->firstName = $request->input('firstName');
    $user->lastName = $request->input('lastName');
    $user->password = Hash::make('password');
    $user->status = $request->status;
    $user->save();
    // foreach ($roles as $role ) {
    $user->roles()->attach($roles);
    // }

    if ($request->file('image')) {
      $imageFileName = $user->id . '.' . $request->file('image')->getClientOriginalExtension();
      $request->file('image')->storeAs($user->getImageFolder(), $imageFileName);
      $user->image = $imageFileName;
      $user->update();
    }

    if ($request->notify) {
      // $user->notify(new NewUser());
      Mail::to($user)->send(new NewUserMail($user));
    }
    return redirect()->route('users.index')->with('success', 'new user Created');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  { }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {

    // $user=$user->load('roles');
    $roles = Role::all();
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
      'status' => 'required',
      'role' => 'required',
    ]);
    $roles = $request->input('role');
    // $role = Role::where('name', $role)->first();
    // $user->roles()->attach($role);

    $user->firstName = $request->firstName;
    $user->lastName = $request->lastName;
    $user->email = $request->email;
    $user->status = $request->status;
    $user->update();
    $user->roles()->sync($roles);
    return redirect()->back()->with('success', 'User updated');
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

  public function updateImage(Request $request, User $user)
  {
    $this->validate($request, [
      'image' => 'image|required',

    ]);

    if ($request->file('image')) {
      $imageFileName = $user->id . '.' . $request->file('image')->getClientOriginalExtension();
      $request->file('image')->storeAs($user->getImageFolder(), $imageFileName);
      $user->image = $imageFileName;
      $user->update();
    }

    return redirect()->back()->with('success', 'User updated');
    
  }
}
