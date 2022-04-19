<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use App\Models\SchoolYear;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\AssignClass;
use App\Models\Student;
use App\Models\User;
use App\Models\ChatSystem;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')){
            return view('dashboard.dashboard');
        }elseif(Auth::user()->hasRole('Teacher')){
            $batch = SchoolYear::where('status', 1)->first();
            $study_classes = StudyClass::where('status', 1)->get();
            $subjects = Subject::where('status', 1)->get();
            $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
            return view('dashboard.teacher-dashboard', compact('batch', 'study_classes', 'subjects', 'assigned_classes'));
        }elseif(Auth::user()->hasRole('Student')){
            $batch = SchoolYear::where('status', 1)->first();
            $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
           return view('dashboard.student-dashboard',compact('batch','assigned_classes'));



        }
    }

    public function message(){

        $classmates = Student::where('study_class_id',Auth::user()->hasStudent->study_class_id)->get();


        return view('students.message',compact('classmates'));
    }


    public function chat_message(Request $request){
        // return $request;
     $messages = Chatsystem::where('sender_id',Auth::user()->id)->where('receiver_id', $request->user_id)->orWhere('sender_id',$request->user_id)->orwhere('receiver_id',Auth::user()->id)->get();

     return (string) view('chats.chat', compact('messages'));
    //  return response()->json([
    //      'data' => $chat
    //  ]);
    }
    }

