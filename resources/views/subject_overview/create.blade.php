@extends('layouts.app', [
    'title' => __('Subject Overview Management'),
    'parentSection' => 'laravel',
    'elementName' => 'subject_overview-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Subject Overview') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('subject_overview.index') }}">{{ __('Subject Overview Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Subject Overview') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subject Overview Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('subject_overview.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('subject_overview.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Subject Overview information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-subject">{{ __('Subject') }}</label>
                                    <select name="subject_id" id="" class="form-control">
                                        <option value="" selected>Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'subject_id'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-subject_overview">{{ __('Subject Overview') }}</label>
                                    <textarea name="overview" id="input-subject_overview" rows="5" class="form-control" placeholder="Enter subject_overview"></textarea>
                                    @include('alerts.feedback', ['field' => 'overview'])
                                </div>
                            
                                <div class="text-left">
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
@push('js')
    <script>
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
