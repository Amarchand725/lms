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
                                <h3 class="mb-0">{{ __('Questions') }}</h3>
                                <p class="text-sm mb-0">
                                        {{ __('This is an example of question management. This is a minimal setup in order to get started fast.') }}
                                    </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quiz.index') }}" class="btn btn-sm btn-info">{{ __('Back to Quiz') }}</a>
                                <a href="{{ route('question.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Question') }}</a>
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
                                    <th scope="col">{{ __('Quiz') }}</th>
                                    <th scope="col">{{ __('Quiz Type') }}</th>
                                    <th scope="col">{{ __('Question') }}</th>
                                    <th scope="col">{{ __('Answer') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $key=>$model)
                                    <tr id="id-{{ $model->id }}">
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->hasQuiz->title }}</td>
                                        <td>{{ $model->hasQuestionType->type }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($model->question,40) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($model->answer,60) !!}</td>
                                        <td>
                                            @if($model->status)
                                                <span class="badge badge-info">Active</span>
                                            @else
                                                <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('question.edit', $model) }}">{{ __('Edit') }}</a>
                                                    <a class="dropdown-item" href="{{ route('question.show', $model) }}">{{ __('Show') }}</a>

                                                    <form action="{{ route('question.destroy', $model->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this model?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
