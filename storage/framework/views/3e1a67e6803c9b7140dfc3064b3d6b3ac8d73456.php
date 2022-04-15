<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Assignment')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('assignment.index')); ?>"><?php echo e(__('Assignment Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Assignment')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Assignment Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('assignment.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('assignment.store')); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('assignment information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?> <span style="color: red">*</span></label>
                                            <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('file') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-file"><?php echo e(__('File')); ?> <span style="color: red">*</span></label>
                                            <input type="file" name="file" id="input-file" class="form-control<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?>" required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'file'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                                            <textarea name="description" id="input-description" class="form-control" placeholder="Enter description"></textarea>
                                        </div>

                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-control-label" for="input-name"><?php echo e(__('Check The Class you want to put this file.')); ?></label>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkboxes">
                                                            <label class="form-check-label" for="checkboxes">
                                                              Check All
                                                            </label>
                                                        </div>    
                                                    </th>
                                                    <th>Study Class</th>
                                                    <th>Subject Code</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $assigned_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input individual" name="assignment_assigned[<?php echo e($class->study_class_id); ?>][]" type="checkbox" value="1" id="flexCheckDefault">
                                                            </div>
                                                        </td>
                                                        <td><?php echo e($class->hasStudyClass->name); ?></td>
                                                        <td><?php echo e($class->hasSubject->code); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                        </div>
                                    </div>
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
<?php $__env->startPush('js'); ?>
    <script>
        $("#checkboxes").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
    'title' => __('Assignment Management'),
    'parentSection' => 'laravel',
    'elementName' => 'assignment-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/assignments/create.blade.php ENDPATH**/ ?>