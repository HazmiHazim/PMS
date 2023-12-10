<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class LoginController extends Controller
{
    // View Login
    public function index(): View
    {
        if (Auth::check()) {
            return view('Admin.dashboard');
        }
        else {
            return view('Auth.login');
        }
    }

    /**
     * Handle an authentication attempt
     */
    public function login(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'umpid' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success-message', 'Login Successful.');
        }

        return back()->withErrors([
            'error-message' => 'The provided credentials do not match our records.',
        ])->onlyInput('umpid');
    }

    /**
     * Logout the user
     */
    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
