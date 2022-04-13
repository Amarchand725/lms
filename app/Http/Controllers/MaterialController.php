<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\StudyClass;
use App\Models\User;
use Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Material::orderby('id', 'desc')->get();
        return view('materials.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_classes = StudyClass::orderby('id', 'desc')->where('status', 1)->get();
        return view('materials.create', compact('study_classes'));
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
            'file_name' => 'required|max:255',
            'file' => 'required',
            'description' => 'max:255',
        ]);

        $model = new Material();

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/materials'), $file);
            $model->file = $file;
        }

        $model->created_by = Auth::user()->id;
        $model->study_class_id = $request->study_class_id;
        $model->file_name = $request->file_name;
        $model->description = $request->description;
        $model->save();
        \LogActivity::addToLog('Material Added');
        return redirect()->route('material.index')->withStatus(__('Material successfully uploaded.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Material::where('id', $id)->first();
        return view('materials.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Material::where('id', $id)->first();
        $study_classes = StudyClass::orderby('id', 'desc')->where('status', 1)->get();
        return view('materials.edit', compact('model', 'study_classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'study_class_id' => 'required',
            'file_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model = Material::where('id', $id)->first();

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/materials'), $file);
            $model->file = $file;
        }

        $model->study_class_id = $request->study_class_id;
        $model->file_name = $request->file_name;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        \LogActivity::addToLog('Material Updated');
        return redirect()->route('material.index')->withStatus(__('Material successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Material::where('id', $id)->first();
        if($model){
            User::where('id', $model->user_id)->delete();
            
            $model->delete();
            \LogActivity::addToLog('Material Deleted');
            return redirect()->route('material.index')->withStatus(__('Material successfully deleted.'));
        }
    }
}
