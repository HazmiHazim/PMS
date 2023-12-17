<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Calendar::whereDate('startDate', '>=', $request->start)
                ->whereDate('endDate',   '<=', $request->end)
                ->get(['id', 'event_name', 'event_detail', 'startDate', 'endDate']);
            return response()->json($data);
        }
        return view('calendar.Calendar');
    }

    public function calendarEvents(Request $request)
    {

        switch ($request->type) {
            case 'create':
                $event = Calendar::create([
                    'event_name' => $request->event_name,
                    'event_detail' => $request->event_detail,
                    'startDate' => $request->startDate,
                    'endDate' => $request->endDate,
                ]);

                return response()->json($event);
                break;

            case 'edit':
                $event = Calendar::find($request->id)->update([
                    'event_name' => $request->event_name,
                    'event_detail' => $request->event_detail,
                    'startDate' => $request->startDate,
                    'endDate' => $request->endDate,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Calendar::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # ...
                break;
        }
    }
}
