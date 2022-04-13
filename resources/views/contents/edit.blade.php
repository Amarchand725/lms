@extends('layouts.app', [
    'title' => __('Content Management'),
    'parentSection' => 'laravel',
    'elementName' => 'content-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Contents') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('content.index') }}">{{ __('Content Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Content') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Content Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('content.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('content.update', $content->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('Content information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $content->title) }}"  required autofocus>

                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-content">{{ __('Content') }}</label>
                                    <textarea name="content" id="input-content" rows="10" class="form-control" placeholder="Enter Content">{{ old('content', $content->content) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" {{ $content->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $content->status==0?'selected':'' }}>In-Active</option>
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
