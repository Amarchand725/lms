@extends('layouts.app', [
    'title' => __('Mail Setting Management'),
    'parentSection' => 'laravel',
    'elementName' => 'mail_setting-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Mail Setting') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Mail Setting') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Mail Setting Management') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('mail_setting.update', $mail_setting->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <h6 class="heading-small text-muted mb-4">{{ __('Mail Setting information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('mail_mailer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_mailer">{{ __('Mail Mailer') }} <span style="color: red">*</span></label>
                                    <input type="text" name="mail_mailer" id="input-mail_mailer" class="form-control{{ $errors->has('mail_mailer') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_mailer') }}" value="{{ $mail_setting->mail_mailer }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_mailer'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_host') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_host">{{ __('Mail host') }} <span style="color: red">*</span></label>
                                    <input type="text" name="mail_host" id="input-mail_host" class="form-control{{ $errors->has('mail_host') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_host') }}" value="{{ $mail_setting->mail_host }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_host'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_port') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_port">{{ __('Mail Port') }} <span style="color: red">*</span></label>
                                    <input type="text" name="mail_port" id="input-mail_port" class="form-control{{ $errors->has('mail_port') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_port') }}" value="{{ $mail_setting->mail_port }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_port'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_username') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_username">{{ __('Mail User Name') }} <span style="color: red">*</span></label>
                                    <input type="text" name="mail_username" id="input-mail_username" class="form-control{{ $errors->has('mail_username') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_username') }}" value="{{ $mail_setting->mail_username }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_username'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_password">{{ __('Mail Password') }} <span style="color: red">*</span></label>
                                    <input type="text" name="mail_password" id="input-mail_password" class="form-control{{ $errors->has('mail_password') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_password') }}" value="{{ $mail_setting->mail_password }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_password'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_encryption') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_encryption">{{ __('Mail Encryption') }}</label>
                                    <input type="text" name="mail_encryption" id="input-mail_encryption" class="form-control{{ $errors->has('mail_encryption') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_encryption') }}" value="{{ $mail_setting->mail_encryption }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_encryption'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_from_address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_from_address">{{ __('Mail From Address') }}</label>
                                    <input type="text" name="mail_from_address" id="input-mail_from_address" class="form-control{{ $errors->has('mail_from_address') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_from_address') }}" value="{{ $mail_setting->mail_from_address }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_from_address'])
                                </div>
                                <div class="form-group{{ $errors->has('mail_from_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mail_from_name">{{ __('Mail From Name') }}</label>
                                    <input type="text" name="mail_from_name" id="input-mail_from_name" class="form-control{{ $errors->has('mail_from_name') ? ' is-invalid' : '' }}" placeholder="{{ __('mail_from_name') }}" value="{{ $mail_setting->mail_from_name }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'mail_from_name'])
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Save') }}</button>
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
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
@endpush
