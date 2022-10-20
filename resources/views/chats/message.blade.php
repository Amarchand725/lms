  @extends('layouts.app', [
  'title' => __('Student Management'),
  'parentSection' => 'laravel',
  'elementName' => 'Message'
  ])
  @push('css')
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <style>
  .container{
  max-width: 100% !important;
  padding-right: 0px !important;
  padding-left: 0px !important;
  }
  .input-group-text i {
  font-size: 1.575rem !important;
  }
  .header .bg-primary{
  padding-bottom: 1px !important;
  }
  </style>
  @endpush
  @section('content')
  @component('layouts.headers.auth')
  @component('layouts.headers.breadcrumbs')
  @slot('title')
  {{ __('Chat') }}
  @endslot
  <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
  @endcomponent
  @endcomponent
  <div class="container-fluid mt--6">
  <div class="row">
  <div class="col">
  <div class="card">
  <div class="container">
  <div class="row clearfix">
  <div class="col-lg-12">
  <div class="card chat-app">
  <div id="plist" class="people-list">
  <div class="input-group">
      {{-- <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-search"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Search..."> --}}

      <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#student" role="tab">Student</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#teacher" role="tab">Teacher</a>
          </li>
          @if(!Auth::user()->hasRole('Admin'))
          <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#admin" role="tab">Admin</a>
          </li>
          @endif
      </ul>
  </div>
  <div class="tab-content">
      <div class="tab-pane active" id="student" role="tabpanel">
          <ul class="list-unstyled chat-list mt-2 mb-0">
              <li class="clearfix active" data-user-id="{{ Auth::user()->id }}">
                  <i class="fa fa-thumb-tack text-warning pull-right"></i>
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                  <div class="about">
                      <div class="name">Me </div>
                      <div class="status"> <i class="fa fa-circle online"></i> online </div>


                  </div>
              </li>
              @foreach($students as $student)
                  @if($student->hasUser->id != Auth::user()->id)
                      <li class="clearfix" data-user-id="{{ $student->hasUser->id }}">
                          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                          <div class="about">
                              <div class="name">{{ $student->hasUser->name}} </div>
                              @if(count($student->hasUser->hasRecievedMessages))
                                  <div id="te-{{ $student->hasUser->id }}"><span class="badge rounded-pill bg-danger pull-right" style="color: white; background-color:red;">{{ count($student->hasUser->hasRecievedMessages) }}</span></div>
                              @endif
                              @if(!empty($student->hasUser->hasLogOut->logged_out))

                                  <div class="status"> <i class="fa fa-circle offline"></i>{{ \Carbon\Carbon::parse($student->hasUser->hasLogOut->logged_out)->diffForHumans() }} left</div>
                              @else
                                  <div class="status"> <i class="fa fa-circle online"></i>pakistan</div>
                              @endif
                          </div>
                      </li>
                  @endif
              @endforeach
          </ul>
      </div>
      <div class="tab-pane" id="teacher" role="tabpanel">
          <ul class="list-unstyled chat-list mt-2 mb-0">
              <li class="clearfix active" data-user-id="{{ Auth::user()->id }}">
                  <i class="fa fa-thumb-tack text-warning pull-right"></i>
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                  <div class="about">
                      <div class="name">Me </div>
                      <div class="status "> <i class="fa fa-circle online"></i> online </div>
                  </div>
              </li>
              @foreach($teachers as $teacher)
                  @if($teacher->hasUser->id != Auth::user()->id)
                      <li class="clearfix" data-user-id="{{ $teacher->hasUser->id }}">
                          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                          <div class="about">
                              <div class="name">{{ $teacher->hasUser->name}}</div>
                              @if(count($teacher->hasUser->hasRecievedMessages))
                                  <div id="te-{{ $teacher->hasUser->id }}"><span class="badge rounded-pill bg-danger pull-right" style="color: white; background-color:red;">{{ count($teacher->hasUser->hasRecievedMessages) }}</span></div>
                              @endif
                              @if(!empty($teacher->hasUser->hasLogOut->logged_out))

                                  <div class="status"> <i class="fa fa-circle offline"></i>{{ \Carbon\Carbon::parse($teacher->hasUser->hasLogOut->logged_out)->diffForHumans() }} left</div>
                              @else
                                  <div class="status "> <i class="fa fa-circle online"></i></div>
                              @endif
                          </div>
                      </li>
                  @endif
              @endforeach
          </ul>
      </div>
      @if(isset($admin))
      <div class="tab-pane" id="admin" role="tabpanel">
          <ul class="list-unstyled chat-list mt-2 mb-0">
              <li class="clearfix active" data-user-id="{{$admin->id}} ">
                  <i class="fa fa-thumb-tack text-warning pull-right"></i>
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                  <div class="about">
                      <div class="name">Admin </div>
                      @if(!empty(Auth::user()->hasLogOut->logged_out))
                      <div class="status"> <i class="fa fa-circle online"></i> online </div>

                      @else
                      <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>
                      @endif
                  </div>
              </li>




          </ul>

      </div>
      @endif

  </div>

  </div>
  <div class="chat">
  <div class="chat-header clearfix">
      <div class="row">
          <div class="col-lg-6">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
              </a>
              <div class="chat-about">
                  <h6 class="m-b-0"><span id="active-user-name">{{Auth::user()->name}}</span></h6>
                  <div class="status"> <i class="fa fa-circle login-status"></i> <span id="login-status-label">online</span></div>
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
              <button class="input-group-text send-msg-btn"><i class="fa fa-send"></i></button>
          </div>
          <textarea name="message" class="form-control" id="chatsystem" placeholder="Enter message here..."></textarea>
      </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  @include('layouts.footers.auth')
  @endsection
  @push('js')
  <script>
  $(document).ready(function(){
  $('ul li').click(function(){
  $('li').removeClass("active");
  $(this).addClass("active");
  });
  var reciever_id = $('.chat-list li.active').attr('data-user-id');
  refresh(reciever_id);
  });
  $(document).on('click', '.send-msg-btn', function(){
  var reciever_id = $('.chat-list li.active').attr('data-user-id');
  formdata(reciever_id);
  });
  $(document).ready(function(){
  $(document).on('change keypress paste','#chatsystem',function(e) {
    var len = $(this).val().length;
    if( len <= 0){

     $('li .active').find('.status').append('hi');

  }
    if( len < 0){
     $('li.active').remove()
  }

  });
});



  $('#chatsystem').on('keypress',function(e) {
  if(e.which == 13) {
  var reciever_id = $('.chat-list li.active').attr('data-user-id');
  formdata(reciever_id);
  }
  });

  $(document).on('click','.active', function(){
  var reciever_id = $('.chat-list li.active').attr('data-user-id');
  refresh(reciever_id);
  } );

  setInterval(function(){
  var reciever_id = $('.chat-list li.active').attr('data-user-id');
  refresh(reciever_id);
  },5000);

  function refresh(reciever_id){
  $.ajax({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url : "{{ route('student.chat.message') }}",
  type: "post",
  data : {reciever_id:reciever_id},
  success : function(response){
  if(response.login_status){
  $('.login-status').removeClass('offline');
  $('#login-status-label').html('Online');
  $('.login-status').addClass('online');
  }else{
  $('.login-status').removeClass('online');
  $('#login-status-label').html('Offline');
  $('.login-status').addClass('offline');
  }

  $('#te-'+reciever_id).remove();

  $('#active-user-name').html(response.user);
  $('#chat-history').html(response.chat);
  }
  });
  }

  function formdata(reciever_id){
  $.ajax({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url : "{{ route('student.save.chat.message') }}",
  type: "post",
  data : {reciever_id:reciever_id, message:$('#chatsystem').val()},
  success : function(response){
  $('#chatsystem').val('')
  $('#chat-history').html(response);
  }
  });
  }
  </script>
  @endpush
