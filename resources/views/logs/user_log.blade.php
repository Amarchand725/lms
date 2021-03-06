@extends('layouts.app', [
    'title' => __('Log Management'),
    'parentSection' => 'laravel',
    'elementName' => 'Log-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Logs') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('log.index') }}">{{ __('Log Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Logs') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of Log management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('User') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Logged In') }}</th>
                                    <th scope="col">{{ __('Logged Out') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $Log)
                                    <tr>
                                        <td>{{ $Log->hasLoggedIn->name }}</td>
                                        <td>{{ $Log->hasLoggedIn->email }}</td>
                                        <td>{{ $Log->logged_in }}</td>
                                        <td>{{ $Log->logged_out }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin/assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
