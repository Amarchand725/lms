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
                                <div class="form-group{{ $errors->has('study_class_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-study_class_id">{{ __('Study Class') }}</label>
                                    <select name="study_class_id" id="input-study_class_id" class="form-control">
                                        <option value="" selected>Select class</option>
                                        @foreach ($study_classes as $study_class)
                                            <option value="{{ $study_class->hasStudyClass->id }}">{{ $study_class->hasStudyClass->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'study_class_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-announcement">{{ __('Announcement') }}</label>
                                    <textarea name="announcement" id="input-announcement" rows="10" class="form-control" placeholder="Enter announcement"></textarea>
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