@extends('layouts.app', [
    'title' => __('Permission Management'),
    'parentSection' => 'laravel',
    'elementName' => 'permission-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Permissions') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">{{ __('Permission Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Permission') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permission Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('permission.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('permission.update', $permission->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <input type="hidden" class="form-control" name="permission" value="{{$permission->permission}}">

                            <h6 class="heading-small text-muted mb-4">{{ __('Permission information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" value="{{ old('name', $permission->name) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
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
