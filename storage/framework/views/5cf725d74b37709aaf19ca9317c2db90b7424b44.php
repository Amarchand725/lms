<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Teachers</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_teachers']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('teacher.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Teachers</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_students']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('student.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Students</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Departments</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_departments']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-building"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('department.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Departments</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Subjects</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_subjects']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('subject.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Subjects</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Classes</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_classes']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-school"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('study_class.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Classes</span>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Assignments</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_assignments']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-tasks"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('assignment.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Assignments</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Materials</h5>
                        <span class="h2 font-weight-bold mb-0"><?php echo e($data['total_materials']); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fa fa-file"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <a href="<?php echo e(route('material.index')); ?>">
                        <span class="text-success mr-2"><i class="fa fa-arrow-right"></i></span>
                        <span class="text-nowrap">Downloadable Files</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/headers/cards.blade.php ENDPATH**/ ?>