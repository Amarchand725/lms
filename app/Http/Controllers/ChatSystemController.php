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
use App\Models\UserLog;
use App\Models\Teacher;
use Auth;

class ChatSystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function message(){

        if(Auth::user()->hasRole('Admin')){

          
            $students = Student::where('status', 1)->get();
            $teachers = Teacher::where('status', 1)->get();
            return view('chats.message',compact('students', 'teachers',));
        }

        elseif(Auth::user()->hasRole('Student')){

        
            $students = Student::where('study_class_id', Auth::user()->hasStudent->study_class_id)->get();
            $assigned_teachers = AssignClass::where('study_class_id', Auth::user()->hasStudent->study_class_id)->get(['user_id']);
            $teachers = Teacher::orderby('id', 'desc')->whereIn('user_id', $assigned_teachers)->where('status', 1)->get();
            $admin = User::where('id',1)->first();
            return view('chats.message',compact('students', 'teachers','admin'));


        }
        elseif(Auth::user()->hasRole('Teacher')){
            $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->get(['study_class_id']);
            $students = Student::whereIn('study_class_id', $assigned_classes)->get();
            $teachers = Teacher::orderby('id', 'desc')->where('status', 1)->get();
            $admin = User::where('id',1)->first();
            return view('chats.message',compact('students', 'teachers','admin'));
        }
    }

    public function chat_message(Request $request){
        if($request->reciever_id == Auth::user()->id){

            $messages = Chatsystem::where('sender_id', Auth::user()->id)->where('reciever_id', Auth::user()->id)->get(); 
        }else{
            Chatsystem::where('sender_id', $request->reciever_id)->where('reciever_id', Auth::user()->id)->where('is_read', 0)->update(['is_read'=>1]);
            $messages = Chatsystem::where('sender_id',Auth::user()->id)->where('reciever_id', $request->reciever_id)->orWhere('sender_id',$request->reciever_id)->where('reciever_id',Auth::user()->id)->get();
        }

        $user = User::where('id', $request->reciever_id)->first()->name;
        $login_status = UserLog::orderby('id', 'desc')->where('user_id', $request->reciever_id)->where('logged_out', null)->first();
        if($login_status){
            $login_status = 1;
        }else{
            $login_status = 0;
        }

        $chat = (string) view('chats.chat', compact('messages'));
        return response()->json([
            'login_status' => $login_status,
            'user' => $user,
            'chat' => $chat,
        ]);
    }

    public function save_chat(Request $request){
        $model = new ChatSystem();

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/chats'), $file);
            $model->file = $file;
        }

        $model->sender_id = Auth::user()->id; 
        $model->reciever_id = $request->reciever_id; 
        $model->message = $request->message; 
        $model->save();

        if($request->reciever_id == Auth::user()->id){
            $messages = Chatsystem::where('sender_id', Auth::user()->id)->where('reciever_id', Auth::user()->id)->get(); 
        }else{
            $messages = Chatsystem::where('sender_id', Auth::user()->id)->where('reciever_id', $request->reciever_id)->orWhere('sender_id',$request->reciever_id)->where('reciever_id',Auth::user()->id)->get();
        }

        return (string) view('chats.chat', compact('messages'));
    }
}
