@extends('layouts.app', [
    'title' => __('Subject Management'),
    'parentSection' => 'laravel',
    'elementName' => 'Subject-management'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Subjects') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">{{ __('Subject Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit subject') }}</li>
        @endcomponent
    @endcomponent   

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subject Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('subject.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('subject.update', $model->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Subject information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('semester_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-semester_id">{{ __('Semester') }}</label>
                                    <select name="semester_id" id="input-semester_id" class="form-control">
                                        <option value="" selected>Select semester</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}" {{ $model->semester_id==$semester->id?'selected':'' }}>{{ $semester->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'semester_id'])
                                </div>
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $model->title) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code">{{ __('Subject Code') }}</label>
                                    <input type="text" name="code" id="input-code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Subject Code') }}" value="{{ old('code', $model->code) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'code'])
                                </div>
                                <div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-unit">{{ __('Subject Units') }}</label>
                                    <input type="number" name="unit" id="input-unit" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" placeholder="{{ __('Subject Units') }}" value="{{ old('unit', $model->unit) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'unit'])
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}">{{ old('description', $model->description) }}</textarea>
                                    
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('status') }}</label>
                                    <select name="status" id="input-status" class="form-control">
                                        <option value="1" {{ $model->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $model->status==0?'selected':'' }}>In-Active</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'status'])
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