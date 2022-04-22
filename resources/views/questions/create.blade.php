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
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Question') }}</li>
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
                        <form method="post" action="{{ route('question.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('question information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-quiz">{{ __('Quiz') }} <span style="color: red">*</span></label>
                                    <select name="quiz_id" id="input-quiz" class="form-control">
                                        <option value="" selected>Select Quiz</option>
                                        @foreach ($quizzes as $quiz)
                                            <option value="{{ $quiz->id }}" {{ old('quiz_id')==$quiz->id?'selected':'' }}>{{ $quiz->title }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'quiz_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-question-type">{{ __('Question Type') }} <span style="color: red">*</span></label>
                                    <select name="question_type_id" id="input-question-type" class="form-control">
                                        <option value="" selected>Select Question Type</option>
                                        @foreach ($question_types as $question)
                                            <option value="{{ $question->id }}" {{ old('question_type_id')==$question->id?'selected':'' }}>{{ $question->type }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'question_type_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-question">{{ __('Question') }} <span style="color: red">*</span></label>
                                    <input type="text" id="input-question" class="form-control" value="{{ old('question') }}" name="question" placeholder="Enter question">
                                    @include('alerts.feedback', ['field' => 'question'])
                                </div>
                                @include('alerts.feedback', ['field' => 'answers'])
                                <span id="mcqs-option" style="display: none">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label text-danger" for="input-option">{{ __('Add only one Option if question type is True or False and check one answer bellow of them.') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option">{{ __('Option 1') }}</label>
                                                <input type="text" id="input-option" class="form-control" name="options[1]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'options'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="answers[1]" id="check-answer-1">
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
                                                <input type="text" id="input-option" class="form-control" name="options[2]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="answers[2]" id="check-answer-2">
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
                                                <input type="text" id="input-option" class="form-control" name="options[3]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'option'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="answers[3]" id="check-answer-3">
                                                <label class="form-check-label" for="check-answer-3">
                                                  Ans?
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-option-4">{{ __('Option 4') }}</label>
                                                <input type="text" id="input-option-4" class="form-control" name="options[4]" placeholder="Enter option">
                                                @include('alerts.feedback', ['field' => 'options'])
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-control-label mt-4" for="input-option"></label>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="answers[4]" id="check-answer-4">
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
            if(type){
                $('#mcqs-option').show();
            }else{
                $('#mcqs-option').hide();
            }
        });
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
