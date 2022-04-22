@extends('layouts.app', [
    'title' => __('Quiz Management'),
    'parentSection' => 'laravel',
    'elementName' => 'quiz-management'
])

@push('css')
    <style>
        body {
            background-color: #eee
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 4px 0px;
            border: 1px solid #5e72e4;
            display: inline-block;
            color: #5e72e4;
            width: 300px;
            text-align: center;
            border-radius: 3px;
            margin-top: 7px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: #5e72e4;
            background-color: #5e72e4;
            color: #fff
        }

        .ans {
            margin-left: 36px !important
        }

        .btn:focus {
            outline: 0 !important;
            box-shadow: none !important
        }

        .btn:active {
            outline: 0 !important;
            box-shadow: none !important
        }

        .span_wacth h1{
            background: #5e72e4;
            color: #fff;
            padding: 5px 13px;
            border-radius: 7px;
            font-size: 18px;
            letter-spacing: 6px;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Quizzes') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">{{ __('Quiz Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Test Title: ') }} {{ $quiz->title }}</h3>
                                <p class="text-sm mb-0">
									{{ $quiz->description }}
								</p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('study_class_quiz.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="container mt-3">
                                <div class="d-flex justify-content-center row">
                                    <div class="col-md-12 ">
                                        <form id="quiz-form" action="{{ route('quiz_attempt.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                            <input type="hidden" name="total_questions" value="{{ count($questions) }}">
                                            <input type="hidden" name="quiz_attempt_time" class="quiz-attempt-time" value="">
                                            <div class="border">
                                                <div class="question bg-white p-3 border-bottom">
                                                    <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                                        <h4>Test Timings: {{ $study_class_quiz->quiz_time }}:0 MINUTES</h4><span class="span_wacth"><h1 class="countdown">{{ $study_class_quiz->quiz_time }}:0</h1></span>
                                                        <input type="hidden" id="timing" value="{{ $study_class_quiz->quiz_time }}:0">
                                                    </div>
                                                </div>
                                                @php($counter=1)
                                                @foreach ($questions as $question)
                                                    <?php 
                                                        $data = $question->hasOptions->toArray();
                                                        shuffle($data); 
                                                    ?> 
                                                    <div class="question bg-white p-3 border-bottom">
                                                        <div class="d-flex flex-row align-items-center question-title">
                                                            <h3 style="color: #5e72e4">Q. {{ $counter++ }}. </h3>
                                                            <h4 class="mt-1 ml-2">{{ $question->question }}</h4>
                                                        </div>
                                                        @foreach ($data as $option)
                                                            <div class="ans ml-2">
                                                                <label class="radio"> 
                                                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option['id'] }}"> <span>{{ $option['option'] }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                                                    <button type="submit" class="btn btn-primary align-items-center"> SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <script>
        $(document).ready(function(){
            var timer2 = $('#timing').val();
            var interval = setInterval(function() {
                var timer = timer2.split(':');
                
                //by parsing integer, I avoid all extra string processing
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) clearInterval(interval);
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                $('.countdown').html(minutes + ':' + seconds);
                $('.quiz-attempt-time').val(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;
                if(timer=='0,01'){
                    $('#quiz-form').submit();
                }
            }, 1000);
        });
    </script>
@endpush
