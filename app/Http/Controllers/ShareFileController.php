<?php

namespace App\Http\Controllers;

use App\Models\ShareFile;
use Illuminate\Http\Request;
use App\Models\AssignClass;
use App\Models\Material;
use App\Models\MaterialDetail;
use App\Models\User;
use App\Models\Backpack;
use Auth;

class ShareFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = ShareFile::orderby('id', 'desc')->paginate(10);
        $study_classes = AssignClass::orderby('id', 'desc')->get();
        return view('share_files.index', compact('models', 'study_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->status)){
            if($request->btn_type=='share'){
                foreach(json_decode($request->material_files) as $file){
                    ShareFile::create([
                        'shared_by_teacher_id' => Auth::user()->id,
                        'shared_to_teacher_id' => $request->share_to_teacher_id,
                        'study_class_id' => $request->study_class_id,
                        'shared_material_id' => $file,
                    ]);
                }

                \LogActivity::addToLog('Teacher Shared file');
                return redirect()->route('share_file.index')->withStatus(__('File shared successfully !.'));
            }else{
                foreach(json_decode($request->material_files) as $file){
                    Backpack::create([
                        'by_teacher_id' => Auth::user()->id,
                        'study_class_id' => $request->study_class_id,
                        'material_id' => $file,
                    ]);
                }

                \LogActivity::addToLog('Teacher backpacked file');
                return redirect()->route('backpack.index')->withStatus(__('File backpacked successfully !.'));
            }

        }
        return redirect()->route('donwloadables', $request->study_class_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function show(ShareFile $shareFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareFile $shareFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShareFile $shareFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareFile $shareFile)
    {
        //
    }

    public function downloadale($id)
    {
        $study_classes = MaterialDetail::where('study_class_id', $id)->get(['material_id']);
        $models = Material::whereIn('id', $study_classes)->paginate(10);
        $teachers = User::role('Teacher')->get();
        $study_class_id = $id;
        return view('share_files.shareable', compact('models', 'teachers', 'study_class_id'));
    }
}
