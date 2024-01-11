<?php

namespace App\Http\Controllers;

use App\Models\PtkActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PtkActivityController extends Controller
{

    public function index()
    {
        // $activities = PetakomActivityModel::all();
        return view(  //utk tunjuk interface sahaja
            'Admin.ManagePtkActivity.UserActivityMenu',
            compact('activities'),
        );
    }

    public function addActivity(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'CLUB_NAME' => 'required|max:255',
            'ADVISOR_CLUB_NAME' => 'required|max:255',
            'ACTIVITY_NAME' => 'required|max:255',
            'ACTIVITY_TYPE' => 'required|max:255',
            'PARTICIPANT_NUM' => 'required|max:255',
            'VENUE' => 'required|max:255',
            'ACTIVITY_STARTDATE' => 'required|max:255',
            'ACTIVITY_ENDDATE' => 'required|max:255',
            'ACTIVITY_STARTTIME' => 'required|max:255',
            'ACTIVITY_ENDTIME' => 'required|max:255',
            'BUDGET' => 'required|max:255|in:thousand,fiveThousand,eightThousand,tenThousand,infinity',

        ]);

        if ($validate->fails()) {
            // dd($validate);
            return back()->withErrors($validate)->withInput();
        }
        //dd($validate);
        $data = PtkActivity::create([
            'CLUB_NAME' => $request->CLUB_NAME,
            'ADVISOR_CLUB_NAME' => $request->ADVISOR_CLUB_NAME,
            'ACTIVITY_NAME' => $request->ACTIVITY_NAME,
            'ACTIVITY_TYPE' => $request->ACTIVITY_TYPE,
            'PARTICIPANT_NUM' => $request->PARTICIPANT_NUM,
            'VENUE' => $request->VENUE,
            'ACTIVITY_STARTDATE' => $request->ACTIVITY_STARTDATE,
            'ACTIVITY_ENDDATE' => $request->ACTIVITY_ENDDATE,
            'ACTIVITY_STARTTIME' => $request->ACTIVITY_STARTTIME,
            'ACTIVITY_ENDTIME' => $request->ACTIVITY_ENDTIME,
            'BUDGET' => $request->BUDGET,
        ]);

        return back()->with('successMsg', 'Add Activity Success');
    }


    public function create()
    {
        return view('Admin.ManagePtkActivity.AddActivity');
    }

    /*
    
    public function index()
    {
        $activities = PtkActivityModel::all();
        return view('ManagePtkActivity.UserActivityMenu')->with('activities', $activities);
    
    }

   
    public function create()
    {
        return view('ManagePtkActivity.AddActivity');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        PtkActivityModel::create($input);
        return redirect('PtkActivity')->with('flash_message', 'Activity Added!'); 
    }

    
    public function show($id)
    {
        $activity = PtkActivityModel::find($id);
        return view('ManagePtkActivity.ViewActivity')->with('activities', $activity);
    }

    
    public function edit($id)
    {
        $activity = PtkActivityModel::find($id);
        
        return view('ManagePtkActivity.EditActivity')->with('activities', $activity);
    }

    
    public function update(Request $request, $id)
    {
        $activity = PtkActivityModel::find($id);
        $input = $request->all();
        $activity->update($input);
    
        return redirect('PtkActivity')->with('flash_message', 'activity Updated!');  
    }

    public function destroy($id)
    {
        PtkActivityModel::destroy($id);
        return redirect('PtkActivity')->with('flash_message', 'activity deleted!'); 
    }
    */
}


