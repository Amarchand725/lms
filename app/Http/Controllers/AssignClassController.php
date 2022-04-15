<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignClass;
use App\Models\SchoolYear;

use Auth;

class AssignClassController extends Controller
{
    public function index()
    {
        $batch = SchoolYear::where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();

       return view('dashboard.student-dashboard',compact('batch','assigned_classes'));  
    }

    public function store(Request $request)
    {
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
