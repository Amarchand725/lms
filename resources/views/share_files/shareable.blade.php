@extends('layouts.app', [
    'title' => __('Downloadable Material Management'),
    'parentSection' => 'laravel',
    'elementName' => 'material-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Downloadable Materials') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('material.index') }}">{{ __('Downloadable Material Management') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Downloadable Materials') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of material management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-primary copy-check-item-btn"><i class="fa fa-copy"></i> {{ __('Copy check item') }}</button>
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
                                    <th scope="col">{{ __('Description') }}</th>
                                    @if(Auth::user()->hasRole('Admin'))
                                        <th scope="col">{{ __('Uploaded By') }}</th>
                                    @endif
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Download') }}</th>
                                    <th scope="col">
                                        <input class="form-check-input" type="checkbox" value="" id="checkboxes">
                                        <label class="form-check-label" for="checkboxes">
                                            {{ __('Check All') }}
                                        </label>
                                    </th>
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
                                        <td>
                                            @if($model->status)
                                                <span class="badge badge-info">Active</span>
                                            @else 
                                                <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ asset('public/admin/assets/materials') }}/{{ $model->file }}" class="btn btn-info btn-sm download-btn" data-toggle="tooltip" data-placement="top" title="Download File" download>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </td>
                                       
                                        <td>
                                            <input class="form-check-input individual material_files" name="material_files[]" type="checkbox" value="{{ $model->id }}" id="flexCheckDefault">
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
        <div class="modal fade" id="share-file-to-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Share Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('share_file.store') }}" id="share-to-form" method="post">
                        @csrf

                        <input type="hidden" name="status" value="share">
                        <input type="hidden" name="material_files" id="material-files" value="">
                        <input type="hidden" name="study_class_id" value="{{ $study_class_id }}">
                        <div class="modal-body">
                            <div class="form-group text-center">
                                <button type="submit" name="btn_type" value="backpack" class="btn btn-primary"><i class="fa fa-copy"></i> Copy to Backpack</button>
                            </div>
                            <div class="form-group text-center">
                                ----------------or---------------
                            </div>
                            <div class="form-group">
                                <label for="input-study-class">Share To</label>
                                <select name="share_to_teacher_id" id="input-study-class" class="form-control">
                                    <option value="" selected>Select teacher to share</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="btn_type" value="share" class="btn btn-primary">Share</button>
                        </div>
                    </form>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.copy-check-item-btn', function(){
            var material_files = [];
            $(".material_files:checked").each(function() {
                material_files.push($(this).val());
            });

            if(material_files==''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Check file to send!',
                    footer: 'To share file have to check file.'
                })
                return false; 
            }

            var myJsonString = JSON.stringify(material_files);
            $('#material-files').val(myJsonString);
            
            $('#share-file-to-modal').modal('show');
        });
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
