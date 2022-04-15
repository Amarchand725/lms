<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('public/admin/assets')); ?>/img/brand/logo.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo e($elementName == 'dashboard' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text"><?php echo e(__('Dashboard')); ?></span>
                        </a>
                    </li>
                    <?php if(Auth::user()->hasRole('Admin')): ?>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Calendar')); ?></span>
                            </a>
                        </li>
                    
                        <li class="nav-item <?php echo e($elementName == 'charts' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','charts')); ?>">
                                <i class="ni ni-chart-pie-35 text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Charts')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="fa fa-cogs text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('System Management')); ?></span>
                            </a>
                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item <?php echo e($elementName == 'profile' ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('profile.edit')); ?>" class="nav-link"><?php echo e(__('Profile')); ?></a>
                                    </li>
                                    <li class="nav-item  <?php echo e($elementName == 'role-management' ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('role.index')); ?>" class="nav-link"><?php echo e(__('Role Management')); ?></a>
                                    </li>
                                    
                                    <li class="nav-item <?php echo e($elementName == 'user-management' ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('user.index')); ?>" class="nav-link"><?php echo e(__('User Management')); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'teacher' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('teacher.index')); ?>">
                                <i class="fa fa-users text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Teachers')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'student' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('student.index')); ?>">
                                <i class="fa fa-users text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Students')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'semester' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('semester.index')); ?>">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Semester')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'subject' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('subject.index')); ?>">
                                <i class="fa fa-book text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Subjects')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'study_class' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('study_class.index')); ?>">
                                <i class="fa fa-home text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Study Classes')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'department' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('department.index')); ?>">
                                <i class="fa fa-building text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Departments')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'material' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('material.index')); ?>">
                                <i class="fa fa-download text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Materials')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'assignment' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('assignment.index')); ?>">
                                <i class="fa fa-upload text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Assignments')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'content' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('content.index')); ?>">
                                <i class="fa fa-file text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Contents')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'log' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('log.index')); ?>">
                                <i class="fa fa-history text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('User Logs')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'activity_log' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('activity_log.index')); ?>">
                                <i class="fa fa-tasks text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Activity Logs')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'school_year' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('school_year.index')); ?>">
                                <i class="fa fa-school text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('School Year')); ?></span>
                            </a>
                        </li>
                    <?php elseif(Auth::user()->hasRole('Teacher')): ?>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-school text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('My Classes')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-bell text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Notifications')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-envelope text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Messages')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-suitcase text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Backpack')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-download text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Downloadable Materials')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-bullhorn text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Announcements')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-tasks text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Assignments')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-question text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Quiz')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e($elementName == 'calendar' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('page.index','calendar')); ?>">
                                <i class="fa fa-share-alt text-primary"></i>
                                <span class="nav-link-text"><?php echo e(__('Shared Files')); ?></span>
                            </a>
                        </li>
                    <?php elseif(Auth::user()->hasRole('Student')): ?>
                        <li>Student sidebar</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>