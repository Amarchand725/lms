<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Auth;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = SchoolYear::orderby('id', 'desc')->get();
        return view('school_years.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school_years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SchoolYear $model)
    {
        $this->validate($request, [
            'year' => 'required|max:255',
            'description' => 'max:255',
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $model->create($input);
        \LogActivity::addToLog('School Year Added');

        return redirect()->route('school_year.index')->withStatus(__('School year added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolYear $schoolYear)
    {
        return view('school_years.edit', compact('schoolYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolYear $schoolYear)
    {
        $this->validate($request, [
            'year' => 'required|max:255',
            'description' => 'max:255',
        ]);
        $input = $request->all();
        $schoolYear->update($input);
        \LogActivity::addToLog('School Year updated');

        return redirect()->route('school_year.index')->withStatus(__('School year updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolYear $schoolYear)
    {
        $model = $schoolYear->delete();
        if($model){
            \LogActivity::addToLog('School Year Deleted');
            return redirect()->route('school_year.index')->withStatus(__('School year successfully deleted.'));
        }
    }
}
