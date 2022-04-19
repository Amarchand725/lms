

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?> 
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?> 
                <?php echo e(__('Students')); ?> 
            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('student.index')); ?>"><?php echo e(__('Student Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Student')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Student Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('student.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('student.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            
                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('student information')); ?></h6>
                            <div class="pl-lg-4">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('study_class') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-study_class"><?php echo e(__('Study Class')); ?></label>
                                            <select name="study_class_id" id="input-study_class" class="form-control">
                                                <option value="" selected>Select class</option>
                                                <?php $__currentLoopData = $study_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($study_class->id); ?>"><?php echo e($study_class->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
        
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'study_class'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('student_id') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-student_id"><?php echo e(__('Student ID')); ?></label>
                                            <input type="text" name="student_id" id="input-student_id" class="form-control<?php echo e($errors->has('student_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Student ID')); ?>" value="<?php echo e(old('student_id')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'student_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('first_name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-first_name"><?php echo e(__('First Name')); ?></label>
                                            <input type="text" name="first_name" id="input-first_name" class="form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e(old('first_name')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'last_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('last_name') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-last_name"><?php echo e(__('Last Name')); ?></label>
                                            <input type="text" name="last_name" id="input-last_name" class="form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e(old('last_name')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'last_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-email"><?php echo e(__('E-mail')); ?></label>
                                    <input type="text" name="email" id="input-email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email')); ?>"  required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-password"><?php echo e(__('Password')); ?></label>
                                            <input type="password" name="password" id="input-password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" value="<?php echo e(old('password')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-danger' : ''); ?>">
                                            <label class="form-control-label" for="input-password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                                            <input type="password" name="password_confirmation" id="input-password_confirmation" class="form-control<?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Confirm password')); ?>" value="<?php echo e(old('password_confirmation')); ?>"  required autofocus>

                                            <?php echo $__env->make('alerts.feedback', ['field' => 'password_confirmation'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group<?php echo e($errors->has('location') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-location"><?php echo e(__('Location')); ?></label>
                                    <textarea name="location" id="input-location" class="form-control<?php echo e($errors->has('location') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Location')); ?>" value="<?php echo e(old('location')); ?>"></textarea>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'location'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    'title' => __('Student Management'),
    'parentSection' => 'laravel',
    'elementName' => 'student-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/students/create.blade.php ENDPATH**/ ?>