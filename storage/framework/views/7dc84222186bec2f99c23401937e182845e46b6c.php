<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title itemprop="name"><?php echo e($metaTitle ?? 'Learning Managment System'); ?></title>

        <!-- Favicon -->
        <link href="<?php echo e(asset('public/admin/assets')); ?>/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <!-- Icons -->
        <link href="<?php echo e(asset('public/admin/assets')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo e(asset('public/admin/assets')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        <?php echo $__env->yieldPushContent('css'); ?>

        <!-- Argon CSS -->
        <link type="text/css" href="<?php echo e(asset('public/admin/css')); ?>/argon.css?v=2.0.0" rel="stylesheet">
    </head>
    <body class="<?php echo e($class ?? ''); ?>">
        <?php if(auth()->guard()->check()): ?>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
            <?php if(!in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock'])): ?>
                <?php echo $__env->make('layouts.navbars.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>

        <div class="main-content">
            <?php echo $__env->make('layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php if(!auth()->check() || in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock'])): ?>
            <?php echo $__env->make('layouts.footers.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo e(asset('public/admin/assets/js/bootstrap.bundle.min.js')); ?>" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/js-cookie/js.cookie.js"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        
        <!-- Optional JS -->
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
        

        <?php echo $__env->yieldPushContent('js'); ?>
        
        <!-- Argon JS -->
        <script src="<?php echo e(asset('public/admin/assets')); ?>/js/argon.js?v=1.0.1"></script>
        <script src="<?php echo e(asset('public/admin/assets')); ?>/js/demo.min.js"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/app.blade.php ENDPATH**/ ?>