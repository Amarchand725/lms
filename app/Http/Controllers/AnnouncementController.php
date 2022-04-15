<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\SchoolYear;
use App\Models\AssignClass;
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
        $study_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('announcements.create', compact('study_classes'));
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
            'study_class_id' => 'required',
            'announcement' => 'required|max:1000',
        ]);

        $model = Announcement::create([
            'created_by' => Auth::user()->id,
            'study_class_id' => $request->study_class_id,
            'announcement' => $request->announcement,
        ]);
        if(!empty($model)){
            \LogActivity::addToLog('Announcement Added');
            return redirect()->route('announcement.index')->withStatus(__('Announcement added successfully.'));
        }
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
        $study_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('announcements.edit', compact('announcement', 'study_classes'));
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
        $this->validate($request, [
            'study_class_id' => 'required',
            'announcement' => 'required|max:1000',
        ]);

        $announcement->study_class_id = $request->study_class_id;
        $announcement->announcement = $request->announcement;
        $announcement->save();

        if(!empty($announcement)){
            \LogActivity::addToLog('Announcement updated');
            return redirect()->route('announcement.index')->withStatus(__('Announcement updated successfully.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $model = $announcement->delete();
        if($model){
            \LogActivity::addToLog('Announcement Deleted');
            return redirect()->route('announcement.index')->withStatus(__('Announcement successfully deleted.'));
        }
    }
}