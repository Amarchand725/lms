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
            'answer' => 'required|max:255',
        ]);

        $model = Question::create([
            'question_type_id' => $request->question_type_id,
            'quiz_id' => $request->quiz_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        if($model){
            foreach($request->options as $option){
                if(!empty($option)){
                    Option::create([
                        'question_id' => $model->id,
                        'option' => $option,
                    ]);
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
            'answer' => 'required|max:255',
        ]);

        $question->question_type_id = $request->question_type_id;
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->update();

        if($question){
            Option::where('question_id', $question->id)->delete();
            $question_type = QuestionType::where('id',  $request->question_type_id)->first();
            if($question_type->type=="True or False"){
                foreach($request->edit_options as $option){
                    if(!empty($option)){
                        Option::create([
                            'question_id' => $question->id,
                            'option' => $option,
                        ]);
                    }
                }
            }else{
                foreach($request->options as $option){
                    if(!empty($option)){
                        Option::create([
                            'question_id' => $question->id,
                            'option' => $option,
                        ]);
                    }
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
        $model = $question->first();
        if($model){
            Option::where('question_id', $model->id)->delete();
            $model->delete();
            \LogActivity::addToLog('Question Deleted');
            return redirect()->route('quiz.index')->withStatus(__('Question successfully deleted.'));
        }
    }
}
