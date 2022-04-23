<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0"><?php echo e($title); ?></h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('home')); ?>">
                        <?php if(Auth::user()->hasRole('Teacher')): ?>
                            <i class="fa fa-calendar"></i>
                        <?php else: ?> 
                            <i class="fas fa-home"></i>
                        <?php endif; ?>
                    </a>
                </li>
                <?php echo e($slot); ?>

            </ol>
        </nav>
    </div>
    <?php if(isset($calendar)): ?>
        <?php echo e($calendar); ?>

    
    <?php endif; ?>
    <?php if(Auth::user()->hasRole('Teacher') && request()->is('assigned_class')): ?>
        <div class="col-lg-6 col-5 text-right">
            <a class="btn btn-sm btn-neutral add-class-btn"><i class="fa fa-plus"></i> <?php echo e(__('Add Class')); ?></a>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/headers/breadcrumbs.blade.php ENDPATH**/ ?>