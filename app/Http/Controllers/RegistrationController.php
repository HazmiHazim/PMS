<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    function registration()
    {
        return view('Registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'CDN_ID'        =>      'required|CDN_ID|unique:users',
            'CDN_Email'     =>      'required',
            'CDN_Pass'      =>      'required|min:10'
        ]);

        $data = $request->all();

        User::create([
            'CDN_ID'         =>      $data['CDN_ID'],
            'CDN_Email'      =>      $data['CDN_Email'],
            'CDN_Pass'       =>      Hash::make($data['CDN_Pass'])
        ]);

        return redirect('Login')->with('success', 'Registration Completed');
    }
}