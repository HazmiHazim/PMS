<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function user_login(Request $request){
        $request->validate([
            'umpid' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('umpid', 'password');

        if(Auth::attempt($credential)){

            $request->session()->regenerate();

            return redirect()->intended('dashboard')->withSucccess('Login');
        }

        return redirect('login')->with('message', 'Login failed');
    }

    public function staff_registration(Request $request) {
        $request->validate([
            'umpid' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'umpid' => $data['umpid'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => '',
            'phone' => '',
            'address' => '',
            'role' => 'Coordinator'
        ]);

        return redirect('registration')->with('message', 'Registration Successfully');
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('login');
    }

    public function indexForgotPassword() {
        return view ('Auth.forgot_password');
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function indexResetPassword($token) {
        return view('Auth.reset_password',
        ['token' => $token]);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'confirm_password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
