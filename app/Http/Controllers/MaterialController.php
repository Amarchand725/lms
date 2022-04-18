<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\MaterialDetail;
use App\Models\StudyClass;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\AssignClass;
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
        $models = Material::orderby('id', 'desc')->where('created_by', Auth::user()->id)->paginate(10);
        return view('materials.index', compact('models'));
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
        return view('materials.create', compact('assigned_classes'));
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
            "assigned_to_classes" => "required|array",
            "assigned_to_classes.*"  => "required",
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
        $model->file_name = $request->file_name;
        $model->description = $request->description;
        $model->save();

        if($model){
            foreach($request->assigned_to_classes as $class){
                if(!empty($class)){
                    MaterialDetail::create([
                        'material_id' => $model->id,
                        'study_class_id' => $class,
                    ]);
                }
            }
        }
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
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $assigned_classes = AssignClass::where('user_id', Auth::user()->id)->where('school_year_id', $batch->id)->get();
        return view('materials.edit', compact('model', 'assigned_classes'));
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
            "assigned_to_classes" => "required|array",
            "assigned_to_classes.*"  => "required",
            'file_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model = Material::where('id', $id)->first();

        if (isset($request->file)) {
            $file = date('d-m-Y-His').'.'.$request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('/admin/assets/materials'), $file);
            $model->file = $file;
        }

        $model->file_name = $request->file_name;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        if($model){
            MaterialDetail::where('material_id', $id)->delete();
            foreach($request->assigned_to_classes as $class){
                if(!empty($class)){
                    MaterialDetail::create([
                        'material_id' => $model->id,
                        'study_class_id' => $class,
                    ]);
                }
            }
        }

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
        $model = Material::where('id', $id)->delete();
        if($model){
            MaterialDetail::where('material_id', $id)->delete();
            
            \LogActivity::addToLog('Material Deleted');
            return redirect()->route('material.index')->withStatus(__('Material successfully deleted.'));
        }
    }
}
