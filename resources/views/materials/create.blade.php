@extends('layouts.app', [
    'title' => __('Material Management'),
    'parentSection' => 'laravel',
    'elementName' => 'material-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Material') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('material.index') }}">{{ __('Material Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Material') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Material Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('material.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('material.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('material information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('study_class_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department">{{ __('Study Class') }}</label>
                                    <select name="study_class_id" id="input-department" class="form-control">
                                        <option value="" selected>Select study class</option>
                                        @foreach ($study_classes as $study_class)
                                            <option value="{{ $study_class->id }}">{{ $study_class->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'study_class_id'])
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('file_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-file_name">{{ __('File Name') }}</label>
                                            <input type="text" name="file_name" id="input-file_name" class="form-control{{ $errors->has('file_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Document Name') }}" value="{{ old('file_name') }}"  required autofocus>

                                            @include('alerts.feedback', ['field' => 'file_name'])
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-file">{{ __('File') }}</label>
                                            <input type="file" name="file" id="input-file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('file') }}"  required autofocus>

                                            @include('alerts.feedback', ['field' => 'file'])
                                        </div>
                                    </div>
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