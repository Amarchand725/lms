<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $model)
    {
        return view('subjects.index', ['models' => $model->orderby('id', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::orderby('id', 'desc')->where('status', 1)->get(['id', 'name']);
        return view('subjects.create', compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subject $model)
    {
        $this->validate($request, [
            'semester_id' => 'required',
            'title' => 'max:255',
            'code' => 'max:255',
            'unit' => 'max:255',
            'description' => 'max:255',
        ]);

        $model->create($request->all());
        \LogActivity::addToLog('Subject Added');
        return redirect()->route('subject.index')->withStatus(__('Subject successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Subject::where('id', $id)->first();
        $semesters = Semester::orderby('id', 'desc')->where('status', 1)->get(['id', 'name']);
        return view('subjects.edit', compact('model', 'semesters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'semester_id' => 'required',
            'title' => 'max:255',
            'code' => 'max:255',
            'unit' => 'max:255',
            'description' => 'max:255',
        ]);

        $model = Subject::where('id', $id)->first();
        $model->title = $request->title;
        $model->code = $request->code;
        $model->unit = $request->unit;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        \LogActivity::addToLog('Subject Updated');
        return redirect()->route('subject.index')->withStatus(__('Subject successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Subject::where('id', $id)->first();
        if($model){
            $model->delete();
            \LogActivity::addToLog('Subject Deleted');
            return redirect()->route('subject.index')->withStatus(__('Subject successfully deleted.'));
        }
    }
}
