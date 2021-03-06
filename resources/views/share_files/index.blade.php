@extends('layouts.app', [
    'title' => __('Shared Files Management'),
    'parentSection' => 'laravel',
    'elementName' => 'share_file-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Shared Files') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('share_file.index') }}">{{ __('Shared Files Management') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Shared Files') }}</h3>
                                <p class="text-sm mb-0">
                                        {{ __('This is an example of share_file management. This is a minimal setup in order to get started fast.') }}
                                    </p>
                            </div>
                            <div class="col-4 text-right">
                                <button type="button" class="btn btn-sm btn-primary share-file-btn">{{ __('Share File') }}</button>
                            </div>
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
                                    @if(Auth::user()->hasRole('Admin'))
                                        <th scope="col">{{ __('Shared By') }}</th>
                                    @endif
                                    <th scope="col">{{ __('Shared To') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $key=>$model)
                                    <tr>
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->hasMaterialFile->file_name }}</td>
                                        @if(Auth::user()->hasRole('Admin'))
                                            <td>{{ isset($model->hasSharedByUser)?$model->hasSharedByUser->name:'N/A' }}</td>
                                        @endif
                                        <td>{{ isset($model->hasSharedToUser)?$model->hasSharedToUser->name:'N/A' }}</td>
									    <td>{!! \Illuminate\Support\Str::limit($model->hasMaterialFile->description,60) !!}</td>
                                        <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ asset('public/admin/assets/materials') }}/{{ $model->hasMaterialFile->file }}" class="btn btn-info btn-sm download-btn" data-toggle="tooltip" data-placement="top" title="Download File" download>
                                                <i class="fa fa-download"></i>
                                            </a>
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

        <!-- Modal -->
        <div class="modal fade" id="share-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Share Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('share_file.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="input-study-class">Move to</label>
                                <select name="study_class_id" id="input-study-class" class="form-control">
                                    <option value="" selected>Select Class</option>
                                    @foreach ($study_classes as $class)
                                        <option value="{{ $class->study_class_id }}">{{ $class->hasStudyClass->name }} - {{ $class->hasSubject->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Share</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('public/argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('public/argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <script>
        $(document).on('click', '.share-file-btn', function(){
            $('#share-file-modal').modal('show');
        });
    </script>
@endpush
