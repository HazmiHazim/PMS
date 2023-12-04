<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Candidate;
use App\Models\ElectedStudent;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    public function elections()
    {
        $candidates = Candidate::where('petakom_approval', ApprovalLevel::APPROVED)->get();
        $count = 0;

        return view('ManageElection.vote-election', compact('candidates', 'count'));
    }

    public function vote($candidate_id)
    {
        $election = new Election;
        $election->candidate_id = $candidate_id;
        $election->vote_user_id = Auth::id();

        $election->save();

        return redirect()->route('manage-election.elections');
    }

    public function listVotes()
    {
        $candidates = Candidate::get();
        $count = 0;

//        dd($candidates);
        return view('ManageElection.candidate-votes', compact('candidates', 'count'));
    }

    public function declareWinner($candidate_id)
    {
        $elected_std = new ElectedStudent;

        $elected_std->candidate_id = $candidate_id;
        $elected_std->hosd_approval = ApprovalLevel::PENDING;
        $elected_std->coo_approval = ApprovalLevel::PENDING;

        $elected_std->save();
        return redirect()->route('manage-election.list-votes');
    }
}
