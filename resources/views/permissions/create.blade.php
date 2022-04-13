@extends('layouts.app', [
    'title' => __('Permission Management'),
    'parentSection' => 'laravel',
    'elementName' => 'permission-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Permission') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">{{ __('Permission Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Permission') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permission Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('permission.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('permission.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Permission information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Group Name') }} <span style="color: red">*</span></label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])    
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Sub Permissions</label>
                                    <div class="col-sm-4">
                                        <!-- Default checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="all" id="checkAll"/>
                                            <label class="form-check-label" for="checkAll"> <strong>All</strong> </label>
                                        </div>
        
                                        <!-- Default checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="list" id="list" checked/>
                                            <label class="form-check-label" for="list"> <strong>List</strong></label>
                                        </div>
        
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="create" id="create"/>
                                            <label class="form-check-label" for="create"> <strong>Create</strong></label>
                                        </div>
        
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="edit" id="edit"/>
                                            <label class="form-check-label" for="edit"> <strong>Edit</strong></label>
                                        </div>
        
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="delete" id="delete"/>
                                            <label class="form-check-label" for="delete"> <strong>Delete</strong></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush