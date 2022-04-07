<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <h1 class="text-white"><?php echo e(__('Welcome to Argon Dashboard Pro Laravel Live Preview.')); ?></h1>

                    <p class="text-lead text-light mt-3 mb-0">
                        <?php echo e(__('Log in and see how you can save more than 150 hours of work with CRUDs for managing: #users, #roles, #items, #categories, #tags and more.')); ?>

                        <?php echo $__env->make('alerts.migrations_check', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </p>
                </div>
                <?php if(isset($infoLogin)): ?>
                <div class="col-lg-5 col-md-6">
                        <h3 class="text-lead text-white mt-5 mb-0">
                            <strong><?php echo e(__('You can log in with 3 user types:')); ?></strong>
                        </h3>
                        <ol class="text-lead text-light mt-3 mb-0">
                            <li><?php echo e(__('Username')); ?> <b>admin@argon.com</b> <?php echo e(__('Password')); ?> <b>secret</b></li>
                            <li><?php echo e(__('Username')); ?> <b>creator@argon.com</b> <?php echo e(__('Password')); ?> <b>secret</b></li>
                            <li><?php echo e(__('Username')); ?> <b>member@argon.com</b> <?php echo e(__('Password')); ?> <b>secret</b></li>
                        </ol>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div><?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/headers/guest.blade.php ENDPATH**/ ?>