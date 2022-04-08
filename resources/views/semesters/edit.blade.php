@extends('layouts.app', [
    'title' => __('Semester Management'),
    'parentSection' => 'laravel',
    'elementName' => 'semester-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Semesters') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('semester.index') }}">{{ __('Semester Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Semester') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Semester Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('semester.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('semester.update', $model->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('Semester information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $model->name) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" class="form-control" placeholder="Enter description">{{ old('description', $model->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" {{ $model->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $model->status==0?'selected':'' }}>In-Active</option>
                                    </select>
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
