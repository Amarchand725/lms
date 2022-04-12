@extends('layouts.app', [
    'title' => __('Department Management'),
    'parentSection' => 'laravel',
    'elementName' => 'department-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Departments') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('department.index') }}">{{ __('Department Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Department') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Department Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('department.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('department.update', $model->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('Department information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('department_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department_name">{{ __('Department Name') }}</label>
                                    <input type="text" name="department_name" id="input-department_name" class="form-control{{ $errors->has('department_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Department Name') }}" value="{{ old('department_name', $model->department_name) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'department_name'])
                                </div>
                                <div class="form-group{{ $errors->has('person_in_charge') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-person_in_charge">{{ __('Person in charge') }}</label>
                                    <input type="text" name="person_in_charge" id="input-person_in_charge" class="form-control{{ $errors->has('person_in_charge') ? ' is-invalid' : '' }}" placeholder="{{ __('Person in charge') }}" value="{{ old('person_in_charge', $model->person_in_charge) }}"  required autofocus>

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
