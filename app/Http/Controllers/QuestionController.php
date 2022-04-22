<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Quiz;
use App\Models\Option;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Question::orderby('id', 'desc')->paginate(10);
        return view('questions.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::orderby('id', 'desc')->where('status', 1)->get();
        $question_types = QuestionType::orderby('id', 'desc')->where('status', 1)->get();
        return view('questions.create', compact('quizzes', 'question_types'));
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
            'quiz_id' => 'required',
            'question_type_id' => 'required',
            'question' => 'required|max:255',
            'answers' => 'required',
            'answers.*' => 'required',
        ]);

        $model = Question::create([
            'question_type_id' => $request->question_type_id,
            'quiz_id' => $request->quiz_id,
            'question' => $request->question,
        ]);

        if($model){
            foreach($request->options as $key=>$option){
                $opt = new Option();
                if(!empty($option)){
                    $opt->question_id = $model->id;
                    $opt->option = $option;
                    if(!empty($request->answers)){
                        foreach($request->answers as $k=>$answer){
                            if($key==$k){
                                $opt->is_answer = 1;
                            }
                        }
                    }
                    $opt->save();
                }
            }

            \LogActivity::addToLog('Question Added');
            return redirect()->route('question.index')->withStatus(__('Question successfully added.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizzes = Quiz::orderby('id', 'desc')->where('status', 1)->get();
        $question_types = QuestionType::orderby('id', 'desc')->where('status', 1)->get();
        return view('questions.edit', compact('question','quizzes', 'question_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'quiz_id' => 'required',
            'question_type_id' => 'required',
            'question' => 'required|max:255',
            'answers' => 'required',
            'answers.*' => 'required',
        ]);

        $question->question_type_id = $request->question_type_id;
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->update();

        if($question){
            Option::where('question_id', $question->id)->delete();
            
            foreach($request->options as $key=>$option){
                $opt = new Option();

                if(!empty($option)){
                    $opt->question_id = $question->id;
                    $opt->option = $option;
                    if(!empty($request->answers)){
                        foreach($request->answers as $k=>$answer){
                            if($key==$k){
                                $opt->is_answer = 1;
                            }
                        }
                    }
                    $opt->save();
                }
            }

            \LogActivity::addToLog('Question Updated');
            return redirect()->route('question.index')->withStatus(__('Question successfully updated.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $model = $question->delete();
        if($model){
            Option::where('question_id', $question->id)->delete();
            \LogActivity::addToLog('Question Deleted');
            return redirect()->route('question.index')->withStatus(__('Question successfully deleted.'));
        }
    }
}
