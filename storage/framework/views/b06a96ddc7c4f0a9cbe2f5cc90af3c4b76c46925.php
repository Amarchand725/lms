

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('My Classes')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('School Year:')); ?> <?php echo e($batch->year); ?></li>
        <?php echo $__env->renderComponent(); ?>
        <div class="col-12 mt-2">
            <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('alerts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="row">
            <?php $__currentLoopData = $assigned_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-md-6 class-card">
                    <a href="<?php echo e(route('study_class.show', $assigned->id)); ?>">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="<?php echo e(asset('public/admin/assets/img/brand/class-default-img.jpg')); ?>" width="200px" alt="">
                                    </div>
                                    <div class="col text-center">
                                        <span class="h2 font-weight-bold mb-0"><?php echo e($assigned->hasStudyClass->name); ?></span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <input type="hidden" id="delete-url" value="<?php echo e(route('assigned_class.destroy', $assigned->id)); ?>">
                                    <a class="text-danger mr-2" data-toggle="tooltip" data-placement="top" title="Remove Class" style="cursor: pointer" id="remove-btn-class" ><i class="fa fa-trash"></i> Remove</a>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="add-classes-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('assigned_class.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="school_year_id" value="<?php echo e($batch->id); ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">Classes</label>
                                        <select name="study_class_id" id="input-class" class="form-control" required>
                                            <option value="" selected>Select class</option>
                                            <?php $__currentLoopData = $study_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">Subjects</label>
                                        <select name="subject_id" id="input-class" class="form-control" required>
                                            <option value="" selected>Select subject</option>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="input-class">School Year</label>
                                        <input type="text" class="form-control" disabled value="<?php echo e($batch->year); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '#remove-btn-class', function(){
            var delete_url = $(this).parents('.class-card').find('#delete-url').val();
            var card = $(this).parents('.class-card');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : delete_url,
                        type : 'DELETE',
                        success : function(response){
                            if(response){
                                card.hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Your class has been removed.',
                                    'success'
                                )
                            }else{
                                Swal.fire(
                                    'Not Deleted!',
                                    'Sorry! Something went wrong.',
                                    'danger'
                                )
                            }
                        }
                    });
                }
            })
        });
        $(document).on('click', '.add-class-btn', function(){
            $('#add-classes-modal').modal('show');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'elementName' => 'dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/dashboard/teacher-dashboard.blade.php ENDPATH**/ ?>