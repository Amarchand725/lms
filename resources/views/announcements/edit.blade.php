@extends('layouts.app', [
    'title' => __('Announcement Management'),
    'parentSection' => 'laravel',
    'elementName' => 'announcement-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Announcements') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">{{ __('announcement Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Announcement') }}</li>
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
                        <form method="post" action="{{ route('announcement.update', $announcement->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('Announcement information') }}</h6>
                            <div class="pl-lg-4">
                                {{-- <div class="form-group{{ $errors->has('study_class_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department">{{ __('Study Class') }}</label>
                                    <select name="study_class_id" id="input-department" class="form-control">
                                        <option value="" selected>Select study class</option>
                                        @foreach ($study_classes as $study_class)
                                            <option value="{{ $study_class->hasStudyClass->id }}" {{ $study_class->hasStudyClass->id==$announcement->study_class_id?'selected':'' }}>{{ $study_class->hasStudyClass->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'study_class_id'])
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-announcement">{{ __('announcement') }}</label>
                                    <textarea name="announcement" id="input-announcement" class="form-control" placeholder="Enter announcement">{{ $announcement->announcement }}</textarea>
                                </div>

                                @include('alerts.feedback', ['field' => 'announcement'])
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" id="input-status" class="form-control">
                                        <option value="1" {{ $announcement->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $announcement->status==0?'selected':'' }}>In-Active</option>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'status'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div> --}}

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                            <input type="text" id="input-title" value="{{ $announcement->title }}" class="form-control" name="title" placeholder="Enter title">
                                            @include('alerts.feedback', ['field' => 'announcement'])
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-announcement">{{ __('Announcement') }}</label>
                                            <textarea name="announcement" id="input-announcement" rows="5" class="form-control" placeholder="Enter announcement">{{ $announcement->announcement }}</textarea>
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
                                                                @if(isset($announcement->hasAssignedClass)?$announcement->hasAssignedClass->hasStudyClass->id==$class->hasStudyClass->id:0)
                                                                    <input class="form-check-input individual" checked name="assigned_to_classes[]" type="checkbox" value="{{ $class->study_class_id }}" id="flexCheckDefault">
                                                                @else
                                                                    <input class="form-check-input individual" name="assigned_to_classes[]" type="checkbox" value="{{ $class->study_class_id }}" id="flexCheckDefault">
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>{{ $class->hasStudyClass->name }}</td>
                                                        <td>{{ $class->hasSubject->code }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>{{ $errors->first('assigned_to_classes.*') }}</td>
                                                </tr>
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
