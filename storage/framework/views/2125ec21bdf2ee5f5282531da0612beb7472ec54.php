
<?php $__env->startPush('css'); ?>
    <style>
        .container{
            max-width: 100% !important;
            padding-right: 0px !important; 
            padding-left: 0px !important;
        }
        .input-group-text i {
            font-size: 1.575rem !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?> 
    <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
    <?php $__env->slot('title'); ?> 
        <?php echo e(__('Students')); ?> 
    <?php $__env->endSlot(); ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#student" role="tab">Student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#teacher" role="tab">Teacher</a>
                                </li>
                                <?php if(!Auth::user()->hasRole('Admin')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin" role="tab">Admin</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="student" role="tabpanel">
                                <ul class="list-unstyled chat-list mt-2 mb-0">
                                    <li class="clearfix active" data-user-id="<?php echo e(Auth::user()->id); ?>">
                                        <i class="fa fa-thumb-tack text-warning pull-right"></i>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                        <div class="about">     
                                            <div class="name">Me </div> 
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>                                   
                                        </div>
                                    </li>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($student->hasUser->id != Auth::user()->id): ?>
                                            <li class="clearfix" data-user-id="<?php echo e($student->hasUser->id); ?>">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name"><?php echo e($student->hasUser->name); ?> </div>
                                                    <?php if(count($student->hasUser->hasRecievedMessages)): ?>
                                                        <div id="te-<?php echo e($student->hasUser->id); ?>"><span class="badge rounded-pill bg-danger pull-right" style="color: white; background-color:red;"><?php echo e(count($student->hasUser->hasRecievedMessages)); ?></span></div>
                                                    <?php endif; ?>
                                                    <?php if($student->hasUser->hasLogOut): ?>
                                                        <div class="status"> <i class="fa fa-circle offline"></i><?php echo e(\Carbon\Carbon::parse($student->hasUser->hasLogOut->logged_out)->diffForHumans()); ?> left</div>
                                                    <?php else: ?> 
                                                        <div class="status"> <i class="fa fa-circle online"></i></div>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="teacher" role="tabpanel">
                                <ul class="list-unstyled chat-list mt-2 mb-0">
                                    <li class="clearfix active" data-user-id="<?php echo e(Auth::user()->id); ?>">
                                        <i class="fa fa-thumb-tack text-warning pull-right"></i>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                        <div class="about">     
                                            <div class="name">Me </div> 
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>                                   
                                        </div>
                                    </li>
                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($teacher->hasUser->id != Auth::user()->id): ?>
                                            <li class="clearfix" data-user-id="<?php echo e($teacher->hasUser->id); ?>">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name"><?php echo e($teacher->hasUser->name); ?></div>
                                                    <?php if(count($teacher->hasUser->hasRecievedMessages)): ?>
                                                        <div id="te-<?php echo e($teacher->hasUser->id); ?>"><span class="badge rounded-pill bg-danger pull-right" style="color: white; background-color:red;"><?php echo e(count($teacher->hasUser->hasRecievedMessages)); ?></span></div>
                                                    <?php endif; ?>
                                                    <?php if($teacher->hasUser->hasLogOut): ?>
                                                        <div class="status"> <i class="fa fa-circle offline"></i><?php echo e(\Carbon\Carbon::parse($teacher->hasUser->hasLogOut->logged_out)->diffForHumans()); ?> left</div>
                                                    <?php else: ?> 
                                                        <div class="status"> <i class="fa fa-circle online"></i></div>
                                                    <?php endif; ?>                                       
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                             <?php if(isset($admin)): ?>
                            <div class="tab-pane" id="admin" role="tabpanel">
                                <ul class="list-unstyled chat-list mt-2 mb-0">
                                    <li class="clearfix active" data-user-id="<?php echo e($admin->id); ?> ">
                                        <i class="fa fa-thumb-tack text-warning pull-right"></i>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                        <div class="about">     
                                            <div class="name">Admin </div> 
                                            <?php if(!empty(Auth::user()->hasLogOut->logged_out)): ?>
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                                                  
                                            <?php else: ?> 
                                            <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>                                  
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                
                        
                                       
                                
                                </ul>
                              
                            </div>
                            <?php endif; ?>
                            
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
                                        <h6 class="m-b-0"><span id="active-user-name"><?php echo e(Auth::user()->name); ?></span></h6>
                                        <div class="status"> <i class="fa fa-circle login-status"></i> <span id="login-status-label">online</span></div>
                                    </div>
                                </div>
                                
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

    <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
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
                url : "<?php echo e(route('student.chat.message')); ?>",
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
                url : "<?php echo e(route('student.save.chat.message')); ?>",
                type: "post",
                data : {reciever_id:reciever_id, message:$('#chatsystem').val()},
                success : function(response){
                    $('#chatsystem').val('')
                    $('#chat-history').html(response);
                }
            });
        }
    </script>    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
    'title' => __('Student Management'),
    'parentSection' => 'laravel',
    'elementName' => 'Message'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/chats/message.blade.php ENDPATH**/ ?>