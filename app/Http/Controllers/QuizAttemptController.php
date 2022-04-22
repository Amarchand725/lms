<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizAttempt;
use App\Models\Quiz;
use App\Models\Option;
use App\Models\QuizAttemptDetails;
use Auth;

class QuizAttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request;
        // foreach($request->answers as $key=>$value){
        //     return $value;
        // }

        $quiz = Quiz::where('id', $request->quiz_id)->first();
        $model = QuizAttempt::create([
            'quize_id' => $request->quiz_id,
            'student_id' => Auth::user()->id,
            'total_questions' => $request->total_questions,
            'quiz_attempt_time' => $request->quiz_attempt_time,
        ]);

        if($model){
            $correct_answers = 0;
            foreach($request->answers as $question_id=>$option_id){
                $correct = Option::where('question_id', $question_id)->where('id', $option_id)->where('is_answer', 1)->first();
                if($correct){
                    $correct_answers += 1;
                }
                QuizAttemptDetails::create([
                    'quiz_attempt_id' => $model->id,
                    'question_id' => $question_id,
                    'option_id' => $option_id,
                ]);
            }

            $model->correct_answers = $correct_answers;
            $model->update();
        }

        \LogActivity::addToLog('Quiz Attempt Added');
        return redirect()->route('study_class_quiz.index')->withStatus(__('You have submit quiz attempt Successfully !.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClassQuiz  $studentClassQuiz
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClassQuiz $studentClassQuiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClassQuiz  $studentClassQuiz
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClassQuiz $studentClassQuiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClassQuiz  $studentClassQuiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClassQuiz $studentClassQuiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClassQuiz  $studentClassQuiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClassQuiz $studentClassQuiz)
    {
        //
    }
}
