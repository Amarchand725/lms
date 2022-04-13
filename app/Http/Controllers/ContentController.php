<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Content::orderby('id', 'desc')->get();
        return view('contents.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Content $model)
    {
        $this->validate($request, [
            'title' => 'required|max:125',
            'description' => 'max:1000',
        ]);

        $model->create($request->all());
        \LogActivity::addToLog('Content Added');

        return redirect()->route('content.index')->withStatus(__('Content added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $this->validate($request, [
            'title' => 'required|max:125',
            'description' => 'max:1000',
        ]);

        $content->title = $request->title;
        $content->content = $request->content;
        $content->status = $request->status;
        $content->save();

        \LogActivity::addToLog('Content Updated');
        return redirect()->route('content.index')->withStatus(__('Content updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $model = $content->delete();
        if($model){
            \LogActivity::addToLog('Content Deleted');
            return redirect()->route('content.index')->withStatus(__('Content successfully deleted.'));
        }
    }
}
