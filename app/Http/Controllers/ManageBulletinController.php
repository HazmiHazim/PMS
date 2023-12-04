<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageBulletinController extends Controller
{

    public function viewBulletinList(){
        $bulletins = Bulletin::where('expired_at', '>', Carbon::now()->subDays(1))
            ->get();
        $count = 1;

        $status = 1;// Authentication status

        if ($status === 2){
            $petakoms = Bulletin::where('category', 'PETAKOM')
            ->get();
            $facultys = Bulletin::where('category', 'Faculty')
            ->get();
            return view('ManageBulletin.UserBulletinMenu',[
                'petakoms' => $petakoms,
                'facultys' => $facultys,
                'count' => $count
            ]);
        }else{
            return view('ManageBulletin.PtkBulletinMenu',[
                'bulletins' => $bulletins,
                'count' => $count
            ]);
        }

    }

    public function viewBulletinDetails($bulletin_id){
        $bulletin = Bulletin::find($bulletin_id);
        return view('ManageBulletin.ViewBulletin',[
            'bulletin' => $bulletin
        ]);
    }

    public function addBulletin(Request $request){
        // Create Post
        $bulletin = new Bulletin;
        $bulletin->category = $request->input('category');
        $bulletin->title = $request->input('title');
        $bulletin->message = $request->input('message');
        $bulletin->url_reference = $request->input('reference');
        $bulletin->posted_by = 'Kamal';
        $bulletin->duration = $request->input('days');
        $newDateTime = Carbon::now()->addDays($request->input('days'));
        $bulletin->expired_at = $newDateTime;
        $bulletin->save();
        return redirect()->route('manage-bulletin.index')->with('message', 'Bulletin successfully added');
    }

    public function searchBulletin(Request $request){
        $count = 1;
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        if ($request->input('search') != ""){
            $bulletins = Bulletin::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('message', 'LIKE', "%{$search}%")
                ->get();
        }else{
            $bulletins = Bulletin::where('expired_at', '>', Carbon::now()->subDays(1))
            ->get();
        }
        // Return the search view with the resluts compacted
        return view('ManageBulletin.PtkBulletinMenu',[
            'bulletins' => $bulletins,
            'count' => $count
        ]);
    }

    public function editBulletin($bulletin_id){
        $bulletin = Bulletin::find($bulletin_id);
        return view('ManageBulletin.EditBulletin', [
            'bulletin' => $bulletin
        ]);
    }

    public function updateBulletin(Request $request, $bulletin_id){
        $bulletin = Bulletin::find($bulletin_id);
        $bulletin->category = $request->input('category');
        $bulletin->title = $request->input('title');
        $bulletin->message = $request->input('message');
        $bulletin->url_reference = $request->input('reference');
        $bulletin->duration = $request->input('days');
        $newDateTime = Carbon::parse($bulletin->created_at)->addDays($request->input('days'));
        $bulletin->expired_at = $newDateTime;
        $bulletin->save();

        return redirect()->route('manage-bulletin.index')->with('message', 'Bulletin successfully edited');
    }

    public function deleteBulletin(int $bulletin_id){
        $bulletin = Bulletin::find($bulletin_id);
        $bulletin->delete();
        return redirect()->route('manage-bulletin.index');
    }

}
