<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Class Quiz')); ?>

            <?php $__env->endSlot(); ?>
            <div class="col-12 mt-2">
                <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('alerts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <li class="breadcrumb-item"><a href="<?php echo e(route('quiz.index')); ?>"><?php echo e(__('Class Quiz Management')); ?></a></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Class Quiz Management')); ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('quiz.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('study_class_quiz.store')); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Class Quiz information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quiz"><?php echo e(__('Quiz')); ?> <span style="color: red">*</span></label>
                                            <select name="quiz_id" id="input-quiz" class="form-control">
                                                <option value="" selected>Select Quiz</option>
                                                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($quiz->id); ?>"><?php echo e($quiz->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'quiz_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-quiz_time"><?php echo e(__('Test Time (in minutes)')); ?> <span style="color: red">*</span></label>
                                            <input type="text" id="input-quiz_time" class="form-control" name="quiz_time" placeholder="Enter time in minutes e.g 5 or 10">
                                            <?php echo $__env->make('alerts.feedback', ['field' => 'quiz_time'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                                                <input class="form-check-input individual" name="assigned_to_classes[]" type="checkbox" value="<?php echo e($class->study_class_id); ?>" id="flexCheckDefault">
                                                            </div>
                                                        </td>
                                                        <td><?php echo e($class->hasStudyClass->name); ?></td>
                                                        <td><?php echo e($class->hasSubject->code); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($errors->first('assigned_to_classes.*')); ?>

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
    'title' => __('Class Quiz Management'),
    'parentSection' => 'laravel',
    'elementName' => 'study_class_quiz-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/class_quizzes/create.blade.php ENDPATH**/ ?>