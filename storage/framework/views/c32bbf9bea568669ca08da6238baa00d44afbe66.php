<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Announcements')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('announcement.index')); ?>"><?php echo e(__('announcement Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Announcement')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Announcement Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('announcement.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('announcement.update', $announcement->id)); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>


                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Announcement information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('study_class_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-department"><?php echo e(__('Study Class')); ?></label>
                                    <select name="study_class_id" id="input-department" class="form-control">
                                        <option value="" selected>Select study class</option>
                                        <?php $__currentLoopData = $study_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($study_class->hasStudyClass->id); ?>" <?php echo e($study_class->hasStudyClass->id==$announcement->study_class_id?'selected':''); ?>><?php echo e($study_class->hasStudyClass->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'study_class_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-announcement"><?php echo e(__('announcement')); ?></label>
                                    <textarea name="announcement" id="input-announcement" class="form-control" placeholder="Enter announcement"><?php echo e($announcement->announcement); ?></textarea>
                                </div>

                                <?php echo $__env->make('alerts.feedback', ['field' => 'announcement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-status"><?php echo e(__('Status')); ?></label>
                                    <select name="status" id="input-status" class="form-control">
                                        <option value="1" <?php echo e($announcement->status==1?'selected':''); ?>>Active</option>
                                        <option value="0" <?php echo e($announcement->status==0?'selected':''); ?>>In-Active</option>
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
    'title' => __('Announcement Management'),
    'parentSection' => 'laravel',
    'elementName' => 'announcement-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/announcements/edit.blade.php ENDPATH**/ ?>