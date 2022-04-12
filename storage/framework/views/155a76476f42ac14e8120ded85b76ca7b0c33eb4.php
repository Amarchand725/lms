

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?> 
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?> 
                <?php echo e(__('Subjects')); ?> 
            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('subject.index')); ?>"><?php echo e(__('Subject Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Subject')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Subject Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('subject.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('subject.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            
                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('subject information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('semester_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-semester_id"><?php echo e(__('Semester')); ?></label>
                                    <select name="semester_id" id="input-semester_id" class="form-control">
                                        <option value="" selected>Select semester</option>
                                        <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($semester->id); ?>"><?php echo e($semester->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'semester_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-title"><?php echo e(__('Title')); ?></label>
                                    <input type="text" name="title" id="input-title" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title')); ?>"  required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('code') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-code"><?php echo e(__('Subject Code')); ?></label>
                                    <input type="text" name="code" id="input-code" class="form-control<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Subject Code')); ?>" value="<?php echo e(old('code')); ?>"  required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('unit') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-unit"><?php echo e(__('Subject Units')); ?></label>
                                    <input type="number" name="unit" id="input-unit" class="form-control<?php echo e($errors->has('unit') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Subject Units')); ?>" value="<?php echo e(old('unit')); ?>"  required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'unit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                                    <textarea name="description" id="input-description" cols="30" rows="10" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Description')); ?>" value="<?php echo e(old('description')); ?>"></textarea>
                                    
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    'title' => __('Subject Management'),
    'parentSection' => 'laravel',
    'elementName' => 'subject-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/subjects/create.blade.php ENDPATH**/ ?>