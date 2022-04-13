@extends('layouts.app', [
    'title' => __('Content Management'),
    'parentSection' => 'laravel',
    'elementName' => 'content-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Content') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('content.index') }}">{{ __('Content Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Content') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Content Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('content.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('content.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('content information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }} <span style="color: red">*</span></label>
                                    <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'title'])    
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-content">{{ __('Content') }}</label>
                                    <textarea name="content" id="input-content" rows="10" class="form-control" placeholder="Enter content"></textarea>
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