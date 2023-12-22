<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * View My Profile
     */
    public function index(): View
    {
        $user = Auth::user();
        return view('Admin.UserProfile.index', compact('user'));
    }

    public function updateProfile(Request $request) : RedirectResponse
    {
        // Get authenticated user
        $user = Auth::user();

        if ($request->anyFilled(['name', 'email', 'phone', 'address'])) {
            $updateData = [];

            if ($request->filled('name')) {
                $updateData['name'] = $request->input('name');
            }

            if ($request->filled('email')) {
                $updateData['email'] = $request->input('email');
            }

            if ($request->filled('phone')) {
                $updateData['phone'] = $request->input('phone');
            }

            if ($request->filled('address')) {
                $updateData['address'] = $request->input('address');
            }

            $update = $user->update($updateData);
            return back()->with('success-message', 'Profile updated.');
        }
        else {
            return back()->with('error-message', 'Please fill at least one field to update profile.');
        }
    }

    public function updatePassword(Request $request) : RedirectResponse
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if the current password matches the user's stored password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error-message', 'Your old password is wrong. Please enter the correct password.');
        }

        $update = $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success-message', 'Password updated.');
    }


    /*
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
    */
}
