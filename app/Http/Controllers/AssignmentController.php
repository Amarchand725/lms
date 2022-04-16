<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\SchoolYear;
use App\Models\AssignClass;
use App\Models\AssignedClass;
use App\Models\Student;
use App\Models\Notification;
use App\Models\ReadNotification;
use Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Assignment::orderby('id', 'desc')->paginate(10);
        return view('assignments.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('assignments.create', compact('assigned_classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'assigned_to_classes.*' => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $model = new Assignment();

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/assignments'), $file);
            $model->file = $file;
        }

        $model->created_by = Auth::user()->id;
        $model->name = $request->name;
        $model->description = $request->description;
        $model->save();

        if(!empty($model)){
            $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
            $notification = Notification::create([
                'user_id' => Auth::user()->id,
                'notify_id' => $model->id,
                'notify_type' => 'assignment',
                'notification' => 'Assignment added new',
            ]);
            foreach($request->assigned_to_classes as $study_class){
                $students = Student::where('study_class_id', $study_class)->where('batch_id', $batch->id)->get(['user_id']);
                AssignedClass::create([
                    'notify_id' => $model->id,
                    'notify_type' => 'assignment',
                    'study_class_id' => $study_class,
                ]);

                foreach($students as $student){
                    ReadNotification::create([
                        'notification_id' => $notification->id,
                        'user_id' => $student->user_id,
                    ]);
                }
            }
        }

        \LogActivity::addToLog('Assignment Added');
        return redirect()->route('assignment.index')->withStatus(__('Assignment Added Successfully !.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('assignments.edit', compact('assignment', 'assigned_classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'assigned_to_classes.*' => 'required',
        ]);

        $model = $assignment;

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/assignments'), $file);
            $model->file = $file;
        }

        $model->name = $request->name;
        $model->description = $request->description;
        $model->save();

        if(!empty($model)){
            $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
            $notification = Notification::where('notify_id', $model->id)->first();
            AssignedClass::where('notify_id', $model->id)->delete();
            ReadNotification::where('notification_id', $notification->id)->delete();
            foreach($request->assigned_to_classes as $study_class){
                $students = Student::where('study_class_id', $study_class)->where('batch_id', $batch->id)->get(['user_id']);
                AssignedClass::create([
                    'notify_id' => $model->id,
                    'notify_type' => 'assignment',
                    'study_class_id' => $study_class,
                ]);

                foreach($students as $student){
                    ReadNotistudentsfication::create([
                        'notification_id' => $notification->id,
                        'user_id' => $student->user_id,
                    ]);
                }
            }
        }

        \LogActivity::addToLog('Assignment Updated');
        return redirect()->route('assignment.index')->withStatus(__('Assignment updated Successfully !.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $model = $assignment->first();
        if($model){
            AssignedClass::where('notify_id', $model->id)->where('notify_type', 'assignment')->delete();
            $notify = Notification::where('notify_id', $model->id)->first();
            if($notify){
                ReadNotification::where('notification_id', $notify->id)->delete();
                $notify->delete();
            }
            $model->delete();
            \LogActivity::addToLog('Assignment Deleted');
            return redirect()->route('assignment.index')->withStatus(__('Assignment successfully deleted.'));
        }
    }
}
