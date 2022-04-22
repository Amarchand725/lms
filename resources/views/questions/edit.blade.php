@extends('layouts.app', [
    'title' => __('Question Management'),
    'parentSection' => 'laravel',
    'elementName' => 'question-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Question') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('question.index') }}">{{ __('question Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit question') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Question Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('question.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('question.update', $question->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('question information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-quiz">{{ __('Quiz') }} <span style="color: red">*</span></label>
                                    <select name="quiz_id" id="input-quiz" class="form-control">
                                        <option value="" selected>Select Quiz</option>
                                        @foreach ($quizzes as $quiz)
                                            <option value="{{ $quiz->id }}" {{ $question->quiz_id==$quiz->id?'selected':'' }}>{{ $quiz->title }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'quiz_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-question-type">{{ __('Question Type') }} <span style="color: red">*</span></label>
                                    <select name="question_type_id" id="input-question-type" class="form-control">
                                        <option value="" selected>Select Question Type</option>
                                        @foreach ($question_types as $question_type)
                                            <option value="{{ $question_type->id }}" {{ $question->question_type_id==$question_type->id?'selected':'' }}>{{ $question_type->type }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'question_type_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-question">{{ __('Question') }} <span style="color: red">*</span></label>
                                    <input type="text" id="input-question" class="form-control" value="{{ $question->question }}" name="question" placeholder="Enter question">
                                    @include('alerts.feedback', ['field' => 'question'])
                                </div>
                                
                                <span id="mcqs-option" style="display: @if(!$question->question_type_id) none @endif">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label text-danger" for="input-option">{{ __('Add only one Option if question type is True or False and check one answer bellow of them.') }}</label>
                                                @include('alerts.feedback', ['field' => 'answers'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option">{{ __('Option 1') }}</label>
                                                <input type="text" id="input-option" class="form-control" value="{{ isset($question->hasOptions[0])?$question->hasOptions[0]->option:'' }}" name="options[1]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                            <div class="form-check">
                                                @if(isset($question->hasOptions[0])?$question->hasOptions[0]->is_answer:0)
                                                    <input class="form-check-input" checked type="checkbox" value="1" name="answers[1]" id="check-answer-1">    
                                                @else 
                                                    <input class="form-check-input" type="checkbox" value="1" name="answers[1]" id="check-answer-1">    
                                                @endif
                                                <label class="form-check-label" for="check-answer-1">
                                                    Ans?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option">{{ __('Option 2') }}</label>
                                                <input type="text" id="input-option" class="form-control" value="{{ isset($question->hasOptions[1])?$question->hasOptions[1]->option:'' }}" name="options[2]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                              <div class="form-check">
                                                @if(isset($question->hasOptions[1])?$question->hasOptions[1]->is_answer:0)
                                                    <input class="form-check-input" checked type="checkbox" value="1" name="answers[2]" id="check-answer-1">    
                                                @else 
                                                    <input class="form-check-input" type="checkbox" value="1" name="answers[2]" id="check-answer-2">    
                                                @endif
                                                <label class="form-check-label" for="check-answer-2">
                                                  Ans?
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option">{{ __('Option 3') }}</label>
                                                <input type="text" id="input-option" class="form-control" value="{{ isset($question->hasOptions[2])?$question->hasOptions[2]->option:'' }}" name="options[3]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                            <div class="form-check">
                                                @if(isset($question->hasOptions[2])?$question->hasOptions[2]->is_answer:0)
                                                    <input class="form-check-input" checked type="checkbox" value="1" name="answers[3]" id="check-answer-1">    
                                                @else 
                                                    <input class="form-check-input" type="checkbox" value="1" name="answers[3]" id="check-answer-3">    
                                                @endif
                                                <label class="form-check-label" for="check-answer-3">
                                                    Ans?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option">{{ __('Option 4') }}</label>
                                                <input type="text" id="input-option" class="form-control" value="{{ isset($question->hasOptions[3])?$question->hasOptions[3]->option:'' }}" name="options[4]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                            <div class="form-check">
                                                @if(isset($question->hasOptions[3])?$question->hasOptions[3]->is_answer:0)
                                                    <input class="form-check-input" checked type="checkbox" value="1" name="answers[4]" id="check-answer-1">    
                                                @else 
                                                    <input class="form-check-input" type="checkbox" value="1" name="answers[4]" id="check-answer-4">    
                                                @endif
                                                <label class="form-check-label" for="check-answer-4">
                                                    Ans?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script>
        $(document).on('change', '#input-question-type', function(){
            var type = $(this).val();
            if(type==2){
                $('#true-false-option').hide();
                $('#mcqs-option').show();
            }else if(type==1){
                $('#true-false-option').show();
                $('#mcqs-option').hide();
            }
        });
    </script>
@endpush
