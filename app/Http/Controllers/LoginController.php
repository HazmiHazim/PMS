<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('Login');
    }
    
    function validate_login(Request $request)
    {
        $request->validate([
            'CDN_ID'        =>      'required',
            'CDN_Pass'      =>      'required'
        ]);

        $credentials = $request->only('CDN_ID', 'CDN_Pass');

        if(Auth::attemp($credentials))
        {
            return redirect('Dashboard');
        }

        return redirect('Login')->with('Login Successful', 'Password is incorrect');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('Dashboard');
        }

        return redirect('Login')->with('Login Successful','Failed to login');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('Login');
    }
}