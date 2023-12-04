<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\ElectedStudent;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectedStudentController extends Controller
{
    public function listElected()
    {
        $elections = ElectedStudent::get();
        $count = 0;

//        dd($elections);
        return view('ManageElection.approve-elected', compact('elections', 'count'));
    }

    public function approve($candidate_id)
    {
        $elected = ElectedStudent::where('candidate_id', $candidate_id)->first();
        if (Auth::user()->role === 'Head of Student Development') {
            $elected->hosd_approval = ApprovalLevel::APPROVED;
            $elected->save();
        }
        if (Auth::user()->role === 'Coordinator') {
            $elected->coo_approval = ApprovalLevel::APPROVED;
            $elected->save();
        }
        return redirect()->route('manage-election.list-elected');
    }

    public function reject($candidate_id)
    {
        $elected = ElectedStudent::where('candidate_id', $candidate_id)->first();
        if (Auth::user()->role === 'Head of Student Development') {
            $elected->hosd_approval = ApprovalLevel::REJECTED;
            $elected->save();
        }
        if (Auth::user()->role === 'Coordinator') {
            $elected->coo_approval = ApprovalLevel::REJECTED;
            $elected->save();
        }
        return redirect()->route('manage-election.list-elected');
    }
}
