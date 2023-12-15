<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use function Ramsey\Uuid\v1;

class ManageBulletinController extends Controller
{
    // View Bulletin
    public function index() : View
    {
        $bulletin = Bulletin::all();
        return view('Admin.ManageBulletin.index', compact('bulletin'));
    }

    public function viewOfficialBulletin() : View
    {
        $bulletin = Bulletin::where('category', 'official')->get();
        return view('Admin.ManageBulletin.official', compact('bulletin'));
    }

    public function viewUnofficialBulletin() : View
    {
        $bulletin = Bulletin::where('category', 'unofficial')->get();
        return view('Admin.ManageBulletin.unofficial', compact('bulletin'));
    }


    /**
     * Create New Bulletin
     */
    public function viewCreateBulletin() : View
    {
        return view('Admin.ManageBulletin.create');
    }

    public function createBulletin(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|in:official,unofficial',
            'title' => 'required|max:255',
            'message' => 'required|max:9999999',
            'url_reference' => 'required',
            'duration' => 'required|numeric|integer',
            'expired' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $bulletin = Bulletin::create([
            'posted_by' => Auth::user()->umpid,
            'category' => $request->category,
            'title' => $request->title,
            'message' => $request->message,
            'url_reference' => $request->url_reference,
            'duration' => $request->duration,
            'expired_at' => Carbon::createFromFormat('d/m/Y', $request->expired),
        ]);

        return back()->with('success-message', 'New announcement has been created.');
    }

    /*
    public function viewBulletinList()
    {
        $bulletins = Bulletin::where('expired_at', '>', Carbon::now()->subDays(1))
            ->get();
        $count = 1;

        $status = 1; // Authentication status

        if ($status === 2) {
            $petakoms = Bulletin::where('category', 'PETAKOM')
                ->get();
            $facultys = Bulletin::where('category', 'Faculty')
                ->get();
            return view('ManageBulletin.UserBulletinMenu', [
                'petakoms' => $petakoms,
                'facultys' => $facultys,
                'count' => $count
            ]);
        } else {
            return view('ManageBulletin.PtkBulletinMenu', [
                'bulletins' => $bulletins,
                'count' => $count
            ]);
        }
    }

    public function viewBulletinDetails($bulletin_id)
    {
        $bulletin = Bulletin::find($bulletin_id);
        return view('ManageBulletin.ViewBulletin', [
            'bulletin' => $bulletin
        ]);
    }

    public function addBulletin(Request $request)
    {
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

    public function searchBulletin(Request $request)
    {
        $count = 1;
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        if ($request->input('search') != "") {
            $bulletins = Bulletin::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('message', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $bulletins = Bulletin::where('expired_at', '>', Carbon::now()->subDays(1))
                ->get();
        }
        // Return the search view with the resluts compacted
        return view('ManageBulletin.PtkBulletinMenu', [
            'bulletins' => $bulletins,
            'count' => $count
        ]);
    }

    public function editBulletin($bulletin_id)
    {
        $bulletin = Bulletin::find($bulletin_id);
        return view('ManageBulletin.EditBulletin', [
            'bulletin' => $bulletin
        ]);
    }

    public function updateBulletin(Request $request, $bulletin_id)
    {
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

    public function deleteBulletin(int $bulletin_id)
    {
        $bulletin = Bulletin::find($bulletin_id);
        $bulletin->delete();
        return redirect()->route('manage-bulletin.index');
    }
    */
}
