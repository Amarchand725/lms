<div class="header bg-gradient-primary py-lg-4">
    <div class="container">
        <div class="header-body text-center mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <h1 class="text-white"><?php echo e(__('Welcome to CHMSC.')); ?></h1>

                    <p class="text-lead text-light mt-3 mb-0">
                        <?php echo e(__('CHMSC EXCELS:Excellence, Competence and Educational Leadership in Science and Technology')); ?>


                        <?php echo $__env->make('alerts.migrations_check', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div><?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/headers/guest.blade.php ENDPATH**/ ?>