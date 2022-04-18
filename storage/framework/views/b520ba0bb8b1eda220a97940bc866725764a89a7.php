<ul class="m-b-0">
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($message->sender_id==Auth::user()->id): ?>
            <li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time time-sender">10:10 AM, Today</span>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                </div>
                <div class="message other-message float-right sender-message">sender message</div>
            </li>
        <?php else: ?>
            <li class="clearfix">
                <div class="message-data receiver-side">
                    <span class="message-data-time time-receiver">dummy AM, Today</span>
                </div>
                <div class="message my-message receiver-message">reciever message</div>                                    
            </li>
        <?php endif; ?>      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\xampp\htdocs\lms\resources\views/chats/chat.blade.php ENDPATH**/ ?>