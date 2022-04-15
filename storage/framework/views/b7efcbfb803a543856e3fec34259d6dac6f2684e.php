<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Materials')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('material.index')); ?>"><?php echo e(__('Material Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Material')); ?></li>
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
                        <form method="post" action="<?php echo e(route('material.update', $model->id)); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>


                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('material information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('study_class_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-department"><?php echo e(__('Study Class')); ?></label>
                                    <select name="study_class_id" id="input-department" class="form-control">
                                        <option value="" selected>Select study class</option>
                                        <?php $__currentLoopData = $study_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($study_class->id); ?>" <?php echo e($model->study_class_id==$study_class->id?'selected':''); ?>><?php echo e($study_class->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'study_class_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('file_name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-file_name"><?php echo e(__('File Name')); ?></label>
                                            <input type="text" name="file_name" id="input-file_name" class="form-control<?php echo e($errors->has('file_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Document Name')); ?>" value="<?php echo e($model->file_name); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'file_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('file') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-file"><?php echo e(__('File')); ?></label>
                                            <input type="file" name="file" id="input-file" class="form-control<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e(old('file')); ?>" autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'file'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($model->file)): ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="<?php echo e(asset('public/admin/assets/materials')); ?>/<?php echo e($model->file); ?>" width="100px" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                                    <textarea name="description" id="input-description" class="form-control" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
                                </div>
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-status"><?php echo e(__('Status')); ?></label>
                                    <select name="status" id="input-status" class="form-control">
                                        <option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
                                        <option value="0" <?php echo e($model->status==0?'selected':''); ?>>In-Active</option>
                                    </select>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/materials/edit.blade.php ENDPATH**/ ?>