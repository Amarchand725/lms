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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('file_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-file_name">{{ __('File Name') }}</label>
                                            <input type="text" name="file_name" id="input-file_name" class="form-control{{ $errors->has('file_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Document Name') }}" value="{{ old('file_name') }}"  required autofocus>

                                            @include('alerts.feedback', ['field' => 'file_name'])
                                        </div>
                                        <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-file">{{ __('File') }}</label>
                                            <input type="file" name="file" id="input-file" accept=
                                            "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                            text/plain, application/pdf, image/*, video/*" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('file') }}"  required autofocus>

                                            @include('alerts.feedback', ['field' => 'file'])
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                            <textarea name="description" id="input-description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-control-label" for="input-name">
                                            {{ __('Check The Class you want to put this file.') }} <span style="color: red">{{ __('*') }}</span>
                                            @include('alerts.feedback', ['field' => 'assigned_to_classes'])
                                        </label>
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
                                                {{ $errors->first('assigned_to_classes') }}
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
