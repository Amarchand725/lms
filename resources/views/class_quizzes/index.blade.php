@extends('layouts.app', [
    'title' => __('Quiz Management'),
    'parentSection' => 'laravel',
    'elementName' => 'quiz-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Quizzes') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">{{ __('Quiz Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quizzes') }}</h3>
                                <p class="text-sm mb-0">
                                        {{ __('This is an example of quiz management. This is a minimal setup in order to get started fast.') }}
                                    </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quiz.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Quiz') }}</a>
                                <a href="{{ route('study_class_quiz.create') }}" class="btn btn-sm btn-info">{{ __('Add Quiz to Class') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No#') }}</th>
                                    <th scope="col">{{ __('Quiz Title') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('QUIZ TIME (IN MINUTES)') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $key=>$model)
                                    <tr id="id-{{ $model->id }}">
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->hasQuiz->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($model->hasQuiz->description, 60) !!}</td>
                                        <td>{{ $model->quiz_time }}</td>
                                        <td class="text-left">
                                            <a href="{{ route('study_class_quiz.show', $model->quiz_id) }}" data-toggle="tooltip" data-placement="top" title="Attempt Test" class="btn bt-success btn-sm"><i class="fas fa-check-circle"></i> Take This Quize</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8">
                                        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $models->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
@endpush
