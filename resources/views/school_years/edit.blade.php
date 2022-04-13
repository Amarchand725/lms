@extends('layouts.app', [
    'title' => __('School Year Management'),
    'parentSection' => 'laravel',
    'elementName' => 'school_year-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('School Years') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('school_year.index') }}">{{ __('School Year Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit School Year') }}</li>
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
                        <form method="post" action="{{ route('school_year.update', $schoolYear->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('school_year information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-year">{{ __('Year') }}</label>
                                    <input type="text" name="year" id="input-year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" placeholder="{{ __('Year') }}" value="{{ old('year', $schoolYear->year) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'year'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <textarea name="description" id="input-description" class="form-control" placeholder="Enter description">{{ old('description', $schoolYear->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" {{ $schoolYear->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $schoolYear->status==0?'selected':'' }}>In-Active</option>
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
