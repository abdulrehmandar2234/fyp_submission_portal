<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');

    }
    public function changePassword(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->get('password'), auth()->user()->password))) {
            // The passwords matches
            return back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Password changed successfully');
    }
}
