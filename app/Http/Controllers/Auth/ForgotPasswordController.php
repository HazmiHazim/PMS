<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    // View Forgot Password
    public function index() : View
    {
        return view('Auth.forgot_password');
    }

    public function forgot(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success-message', __($status));
        }
        else {
            return back()->withErrors([
                'error-message' => __($status),
            ]);
        }
    }
}
