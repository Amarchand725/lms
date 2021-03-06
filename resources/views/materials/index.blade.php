@extends('layouts.app', [
    'title' => __('Material Management'),
    'parentSection' => 'laravel',
    'elementName' => 'material-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Materials') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('material.index') }}">{{ __('Material Management') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Materials') }}</h3>
                                <p class="text-sm mb-0">
                                        {{ __('This is an example of material management. This is a minimal setup in order to get started fast.') }}
                                    </p>
                            </div>
                            @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Teacher'))
                                <div class="col-4 text-right">
                                    <a href="{{ route('material.create') }}" class="btn btn-sm btn-primary">{{ __('Upload New Material') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No#') }}</th>
                                    <th scope="col">{{ __('File Name') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    @if(Auth::user()->hasRole('Admin'))
                                        <th scope="col">{{ __('Uploaded By') }}</th>
                                    @endif
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Download') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $key=>$model)
                                    <tr id="id-{{ $model->id }}">
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->file_name }}</td>
                                        <td>{{ $model->description }}</td>
                                        @if(Auth::user()->hasRole('Admin'))
                                            <td>{{ isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A' }}</td>
                                        @endif
                                        <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ asset('public/admin/assets/materials') }}/{{ $model->file }}" class="btn btn-info btn-sm download-btn" data-toggle="tooltip" data-placement="top" title="Download File" download>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('material.edit', $model) }}">{{ __('Edit') }}</a>
                                                    <a class="dropdown-item" href="{{ route('material.show', $model) }}">{{ __('Show') }}</a>
                                                
                                                    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Teacher'))
                                                        <form action="{{ route('material.destroy', $model->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this model?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8">
                                        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $models->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
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
