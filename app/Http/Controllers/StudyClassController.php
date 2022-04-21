<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolYear;

class StudyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = StudyClass::orderby('id', 'desc')->get();
        return view('study_classes.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StudyClass $model)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model->create($request->all());
        \LogActivity::addToLog('Study Class Added');
        return redirect()->route('study_class.index')->withStatus(__('Study class successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyClass  $studyClass
     * @return \Illuminate\Http\Response
     */
    public function show($study_class_id)
    {
        $models = Student::where('study_class_id', $study_class_id)->get();
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $study_class = StudyClass::where('id', $study_class_id)->first();
        return view('study_classes.show', compact('models', 'batch', 'study_class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyClass  $studyClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = StudyClass::where('id', $id)->first();
        return view('study_classes.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyClass  $studyClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyClass $studyClass)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $studyClass->update($request->all());
        \LogActivity::addToLog('Study Class Updated');
        return redirect()->route('study_class.index')->withStatus(__('Study class successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyClass  $studyClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = StudyClass::where('id', $id)->first();
        if($model){
            $model->delete();
            \LogActivity::addToLog('Study Class Deleted');
            return redirect()->route('study_class.index')->withStatus(__('Study class successfully deleted.'));
        }
    }
}
