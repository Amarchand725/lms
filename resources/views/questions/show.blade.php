@extends('layouts.app', [
    'title' => __('Question Management'),
    'parentSection' => 'laravel',
    'elementName' => 'question-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Questions') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('question.index') }}">{{ __('Question Management') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Questions') }}</h3>
                                <p class="text-sm mb-0">
									{{ __('This is an example of question management. This is a minimal setup in order to get started fast.') }}
								</p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('question.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <tbody>
                                <tr>
									<th>Quiz</th>
									<td>{{ $question->hasQuiz->title }}</td>
								</tr>
                                <tr>
									<th>Question Type</th>
									<td>{{ $question->hasQuestionType->type }}</td>
								</tr>
                                <tr>
									<th>Question</th>
									<td>{{ $question->question }}</td>
								</tr>
								<tr>
									<th>Answer</th>
									<td>{{ $question->answer }}</td>
								</tr>
                                <tr>
									<th>Options</th>
									<td>
                                        <ul>
                                            @foreach ($question->hasOptions as $option)
                                                <li>{{ $option->option }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
								</tr>

								<tr>
									<th>Created at</th>
									<td>{{ date('d, M-Y H:i A', strtotime($question->created_at)) }}</td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										@if($question->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
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
