@extends('layouts.app', [
    'title' => __('School Year Management'),
    'parentSection' => 'laravel',
    'elementName' => 'school_year-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('School Year') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('school_year.index') }}">{{ __('school_year Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add school_year') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('School Year Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('school_year.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('school_year.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('school_year information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-year">{{ __('School Year') }} <span style="color: red">*</span></label>
                                    <input type="text" name="year" id="input-year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'year'])
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" class="form-control" placeholder="Enter description"></textarea>
                                </div>

                                <div class="text-center">
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