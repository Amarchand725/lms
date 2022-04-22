@extends('layouts.app', [
    'elementName' => 'class'
])

@section('content')
    @component('layouts.headers.auth')
    @component('layouts.headers.breadcrumbs')
    @slot('title')
        {{ __('My Classmates') }}
    @endslot

    <li class="breadcrumb-item active" aria-current="page">{{ __('School Year:') }} {{ $batch->year }}</li>
@endcomponent

<div class="row">
    @foreach ($models as $assigned)
        <div class="col-xl-3 col-md-6 class-card">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            @if($assigned->picture)
                                <img src="{{ asset('public/admin/assets/img/theme') }}/{{ $assigned->picture }}" width="200px" alt="">
                            @else 
                                <img src="{{ asset('public/admin/assets/img/theme/user-default-img.png') }}" width="200px" alt="">
                            @endif
                        </div>
                        <div class="col text-center">
                            <span class="h2 font-weight-bold mb-0">{{ $assigned->first_name }} {{ $assigned->last_name }}</span>
                        </div>
                    </div>
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


