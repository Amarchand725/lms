<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Semester $model)
    {
        return view('semesters.index', ['models' => $model->orderby('id', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Semester $model)
    {
        $this->validate($request, [
            'name' => 'required|max:125',
            'description' => 'max:255',
        ]);

        $model->create($request->all());
        \LogActivity::addToLog('Semester Added');
        return redirect()->route('semester.index')->withStatus(__('Semester successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $model, $id)
    {
        $model = $model->where('id', $id)->first();
        return view('semesters.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Semester::where('id', $id)->first();
        $model->name = $request->name;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        \LogActivity::addToLog('Semester Updated');
        return redirect()->route('semester.index')->withStatus(__('Semester successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Semester::where('id', $id)->first();
        if($model){
            $model->delete();
            \LogActivity::addToLog('Semester Deleted');
            return redirect()->route('semester.index')->withStatus(__('Semester successfully deleted.'));
        }
    }
}
