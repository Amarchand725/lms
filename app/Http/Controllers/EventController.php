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


    public function index(){



        $events = Event::where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        // print_r($events);exit;
        $id = Auth::user()->id;

        return view('events.calendar',compact('id','events'));
    }

    public function storing_event(Request $request){

     $data = Event::create([
         'user_id' => $request->id,
         'title' => $request->title,
         'starting_date' => $request->starting_date,
         'ending_date' => $request->ending_date,
         'status' => $request->status
     ]);

     if($data){

        return redirect()->route('calendar.show');
     }
     else{

        return '<script>alert("unable to save data")</script>';
     }


        
    }
   
}
