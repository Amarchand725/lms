
        

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
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Search...">
        </div>
        <ul class="list-unstyled chat-list mt-2 mb-0">
        <li class="clearfix user-status" id="user-status" data-id="<?php echo e(Auth::user()->id); ?>">
        <i class="fa fa-thumb-tack text-warning pull-right"></i>
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
        <div class="about"> 
            
            <div class="name">Me </div> 
            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                        
        </div>
        </li>
     

        <?php $__currentLoopData = $classmates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friends): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($friends->hasUser->id == Auth::user()->id): ?>

        <?php else: ?>
   
        <li class="clearfix user-status" id="user-status" data-id="<?php echo e($friends->hasUser->id); ?>">
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
        <div class="about">
            <div class="name"><?php echo e($friends->hasUser->name); ?></div>
            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
        </div>
        </li>
        <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h6 class="m-b-0"><?php echo e(Auth::user()->name); ?></h6>
                <div class="status"> <i class="fa fa-circle online"></i> online </div>
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

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('js'); ?>
        <script>
        var user_id = null;

        function refresh(id){
                $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "<?php echo e(route('student.chat.message')); ?>",
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
                url : "<?php echo e(route('student.save.chat.message')); ?>",
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
        <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
        'title' => __('Student Management'),
        'parentSection' => 'laravel',
        'elementName' => 'Message'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/chats/message.blade.php ENDPATH**/ ?>