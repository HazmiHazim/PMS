<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    /*
     * Responsible for redirect user to index paga
     * */
    public function index()
    {

        $count = 0;

        if (Auth::user()->role === 'Student' || Auth::user()->role === 'Lecturer' || Auth::user()->role === 'PETAKOM Committee') {
            $proposals = Proposal::where('OwnerID', Auth::id())->get();

            return view('GenerateProposal.index', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Coordinator') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::PENDING)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::PENDING)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }

        if (Auth::user()->role === 'Dean') {
            $proposals = Proposal::where('coordinator_approval', ApprovalLevel::APPROVED)
                ->where('hosd_approval', ApprovalLevel::APPROVED)
                ->where('dean_approval', ApprovalLevel::PENDING)->get();

            return view('GenerateProposal.index-approval', compact('proposals', 'count'));
        }
    }

    /*
     * Responsible for view the proposal
     * require proposal id
     * */
    public function view($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        return view('GenerateProposal.view', ['proposal' => $proposalModel]);
    }

    /*
     * Redirect user to create proposal page
     * */
    public function create()
    {
        return view('GenerateProposal.create');
    }

    /*
     * responsible for store proposal
     * */
    public function store(Request $request)
    {
        $proposalModel = new Proposal;

        $proposalModel->OwnerID = Auth::id();
//        $proposalModel->OwnerID = 1;
        $proposalModel->title = $request->title;
        $proposalModel->proposal_content = $request->proposal_content;
        $proposalModel->hosd_approval = ApprovalLevel::PENDING;
        $proposalModel->coordinator_approval = ApprovalLevel::PENDING;
        $proposalModel->dean_approval = ApprovalLevel::PENDING;

        $proposalModel->save();

        return redirect()->route('manage-proposal.index');
    }

    /*
     * responsible for edit proposal
     * require proposal id
     * */
    public function edit($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        return view('GenerateProposal.edit', ['proposal' => $proposalModel]);
    }

    /*
     * responsible for update proposal
     * require proposal id, and request object
     * */
    public function update(Request $request, $ProposalID)
    {
        $proposalModel = Proposal::find($ProposalID);

        $proposalModel->OwnerID = Auth::id();
//        $proposalModel->OwnerID = $this->OwnerID;
        $proposalModel->title = $request->title;
        $proposalModel->proposal_content = $request->proposal_content;
        $proposalModel->hosd_approval = ApprovalLevel::PENDING;
        $proposalModel->coordinator_approval = ApprovalLevel::PENDING;
        $proposalModel->dean_approval = ApprovalLevel::PENDING;

        $proposalModel->save();

        return redirect()->route('manage-proposal.index');
    }


    /*
     * responsible for approve proposal
     * */
    public function approve($ProposalID)
    {
        if (Auth::user()->role === 'Coordinator') {
            $this->coordinatorApproval($ProposalID);
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $this->hosdApproval($ProposalID);
        }

        if (Auth::user()->role === 'Dean') {
            $this->deanApproval($ProposalID);
        }

        return redirect()->route('manage-proposal.index');
    }


    /*
     * responsible for reject proposal
     * */
    public function reject($ProposalID)
    {
        if (Auth::user()->role === 'Coordinator') {
            $this->coordinatorReject($ProposalID);
        }

        if (Auth::user()->role === 'Head of Student Development') {
            $this->hosdReject($ProposalID);
        }

        if (Auth::user()->role === 'Dean') {
            $this->deanReject($ProposalID);
        }

        return redirect()->route('manage-proposal.index');
    }

    /*
     * Head of Student Development approve proposal
     * */
    public function hosdApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->hosd_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }


    /*
     * coordinator approval proposal
     * */
    public function coordinatorApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->coordinator_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }


    /*
     * dean approval proposal
     * */
    public function deanApproval($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->dean_approval = ApprovalLevel::APPROVED;
        $proposalModel->save();


    }


    /*
     * Head of Student Development reject proposal
     * */
    public function hosdReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->hosd_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }


    /*
     * coordinator reject proposal
     * */
    public function coordinatorReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->coordinator_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }

    /*
     * dean reject proposal
     * */
    public function deanReject($ProposalID)
    {
        $proposalModel = Proposal::where('ProposalID', $ProposalID)->first();

        $proposalModel->dean_approval = ApprovalLevel::REJECTED;
        $proposalModel->save();


    }
}
