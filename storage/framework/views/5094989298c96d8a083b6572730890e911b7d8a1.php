<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Materials')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('material.index')); ?>"><?php echo e(__('Material Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Show')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Materials')); ?></h3>
                                <p class="text-sm mb-0">
									<?php echo e(__('This is an example of material management. This is a minimal setup in order to get started fast.')); ?>

								</p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('material.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('alerts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <tbody>
								<tr>
									<th>Class</th>
									<td><?php echo e($model->hasStudyClass->name); ?></td>
								</tr>
								<tr>
									<th>File Name</th>
									<td><?php echo e($model->file_name); ?></td>
								</tr>
								
								<tr>
									<th>Description</th>
									<td><?php echo e($model->description); ?></td>
								</tr>
								<tr>
									<th>File</th>
									<td>
										<img src="<?php echo e(asset('public/admin/assets/materials')); ?>/<?php echo e($model->file); ?>" width="200px" alt="">
									</td>
								</tr>
								<tr>
									<th>Uploaded By</th>
									<td><?php echo e($model->hasCreatedBy->name); ?></td>
								</tr>
								<tr>
									<th>Created at</th>
									<td><?php echo e(date('d, M-Y H:i A', strtotime($model->created_at))); ?></td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										<?php if($model->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?> 
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
								</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo e(asset('public/argon')); ?>/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'title' => __('Material Management'),
    'parentSection' => 'laravel',
    'elementName' => 'material-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/materials/show.blade.php ENDPATH**/ ?>