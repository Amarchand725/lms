@extends('layouts.app', [
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
    @component('layouts.headers.breadcrumbs')
    @slot('title')
        {{ __('My Classes') }}
    @endslot

    <li class="breadcrumb-item active" aria-current="page">{{ __('School Year:') }} {{ $batch->year }}</li>
@endcomponent

<div class="row">
    @foreach ($assigned_classes as $assigned)
        <div class="col-xl-3 col-md-6 class-card">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{ asset('public/admin/assets/img/brand/class-default-img.jpg') }}" width="200px" alt="">
                        </div>
                        <div class="col text-center">
                            <span class="h2 font-weight-bold mb-0">{{ $assigned->hasStudyClass->name }}</span>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-sm">
                        <input type="hidden" id="delete-url" value="{{ route('assigned_class.destroy', $assigned->id) }}">
                        <a class="text-danger mr-2" data-toggle="tooltip" data-placement="top" title="Remove Class" style="cursor: pointer" id="remove-btn-class" ><i class="fa fa-trash"></i> Remove</a>
                    </p> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>


@endcomponent

   
@endsection
@push('js')
    
    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endpush

   
