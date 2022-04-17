@extends('layouts.app', [
    'title' => __('Class Quiz Management'),
    'parentSection' => 'laravel',
    'elementName' => 'study_class_quiz-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Class Quiz') }}
            @endslot
            <div class="col-12 mt-2">
                @include('alerts.success')
                @include('alerts.errors')
            </div>

            <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">{{ __('Class Quiz Management') }}</a></li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Class Quiz Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quiz.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('study_class_quiz.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Class Quiz information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quiz">{{ __('Quiz') }} <span style="color: red">*</span></label>
                                            <select name="quiz_id" id="input-quiz" class="form-control">
                                                <option value="" selected>Select Quiz</option>
                                                @foreach ($quizzes as $quiz)
                                                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'quiz_id'])
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quiz_time">{{ __('Test Time (in minutes)') }} <span style="color: red">*</span></label>
                                            <input type="text" id="input-quiz_time" class="form-control" name="quiz_time" placeholder="Enter time in minutes e.g 5 or 10">
                                            @include('alerts.feedback', ['field' => 'quiz_time'])
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-control-label" for="input-name">{{ __('Check The Class you want to put this file.') }}</label>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkboxes">
                                                            <label class="form-check-label" for="checkboxes">
                                                              Check All
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th>Study Class</th>
                                                    <th>Subject Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assigned_classes as $class)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input individual" name="assigned_to_classes[]" type="checkbox" value="{{ $class->study_class_id }}" id="flexCheckDefault">
                                                            </div>
                                                        </td>
                                                        <td>{{ $class->hasStudyClass->name }}</td>
                                                        <td>{{ $class->hasSubject->code }}</td>
                                                    </tr>
                                                @endforeach
                                                {{ $errors->first('assigned_to_classes.*') }}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </div>
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
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
