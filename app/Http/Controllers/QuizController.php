<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Quiz::orderby('id', 'desc')->paginate(10);
        return view('quizzes.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.create');
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
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model = new Quiz();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->save();
        \LogActivity::addToLog('Quiz Added');
        return redirect()->route('quiz.index')->withStatus(__('Quiz successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $model = $quiz;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        \LogActivity::addToLog('Quiz updated');
        return redirect()->route('quiz.index')->withStatus(__('Quiz successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $model = $quiz->delete();
        if($model){
            \LogActivity::addToLog('Quiz Deleted');
            return redirect()->route('quiz.index')->withStatus(__('Quiz successfully deleted.'));
        }
    }
}
