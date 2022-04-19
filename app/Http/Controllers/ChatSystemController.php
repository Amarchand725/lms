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

class ChatSystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function message(){
        $classmates = Student::where('study_class_id',Auth::user()->hasStudent->study_class_id)->get();
        return view('chats.message',compact('classmates'));
    }

    public function chat_message(Request $request){
        if($request->user_id == Auth::user()->id){
            $messages = Chatsystem::where('sender_id', Auth::user()->id)->where('receiver_id', Auth::user()->id)->get();
        }else{
            $messages = Chatsystem::where('sender_id',Auth::user()->id)->where('receiver_id', $request->user_id)->orWhere('sender_id',$request->user_id)->where('receiver_id',Auth::user()->id)->get();
        }

        return (string) view('chats.chat', compact('messages'));
    }

    public function save_chat(Request $request){
        return $request;
    }
}
