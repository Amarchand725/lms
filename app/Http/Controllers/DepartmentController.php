<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Department::orderby('id', 'desc')->get();
        return view('departments.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Department $model)
    {
        $this->validate($request, [
            'department_name' => 'required|max:255',
            'person_in_charge' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model->create($request->all());
        \LogActivity::addToLog('Department Added');
        return redirect()->route('department.index')->withStatus(__('Department successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Department::where('id', $id)->first();
        return view('departments.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'department_name' => 'required|max:255',
            'person_in_charge' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $department->update($request->all());
        \LogActivity::addToLog('Department Updated');
        return redirect()->route('department.index')->withStatus(__('Department successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Department::where('id', $id)->first();
        if($model){
            $model->delete();
            \LogActivity::addToLog('Department Deleted');
            return redirect()->route('department.index')->withStatus(__('Department successfully deleted.'));
        }
    }
}
