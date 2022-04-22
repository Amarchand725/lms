

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Assignments')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('assignment.index')); ?>"><?php echo e(__('Assignment Management')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('List')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Assignments')); ?></h3>
                                <p class="text-sm mb-0">
                                        <?php echo e(__('This is an example of assignment management. This is a minimal setup in order to get started fast.')); ?>

                                    </p>
                            </div>
                            <?php if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Teacher')): ?>
                                <div class="col-4 text-right">
                                    <a href="<?php echo e(route('assignment.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add Assignment')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('alerts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(__('No#')); ?></th>
                                    <th scope="col"><?php echo e(__('File Name')); ?></th>
                                    <?php if(Auth::user()->hasRole('Admin')): ?>
                                        <th scope="col"><?php echo e(__('Upload By')); ?></th>
                                    <?php endif; ?>
                                    <th scope="col"><?php echo e(__('Description')); ?></th>
                                    <th scope="col"><?php echo e(__('Status')); ?></th>
                                    <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                        <td><?php echo e($model->name); ?></td>
                                        <?php if(Auth::user()->hasRole('Admin')): ?>
                                            <td><?php echo e(isset($model->hasUser)?$model->hasUser->name:'N/A'); ?></td>
                                        <?php endif; ?>
									    <td><?php echo \Illuminate\Support\Str::limit($model->description,60); ?></td>
                                        <td>
                                            <?php if($model->status): ?>
                                                <span class="badge badge-info">Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-info">Active</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($model->created_at->format('d/m/Y H:i')); ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="<?php echo e(route('assignment.show', $model)); ?>"><?php echo e(__('Show')); ?></a>

                                                    <?php if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Teacher')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('assignment.edit', $model)); ?>"><?php echo e(__('Edit')); ?></a> 
                                                        <form action="<?php echo e(route('assignment.destroy', $model->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>

                                                            <button type="button" class="dropdown-item" onclick="confirm('<?php echo e(__("Are you sure you want to delete this model?")); ?>') ? this.parentElement.submit() : ''">
                                                                <?php echo e(__('Delete')); ?>

                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="8">
                                        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                        <div class="d-flex justify-content-center">
                                            <?php echo $models->links('pagination::bootstrap-4'); ?>

                                        </div>
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
    'title' => __('Assignment Management'),
    'parentSection' => 'laravel',
    'elementName' => 'assignment-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/assignments/index.blade.php ENDPATH**/ ?>