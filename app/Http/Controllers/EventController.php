<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        return view('events.calendar',compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $model = Event::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
        ]);
        if($model){
            \LogActivity::addToLog('Event Added');
            return redirect()->route('calendar-show')->withStatus(__('Event Added Successfully !.'));
        }
    }
    public function destroy($id)
    {
        $model = Event::where('id', $id)->delete();
        if($model){
            \LogActivity::addToLog('Event Deleted');
            return redirect()->route('event.index')->withStatus(__('Event successfully deleted.'));
        }
    }
}
