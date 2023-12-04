<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function candidates()
    {
        $candidates = Candidate::get();
        $count = 0;

        return view('ManageElection.candidates', compact('candidates', 'count'));
    }

    public function listCandidates()
    {
        $candidates = Candidate::get();
        $count = 0;

        return view('ManageElection.approve-candidates', compact('candidates', 'count'));
    }

    public function registerCandidate()
    {
        $candidate = Candidate::where('id', Auth::id())->first();

        if (is_null($candidate)) {
            $candidate = new Candidate;

            $candidate->id = Auth::id();
            $candidate->petakom_approval = ApprovalLevel::PENDING;

            $candidate->save();

            return redirect()->route('manage-election.candidates');
        } else {
            return redirect()->route('manage-election.candidates')->with('error', 'Already Registered');
        }

    }

    public function approveCandidate($candidate_id)
    {

        $candidate = Candidate::find($candidate_id);

        $candidate->petakom_approval = ApprovalLevel::APPROVED;

        $candidate->save();

        return redirect()->route('manage-election.list-candidates');
    }

    public function rejectCandidate($candidate_id)
    {
        $candidate = Candidate::find($candidate_id);

        $candidate->petakom_approval = ApprovalLevel::REJECTED;

        $candidate->save();
        return redirect()->route('manage-election.list-candidates');
    }
}
