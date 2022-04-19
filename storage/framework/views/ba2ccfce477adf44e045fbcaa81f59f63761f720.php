<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('School Year')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('school_year.index')); ?>"><?php echo e(__('school_year Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add school_year')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('School Year Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('school_year.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('school_year.store')); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('school_year information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('year') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-year"><?php echo e(__('School Year')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="year" id="input-year" class="form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Year')); ?>" value="<?php echo e(old('year')); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'year'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                                    <textarea name="description" id="input-description" class="form-control" placeholder="Enter description"></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
    'title' => __('School Year Management'),
    'parentSection' => 'laravel',
    'elementName' => 'school_year-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/school_years/create.blade.php ENDPATH**/ ?>