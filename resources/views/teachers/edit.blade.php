@extends('layouts.app', [
    'title' => __('Teacher Management'),
    'parentSection' => 'laravel',
    'elementName' => 'teacher-management'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Teachers') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">{{ __('Teacher Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Teacher') }}</li>
        @endcomponent
    @endcomponent   

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Teacher Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('teacher.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('teacher.update', $model) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Teacher information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department">{{ __('Department') }}</label>
                                    <select name="department_id" id="input-department" class="form-control">
                                        <option value="" selected>Select department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ $model->department_id==$department->id?'selected':'' }}>{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'department_id'])
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-first_name">{{ __('First Name') }}</label>
                                            <input type="text" name="first_name" id="input-first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ $model->first_name }}"  required autofocus>

                                            @include('alerts.feedback', ['field' => 'last_name'])
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-last_name">{{ __('Last Name') }}</label>
                                            <input type="text" name="last_name" id="input-last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ $model->last_name }}" autofocus>

                                            @include('alerts.feedback', ['field' => 'last_name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('E-mail') }}</label>
                                    <input type="text" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ $model->hasUser->email }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                            <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value=""  autofocus>

                                            @include('alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-password_confirmation">{{ __('Confirm Password') }}</label>
                                            <input type="password" name="password_confirmation" id="input-password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirm password') }}" value="{{ old('password_confirmation') }}" autofocus>

                                            @include('alerts.feedback', ['field' => 'password_confirmation'])
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-location">{{ __('Location') }}</label>
                                    <textarea name="location" id="input-location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ __('Location') }}">{{ $model->location }}</textarea>

                                    @include('alerts.feedback', ['field' => 'location'])
                                </div>
                                <div class="form-group{{ $errors->has('about') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-about">{{ __('About') }}</label>
                                    <textarea name="about" id="input-about" cols="30" rows="10" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" placeholder="{{ __('About') }}">{{ $model->location }}</textarea>

                                    @include('alerts.feedback', ['field' => 'about'])
                                </div>

                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
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