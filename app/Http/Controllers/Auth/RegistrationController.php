<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    // View Register
    public function index() : View
    {
        return view('Auth.register');
    }

    // Registering Coordinator
    public function register(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'umpid' => 'required|starts_with:ptkm,PTKM|max:9|unique:users,umpid',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieving input of user id
        $userid = strtoupper($request->input('umpid'));

        // Check if user exists
        $userExists = User::where('umpid', $userid)->exists();

        if ($userExists) {
            return back()->withErrors([
                'error-message' => 'Registration failed. ID is already registered.'
            ]);
        }

        $firstThreeId = substr($userid, 0, 4);

        if ($firstThreeId === "PTKM") {
            $role = 'coordinator';
        }

        $user = User::create([
            'umpid' => $userid,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return back()->with('success-message', 'Register Successful');
    }
}
