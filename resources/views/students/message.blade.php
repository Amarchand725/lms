@extends('layouts.app', [
    'title' => __('Student Management'),
    'parentSection' => 'laravel',
    'elementName' => 'Message'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Students') }} 
            @endslot

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    @foreach($classmates as $friends)
                    <li class="clearfix" id="user-status" data-id="{{$friends->hasUser->id}}">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        <div class="about">
                            <div class="name">{{ $friends->hasUser->name}}</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                        </div>
                    </li>
                    
                    @endforeach
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">dummy</h6>
                                <small>Last seen: dummy</small>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="chat-history" id="chat-history">
                    <ul class="m-b-0">
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time time-sender">10:10 AM, Today</span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </div>
                            <div class="message other-message float-right sender-message"></div>
                        </li>
                        <li class="clearfix">
                            <div class="message-data receiver-side">
                                <span class="message-data-time time-receiver">dummy AM, Today</span>
                            </div>
                            <div class="message my-message receiver-message"></div>                                    
                        </li>                               
                        {{-- <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:15 AM, Today</span>
                            </div>
                            <div class="message my-message">Project has been already finished and I have results to show you.</div>
                        </li> --}}
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" name = "message" class="form-control" placeholder="Enter text here...">                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        
        @include('layouts.footers.auth')
    </div>
    
@endsection
@push('js')
<script>

    $(document).on('click','#user-status', function(){
        var user_id = $('#user-status').attr("data-id");
            //   console.log(user_id);
            // alert();
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('student.chat.message') }}",
                type: "post",
                data : {user_id:user_id},
                success : function(response){
                    
                    // var html = '<h1>Hello</h1>';
                    $('#chat-history').html(response);     
                }
            });
    } );
    </script>    
@endpush