
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
        <li class="clearfix user-status" id="user-status" data-id="{{Auth::user()->id}}">
        <i class="fa fa-thumb-tack text-warning pull-right"></i>
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
        <div class="about"> 
            
            <div class="name">Me </div> 
            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                        
        </div>
        </li>
     

        @foreach($classmates as $friends)
        @if($friends->hasUser->id == Auth::user()->id)

        @else
   
        <li class="clearfix user-status" id="user-status" data-id="{{$friends->hasUser->id}}">
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
        <div class="about">
            <div class="name">{{ $friends->hasUser->name}}</div>
            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
        </div>
        </li>
        @endif

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
                <h6 class="m-b-0">{{Auth::user()->name}}</h6>
                <div class="status"> <i class="fa fa-circle online"></i> online </div>
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
        <h1 class="text-center"> Welcome to chat</h1>
        </ul> 
        </div>
    
        <div class="chat-message clearfix">
        <div class="input-group mb-0">
        <div class="input-group-prepend">
         <span class="input-group-text"><i class="fa fa-send"></i></span>
        </div>
        <input type="text" id ="chatsystem" name = "message" class="form-control" placeholder="Enter text here...">                                    
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
        var user_id = null;

        function refresh(id){
                $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('student.chat.message') }}",
                type: "post",
                data : {user_id:id},
                success : function(response){

                // var html = '<h1>Hello</h1>';
                $('#chat-history').html(response);     
                }
                });
        }


        $(document).on('click','.user-status', function(){

          user_id = $(this).attr("data-id");

            refresh(user_id);

        } );

        setInterval(function(){

           refresh(user_id);
           },2000);

                        // Submitting data

            function formdata(user_id){

                console.log(user_id);
                return false;

                $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('student.save.chat.message') }}",
                type: "post",
                data : {user_id:user_id,message:$('#chatsystem').val()},
                success : function(response){
                    console.log(response);
                    return false;
               refresh(user_id);  
                }
                });
            }
       

            $('#chatsystem').on('keypress',function(e) {
            if(e.which == 13) {
               formdata();
    }
});
    




        </script>    
        @endpush