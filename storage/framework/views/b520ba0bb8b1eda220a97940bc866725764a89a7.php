<ul class="mb-5">
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($message->sender_id == Auth::user()->id): ?>
            <li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time time-sender"><?php echo e(($message->created_at)->format('h:i:s a, F, Y')); ?></span>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                </div>
                <div class="message other-message float-right sender-message"><?php echo e($message->message); ?></div>
            </li>
        <?php else: ?>
            <li class="clearfix">
                <div class="message-data receiver-side">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="avatar">
                    <span class="message-data-time time-receiver"><?php echo e(($message->created_at)->format('h:i:s a, F, Y')); ?></span>
                </div>
                <div class="message my-message receiver-message"><?php echo e($message->message); ?></div>                                    
            </li>
        <?php endif; ?>      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\xampp\htdocs\lms\resources\views/chats/chat.blade.php ENDPATH**/ ?>