<?php

namespace App\Http\Controllers;

use App\Classes\Constants\ApprovalLevel;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    /*
     * Responsible for redirect user to index paga
     * */
    public function index()
    {
        $reports = Report::all();
        // $count = 0;
        return view('Admin.GenerateReport.index', compact('reports'));
        // if (Auth::user()->role === 'Student' || Auth::user()->role === 'Lecturer' || Auth::user()->role === 'PETAKOM Committee') {
        //     $reports = Report::where('OwnerID', Auth::id())->get();
        //     return view('GenerateReport.index', compact('reports', 'count'));
        // }

        // if (Auth::user()->role === 'Coordinator') {
        //     $reports = Report::where('coordinator_approval', ApprovalLevel::PENDING)
        //         ->where('hosd_approval', ApprovalLevel::PENDING)
        //         ->where('dean_approval', ApprovalLevel::PENDING)->get();

        //     return view('GenerateReport.index-approval', compact('reports', 'count'));
        // }

        // if (Auth::user()->role === 'Head of Student Development') {
        //     $reports = Report::where('coordinator_approval', ApprovalLevel::APPROVED)
        //         ->where('hosd_approval', ApprovalLevel::PENDING)
        //         ->where('dean_approval', ApprovalLevel::PENDING)->get();

        //     return view('GenerateReport.index-approval', compact('reports', 'count'));
        // }

        // if (Auth::user()->role === 'Dean') {
        //     $reports = Report::where('coordinator_approval', ApprovalLevel::APPROVED)
        //         ->where('hosd_approval', ApprovalLevel::APPROVED)
        //         ->where('dean_approval', ApprovalLevel::PENDING)->get();

        //     return view('GenerateReport.index-approval', compact('reports', 'count'));
        // }
    }

    /*
     * Responsible for view the report
     * require report id
     * */
    public function view($ReportID)
    {
        $report = Report::where('ReportID', $ReportID)->first();

        return view('Admin.GenerateReport.view', ['report' => $report]);
    }

    /*
    * Redirect user to create report page
    * */
    public function create()
    {
        return view('Admin.GenerateReport.create');
    }

    public function store(Request $request)
    {
        //        dd($request);
                $reportModel = new Report;
        
                $reportModel->OwnerID = Auth::id();
        //        $reportModel->OwnerID = $this->OwnerID;
                $reportModel->title = $request->title;
                $reportModel->report_content = $request->report_content;
                $reportModel->hosd_approval = ApprovalLevel::PENDING;
                $reportModel->coordinator_approval = ApprovalLevel::PENDING;
                $reportModel->dean_approval = ApprovalLevel::PENDING;
        
                $reportModel->save();
        
                return back()->with('success-message', 'Report submitted.');
                // return redirect()->route('Admin.GenerateReport.index');
    }

    public function edit($ReportID)
    {
        $report = Report::findOrFail($ReportID);
        return view('Admin.GenerateReport.edit', compact('reports'));
    }

//     /*
//      * responsible for store report
//      * */
//     public function store(Request $request)
//     {
// //        dd($request);
//         $reportModel = new Report;

//         $reportModel->OwnerID = Auth::id();
// //        $reportModel->OwnerID = $this->OwnerID;
//         $reportModel->title = $request->title;
//         $reportModel->report_content = $request->report_content;
//         $reportModel->hosd_approval = ApprovalLevel::PENDING;
//         $reportModel->coordinator_approval = ApprovalLevel::PENDING;
//         $reportModel->dean_approval = ApprovalLevel::PENDING;

//         $reportModel->save();

//         return redirect()->route('Admin.GenerateReport.index');
//     }


//     /*
//      * responsible for edit report
//      * require report id
//      * */
//     public function edit($ReportID)
//     {
//         $report = Report::where('ReportID', $ReportID)->first();

//         return view('GenerateReport.edit', ['report' => $report]);
//     }


//     /*
//      * responsible for update report
//      * require report id, and request object
//      * */
//     public function update(Request $request, $ReportID)
//     {
//         $reportModel = Report::find($ReportID);

//         $reportModel->OwnerID = Auth::id();
// //        $reportModel->OwnerID = $this->OwnerID;
//         $reportModel->title = $request->title;
//         $reportModel->report_content = $request->report_content;
//         $reportModel->hosd_approval = ApprovalLevel::PENDING;
//         $reportModel->coordinator_approval = ApprovalLevel::PENDING;
//         $reportModel->dean_approval = ApprovalLevel::PENDING;

//         $reportModel->save();

//         return redirect()->route('manage-report.index');
//     }


//     /*
//      * responsible for approve report
//      * */
//     public function approve($ReportID)
//     {
//         if (Auth::user()->role === 'Coordinator') {
//             $this->coordinatorApproval($ReportID);
//         }

//         if (Auth::user()->role === 'Head of Student Development') {
//             $this->hosdApproval($ReportID);
//         }

//         if (Auth::user()->role === 'Dean') {
//             $this->deanApproval($ReportID);
//         }

//         return redirect()->route('manage-report.index');
//     }


//     /*
//      * responsible for reject report
//      * */
//     public function reject($ReportID)
//     {
//         if (Auth::user()->role === 'Coordinator') {
//             $this->coordinatorReject($ReportID);
//         }

//         if (Auth::user()->role === 'Head of Student Development') {
//             $this->hosdReject($ReportID);
//         }

//         if (Auth::user()->role === 'Dean') {
//             $this->deanReject($ReportID);
//         }

//         return redirect()->route('manage-report.index');
//     }


//     /*
//      * Head of Student Development approve report
//      * */
//     public function hosdApproval($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->hosd_approval = ApprovalLevel::APPROVED;
//         $reportModel->save();

//     }


//     /*
//      * coordinator approval report
//      * */
//     public function coordinatorApproval($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->coordinator_approval = ApprovalLevel::APPROVED;
//         $reportModel->save();

//     }


//     /*
//      * dean approval report
//      * */
//     public function deanApproval($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->dean_approval = ApprovalLevel::APPROVED;
//         $reportModel->save();

//     }

//     /*
//      * Head of Student Development reject report
//      * */
//     public function hosdReject($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->hosd_approval = ApprovalLevel::REJECTED;
//         $reportModel->save();

//     }

//     /*
//      * coordinator reject report
//      * */
//     public function coordinatorReject($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->coordinator_approval = ApprovalLevel::REJECTED;
//         $reportModel->save();

//     }


//     /*
//      * dean reject report
//      * */
//     public function deanReject($ReportID)
//     {
//         $reportModel = Report::where('ReportID', $ReportID)->first();

//         $reportModel->dean_approval = ApprovalLevel::REJECTED;
//         $reportModel->save();

//     }
}
