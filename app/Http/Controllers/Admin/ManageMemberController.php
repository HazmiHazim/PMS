<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ManageMemberController extends Controller
{
    // View Manage User
    public function index(): View
    {
        // Get all user from collection
        $dean = User::where('role', 'dean')->get();
        $student = User::where('role', 'student')->get();
        $hosd = User::where('role', 'hosd')->get();
        $lecturer = User::where('role', 'lecturer')->get();
        $ptkm = User::where('role', 'ptkm_committee')->get();

        return view('Admin.ManageMember.index', compact('dean', 'student', 'hosd', 'lecturer', 'ptkm'));
    }


    /**
     * Function to view create PETAKOM Member and create PETAKOM Member
     */
    public function viewCreateMember(): View
    {
        return view('Admin.ManageMember.create');
    }

    public function createMember(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'umpid' => 'required|max:9|unique:users,umpid',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:hosd,dean,lecturer,ptkm_committee,student',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Make id to uppercase
        $userid = strtoupper($request->input('umpid'));

        // Make Name to uppercase
        $username = strtoupper($request->input('name'));

        $created = User::create([
            'umpid' => $userid,
            'name' => $username,
            'email' => $request->email,
            //'password' => Hash::make($request->umpid . '@umpsa'),
            'password' => Hash::make('123456789'),
            'role' => $request->role,
        ]);
        
        return back()->with('success-message', 'User added successfully.');
    }


    /**
     * Edit PETAKOM Member
     */
    public function viewEditMember($id) : View
    {
        // Get user based on curcor click
        $user = User::findOrFail($id);
        return view('Admin.ManageMember.edit', compact('user'));
    }

    public function deleteMember($id) : RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('view-member-index')->with('success-message', 'User deleted.');
    }
}
