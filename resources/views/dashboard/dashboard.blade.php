@extends('layouts.app', [
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Dashboard') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
        @endcomponent
        @include('layouts.headers.cards')
    @endcomponent

    {{-- <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 mb-0">Team members</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset('public/admin/assets') }}/img/theme/team-1.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset('public/admin/assets') }}/img/theme/team-2.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Alex Smith</a>
                                        </h4>
                                        <span class="text-warning">●</span>
                                        <small>In a meeting</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset('public/admin/assets') }}/img/theme/team-3.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Samantha Ivy</a>
                                        </h4>
                                        <span class="text-danger">●</span>
                                        <small>Offline</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset('public/admin/assets') }}/img/theme/team-4.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">John Michael</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>Online</small>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h3 mb-0">To do list</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" data-toggle="checklist">
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-success">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Call with Dave</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-success">
                                            <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>
                                            <label class="custom-control-label" for="chk-todo-task-1"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-warning">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Lunch meeting</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-warning">
                                            <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-2"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-info">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-info">
                                            <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                                            <label class="custom-control-label" for="chk-todo-task-3"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                                <div class="checklist-item checklist-item-danger">
                                    <div class="checklist-info">
                                        <h5 class="checklist-title mb-0">Winter Hackaton</h5>
                                        <small>10:30 AM</small>
                                    </div>
                                    <div>
                                        <div class="custom-control custom-checkbox custom-checkbox-danger">
                                            <input class="custom-control-input" id="chk-todo-task-4" type="checkbox" checked>
                                            <label class="custom-control-label" for="chk-todo-task-4"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div> --}}
@endsection

@push('js')
    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
