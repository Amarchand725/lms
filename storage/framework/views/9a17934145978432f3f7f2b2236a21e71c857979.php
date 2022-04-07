<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Charts')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('page.index', 'charts')); ?>"><?php echo e(__('Charts')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Charts')); ?></li>
        <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->make('layouts.headers.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Overview</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Total sales</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Performance</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Total orders</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Growth</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Sales value</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-points" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Users</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Audience overview</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-doughnut" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Partners</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Affiliate traffic</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-pie" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!--* Card header *-->
                <!--* Card body *-->
                <!--* Card init *-->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Overview</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Product comparison</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-bar-stacked" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/admin/assets')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'parentSection' => '',
    'elementName' => 'charts'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/pages/charts.blade.php ENDPATH**/ ?>