@extends('layouts.app', [
    'title' => __('Quiz Management'),
    'parentSection' => 'laravel',
    'elementName' => 'quiz-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Quiz') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">{{ __('quiz Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add quiz') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quiz Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quiz.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('quiz.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('quiz information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" id="input-title" class="form-control" name="title" placeholder="Enter title">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" rows="5" class="form-control" placeholder="Enter description"></textarea>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
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
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
