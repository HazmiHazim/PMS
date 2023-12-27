<?php

namespace App\Http\Controllers;

use App\Models\PtkActivityModel;
use Illuminate\Http\Request;

class PtkActivityController extends Controller
{

    public function index()
    {
        $activities = PtkActivityModel::all();
        return view(
        'ManagePtkActivity.UserActivityMenu',
        compact('activities'),
    );

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
}


