@extends('layouts.app', [
    'parentSection' => 'components',
    'elementName' => 'notifications'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Notifications') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('page.index', 'notifications') }}">{{ __('Components') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Notifications') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class="col-lg-8 card-wrapper">

            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('public/admin/assets') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
@endpush
