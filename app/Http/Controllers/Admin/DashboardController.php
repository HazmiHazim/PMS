<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        if (Auth::check()) {
            return view('Admin.dashboard');
        }
        else {
            return view('Auth.login');
        }
    }
}
