@extends('layouts.app', [
    'title' => __('Backpack Management'),
    'parentSection' => 'laravel',
    'elementName' => 'share_file-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Backpack') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('backpack.index') }}">{{ __('Backpack Management') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Backpack') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of share_file management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-danger del-btn" data-toggle="tooltip" data-placement="top" title="Delete checked items"><i class="fa fa-trash"></i> {{ __('Delete') }}</button>
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
                                    <th scope="col">{{ __('Shared By') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                    <th>
                                        <input class="form-check-input" type="checkbox" value="" id="checkboxes">
                                        <label class="form-check-label" for="checkboxes">
                                            {{ __('Check All') }}
                                        </label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $key=>$model)
                                    <tr>
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->hasMaterialFile->file_name }}</td>
                                        <td>{{ isset($model->hasUser)?$model->hasUser->name:'N/A' }}</td>
									    <td>{!! \Illuminate\Support\Str::limit($model->hasMaterialFile->description,60) !!}</td>
                                        <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ asset('public/admin/assets/materials') }}/{{ $model->hasMaterialFile->file }}" class="btn btn-info btn-sm download-btn" data-toggle="tooltip" data-placement="top" title="Download File" download>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.del-btn', function(){
            var material_files = [];
            $(".material_files:checked").each(function() {
                material_files.push($(this).val());
            });

            if(material_files==''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Check file to delete!',
                    footer: 'To delete file have to check file.'
                })
                return false; 
            }

            var material_files = JSON.stringify(material_files);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : "{{ route('backpack.delete') }}",
                        type : 'DELETE',
                        data : {material_files:material_files},
                        success : function(response){
                            if(response){
                                window.location.reload();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire(
                                    'Not Deleted!',
                                    'Sorry! Something went wrong.',
                                    'danger'
                                )
                            }
                        }
                    });
                }
            })
        });
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
