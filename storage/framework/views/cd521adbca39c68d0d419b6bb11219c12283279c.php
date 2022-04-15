<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Material')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('material.index')); ?>"><?php echo e(__('Material Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Material')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Material Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('material.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('material.store')); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('material information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('study_class_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-department"><?php echo e(__('Study Class')); ?></label>
                                    <select name="study_class_id" id="input-department" class="form-control">
                                        <option value="" selected>Select study class</option>
                                        <?php $__currentLoopData = $study_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($study_class->id); ?>"><?php echo e($study_class->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'study_class_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('file_name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-file_name"><?php echo e(__('File Name')); ?></label>
                                            <input type="text" name="file_name" id="input-file_name" class="form-control<?php echo e($errors->has('file_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Document Name')); ?>" value="<?php echo e(old('file_name')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'file_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('file') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-file"><?php echo e(__('File')); ?></label>
                                            <input type="file" name="file" id="input-file" class="form-control<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e(old('file')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'file'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
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
    'title' => __('Material Management'),
    'parentSection' => 'laravel',
    'elementName' => 'material-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/materials/create.blade.php ENDPATH**/ ?>