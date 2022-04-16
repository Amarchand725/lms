<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\SchoolYear;
use App\Models\AssignClass;
use App\Models\AssignedClass;
use App\Models\Notification;
use App\Models\ReadNotification;
use App\Models\Student;
use Illuminate\Http\Request;
use Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Announcement::orderby('id', 'desc')->where('created_by', Auth::user()->id)->paginate(10);
        return view('announcements.index', compact('models'));
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
        return view('announcements.create', compact('assigned_classes'));
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
            'assigned_to_classes.*' => 'required',
            'title' => 'required|max:255',
            'announcement' => 'required|max:1000',
        ]);

        $model = Announcement::create([
            'created_by' => Auth::user()->id,
            'title' => $request->title,
            'announcement' => $request->announcement,
        ]);
        if(!empty($model)){
            $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
            $notification = Notification::create([
                'user_id' => Auth::user()->id,
                'notify_id' => $model->id,
                'notify_type' => 'announcement',
                'notification' => 'An announcement added new',
            ]);
            foreach($request->assigned_to_classes as $study_class){
                $students = Student::where('study_class_id', $study_class)->where('batch_id', $batch->id)->get(['user_id']);
                AssignedClass::create([
                    'notify_id' => $model->id,
                    'notify_type' => 'announcement',
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

        \LogActivity::addToLog('Announcement Added');
        return redirect()->route('announcement.index')->withStatus(__('Announcement added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('announcements.edit', compact('announcement', 'assigned_classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        /* $this->validate($request, [
            'study_class_id' => 'required',
            'announcement' => 'required|max:1000',
        ]);

        $announcement->study_class_id = $request->study_class_id;
        $announcement->announcement = $request->announcement;
        $announcement->save();

        if(!empty($announcement)){
            \LogActivity::addToLog('Announcement updated');
            return redirect()->route('announcement.index')->withStatus(__('Announcement updated successfully.'));
        } */

        $this->validate($request, [
            'title' => 'required|max:255',
            'announcement' => 'max:255',
            'assigned_to_classes.*' => 'required',
        ]);

        $model = $announcement;
        $model->title = $request->title;
        $model->announcement = $request->announcement;
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
                    'notify_type' => 'announcement',
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

        \LogActivity::addToLog('Announcement Updated');
        return redirect()->route('announcement.index')->withStatus(__('Announcement updated Successfully !.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $model = $announcement->first();
        if($model){
            AssignedClass::where('notify_id', $model->id)->where('notify_type', 'announcement')->delete();
            $notify = Notification::where('notify_id', $model->id)->first();
            if($notify){
                ReadNotification::where('notification_id', $notify->id)->delete();
                $notify->delete();
            }
            $model->delete();
            \LogActivity::addToLog('Announcement Deleted');
            return redirect()->route('announcement.index')->withStatus(__('Announcement successfully deleted.'));
        }
    }
}
