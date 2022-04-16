@extends('layouts.app', [
    'title' => __('Announcement Management'),
    'parentSection' => 'laravel',
    'elementName' => 'announcement-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Announcement') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">{{ __('Announcement Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Announcement') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Announcement Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('announcement.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('announcement.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Announcement information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                            <input type="text" id="input-title" class="form-control" name="title" placeholder="Enter title">
                                            @include('alerts.feedback', ['field' => 'announcement'])
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-announcement">{{ __('Announcement') }}</label>
                                            <textarea name="announcement" id="input-announcement" rows="5" class="form-control" placeholder="Enter announcement"></textarea>
                                            @include('alerts.feedback', ['field' => 'announcement'])
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
