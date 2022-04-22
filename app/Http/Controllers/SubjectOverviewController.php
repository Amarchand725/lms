<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectOverview;
use App\Models\Subject;
use Auth;

class SubjectOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = SubjectOverview::orderby('id', 'desc')->paginate(10);
        return view('subject_overview.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::where('status', 1)->get();
        return view('subject_overview.create', compact('subjects'));
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
            'subject_id' => 'required',
            'overview' => 'max:1000',
        ]);

        $model = new SubjectOverview();
        $model->created_by = Auth::user()->id;
        $model->subject_id = $request->subject_id;
        $model->overview = $request->overview;
        $model->save();
        
        \LogActivity::addToLog('Subject Overview Added');
        return redirect()->route('subject_overview.index')->withStatus(__('Subject overview successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectOverview  $subjectOverview
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectOverview $subjectOverview)
    {
        return view('subject_overview.show', compact('subjectOverview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectOverview  $subjectOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectOverview $subjectOverview)
    {
        $subjects = Subject::where('status', 1)->get();
        return view('subject_overview.edit', compact('subjectOverview', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectOverview  $subjectOverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectOverview $subjectOverview)
    {
        $this->validate($request, [
            'subject_id' => 'required',
            'overview' => 'max:1000',
        ]);

        $subjectOverview->subject_id = $request->subject_id;
        $subjectOverview->overview = $request->overview;
        $subjectOverview->save();
        
        \LogActivity::addToLog('Subject Overview Updated');
        return redirect()->route('subject_overview.index')->withStatus(__('Subject overview successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectOverview  $subjectOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectOverview $subjectOverview)
    {
        $model = $subjectOverview->delete();
        if($model){
            \LogActivity::addToLog('Subject Overview Deleted');
            return redirect()->route('subject_overview.index')->withStatus(__('Subject overview successfully deleted.'));
        }
    }
}
