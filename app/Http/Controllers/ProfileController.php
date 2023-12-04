<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }

    function edit(){
        $data = User::findOrFail(Auth::user()->id);
        // dd(Auth::user()->id);
        return view('UserProfile.edit', compact('data'));
    }

    function edit_validation(Request $request){
        // dd($request);
        $request->validate([
            'umpid' => 'required',
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);


        $data = $request->all();

        $form_data = array(
            'umpid' => $data['umpid'],
            'email' => $data['email'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address']
        );


        User::where('id',Auth::user()->id)->update($form_data);

        return redirect('edit')->with('message', 'Profile Updated');
    }

    function password(){
        $data = User::findOrFail(Auth::user()->id);
        return view('UserProfile.change_password', compact('data'));
    }

    function changePassword(Request $request){
        // dd($request);
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => ['same:new_password']
        ]);


        $data = $request->all();

        $form_data = array(
            'password' => Hash::make($data['new_password']),
        );


        User::where('id',Auth::user()->id)->update($form_data);

        return redirect('password')->with('message', 'Password Changed');
    }

    function view(){
        $data = User::findOrFail(Auth::user()->id);
        return view('UserProfile.view', compact('data'));
    }

    function view_profile(Request $request){
        // dd($request);
        $request->validate([
            'umpid' => 'required',
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
    }

    function member_register(Request $request){
        // dd($request);
        $request->validate([
            'umpid' => 'required',
            'role' => 'required'
        ]);

        $data = $request->all();

        User::create([
            'umpid' => $data['umpid'],
            'role' => $data['role'],
            'password' => Hash::make('password'),
            'email' => '',
            'name' => '',
            'phone' => '',
            'address' => '',
        ]);

        return redirect('register_member')->with('message', 'Member Added Successfully');
    }

    public function register_member() {
        return view('UserProfile.register_member');
    }
}
