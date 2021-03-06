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
        <div class="col-12 mt-2">
            @include('alerts.success')
            @include('alerts.errors')
        </div>
        <div class="row">
            @foreach ($assigned_classes as $assigned)
                <div class="col-xl-3 col-md-6 class-card">
                    <a href="{{ route('study_class.show', $assigned->id) }}">
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
                                <p class="mt-3 mb-0 text-sm">
                                    <input type="hidden" id="delete-url" value="{{ route('assigned_class.destroy', $assigned->id) }}">
                                    <a class="text-danger mr-2" data-toggle="tooltip" data-placement="top" title="Remove Class" style="cursor: pointer" id="remove-btn-class" ><i class="fa fa-trash"></i> Remove</a>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Modal -->
        <div class="modal fade" id="add-classes-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('assigned_class.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="school_year_id" value="{{ $batch->id }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">Classes</label>
                                        <select name="study_class_id" id="input-class" class="form-control" required>
                                            <option value="" selected>Select class</option>
                                            @foreach ($study_classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">Subjects</label>
                                        <select name="subject_id" id="input-class" class="form-control" required>
                                            <option value="" selected>Select subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">School Year</label>
                                        <input type="text" class="form-control" disabled value="{{ $batch->year }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endcomponent
@endsection

@push('js')

    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '#remove-btn-class', function(){
            var delete_url = $(this).parents('.class-card').find('#delete-url').val();
            var card = $(this).parents('.class-card');
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
                        url : delete_url,
                        type : 'DELETE',
                        success : function(response){
                            if(response){
                                card.hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Your class has been removed.',
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
        $(document).on('click', '.add-class-btn', function(){
            $('#add-classes-modal').modal('show');
        });
    </script>
@endpush
