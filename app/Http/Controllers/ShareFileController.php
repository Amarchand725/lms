<?php

namespace App\Http\Controllers;

use App\Models\ShareFile;
use Illuminate\Http\Request;
use App\Models\AssignClass;
use App\Models\Material;

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
        // return $id;
        return Material::where('study_class_id', $id)->get();
    }
}
