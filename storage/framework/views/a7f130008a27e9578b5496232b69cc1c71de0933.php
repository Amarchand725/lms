

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
    <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
    <?php $__env->slot('title'); ?>
        <?php echo e(__('My Classes')); ?>

    <?php $__env->endSlot(); ?>

    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('School Year:')); ?> <?php echo e($batch->year); ?></li>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <?php $__currentLoopData = $assigned_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-md-6 class-card">
            <a href="<?php echo e(route('student.classmates', $assigned->id)); ?>">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?php echo e(asset('public/admin/assets/img/brand/class-default-img.jpg')); ?>" width="200px" alt="">
                            </div>
                            <div class="col text-center">
                                <span class="h2 font-weight-bold mb-0"><?php echo e($assigned->name); ?></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php echo $__env->renderComponent(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.app', [
    'elementName' => 'class'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/dashboard/student-dashboard.blade.php ENDPATH**/ ?>