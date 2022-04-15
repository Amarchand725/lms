<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignClass;
use App\Models\SchoolYear;
<<<<<<< HEAD

=======
use App\Models\StudyClass;
use App\Models\Subject;
>>>>>>> f357a2468a5d9a4ea206454b9e7de5a1b382e97a
use Auth;

class AssignClassController extends Controller
{
    public function index()
    {
        $batch = SchoolYear::where('status', 1)->first();
<<<<<<< HEAD
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();

       return view('dashboard.student-dashboard',compact('batch','assigned_classes'));  
=======
        $study_classes = StudyClass::where('status', 1)->get();
        $subjects = Subject::where('status', 1)->get();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('dashboard.teacher-dashboard', compact('batch', 'study_classes', 'subjects', 'assigned_classes'));
>>>>>>> f357a2468a5d9a4ea206454b9e7de5a1b382e97a
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject_id' => 'required',
            'study_class_id' => 'required',
        ]);

        $assigned = AssignClass::where('study_class_id', $request->study_class_id)
                    ->where('subject_id', $request->subject_id)
                    ->where('school_year_id', $request->school_year_id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
        if(!empty($assigned)){
            $this->validate($request, [
                'subject_id' => 'required|unique:assign_classes',
            ]);
        }

        $model = AssignClass::create([
            'user_id' => Auth::user()->id,
            'study_class_id' => $request->study_class_id,
            'subject_id' => $request->subject_id,
            'school_year_id' => $request->school_year_id,
        ]);

        if($model){
            return redirect()->back()->withStatus(__('You have added class successfully.'));
        }
    }

    public function destroy($id)
    {
        $model = AssignClass::where('id', $id)->first();
        if($model){
            $model->delete();
            \LogActivity::addToLog('Asigned class removed');
            return true;
        }else{
            return false;
        }
    }
}
