<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\SchoolYear;
use App\Models\AssignClass;
use App\Models\StudyClassQuiz;
use Auth;

class StudyClassQuizController extends Controller
{
    public function create()
    {
        $quizzes = Quiz::orderby('id', 'desc')->where('status', 1)->get();
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('class_quizzes.create', compact('quizzes', 'assigned_classes'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'quiz_id' => 'required',
            'quiz_time' => 'required|max:2',
            'assigned_to_classes.*' => 'required',
        ]);

        if(empty($request->assigned_to_classes)){
            return redirect()->back()->withStatus(__('Check class to assign this quiz !.'));
        }

        foreach($request->assigned_to_classes as $class){
            StudyClassQuiz::create([
                'study_class_id' => $class,
                'quiz_id' => $request->quiz_id,
                'quiz_time' => $request->quiz_time,
            ]);
        }

        \LogActivity::addToLog('Class quiz Added');
        return redirect()->back()->withStatus(__('Class Quiz Added Successfully !.'));
    }
}
