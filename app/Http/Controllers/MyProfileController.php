<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{

    public function index()
    {
        // $user = request()->user();
        return view('MyProfile.index');
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->update();

        if ($request->wantsJson()) {
            return response()->json($user, 200);
        }

        return redirect()->back()->with('success', 'Profile updated');
    }


    public function updatePassword(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if (!(Hash::check($request->current_password, $user->password))) {
            // The passwords matches
            if ($request->wantsJson()) {
                return response()->json('Your current password does not matches with the password you provided. Please try again.', 422);
            }
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->current_password, $request->password) == 0) {
            if ($request->wantsJson()) {
                return response()->json('New Password cannot be same as your current password. Please choose a different password.', 422);
            }
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $user->password = Hash::make($request->get('password'));
        $user->update();
        if ($request->wantsJson()) {
            return response()->json($user, 200);
        }

        return redirect()->back()->with('success', 'Password updated');
    }
}

