<?php $elementName = \Request::segment(1);  ?>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('public/admin/assets') }}/img/brand/logo.png" class="navbar-brand-img" alt="...">
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
                    
                    @if(Auth::user()->hasRole('Admin'))

                    <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                <span class="nav-link-text">{{ __('Calendar') }}</span>
                            </a>
                        </li>
                    
                        <li class="nav-item {{ $elementName == 'charts' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','charts') }}">
                                <i class="ni ni-chart-pie-35 text-primary"></i>
                                <span class="nav-link-text">{{ __('Charts') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="fa fa-cogs text-primary"></i>
                                <span class="nav-link-text">{{ __('System Management') }}</span>
                            </a>
                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }}">
                                        <a href="{{ route('profile.edit') }}" class="nav-link">{{ __('Profile') }}</a>
                                    </li>
                                    <li class="nav-item  {{ $elementName == 'role-management' ? 'active' : '' }}">
                                        <a href="{{ route('role.index') }}" class="nav-link">{{ __('Role Management') }}</a>
                                    </li>
                                    {{-- <li class="nav-item  {{ $elementName == 'permission-management' ? 'active' : '' }}">
                                        <a href="{{ route('permission.index') }}" class="nav-link">{{ __('Permission Management') }}</a>
                                    </li> --}}
                                    <li class="nav-item {{ $elementName == 'user-management' ? 'active' : '' }}">
                                        <a href="{{ route('user.index') }}" class="nav-link">{{ __('User Management') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ $elementName == 'teacher' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('teacher.index') }}">
                                <i class="fa fa-users text-primary"></i>
                                <span class="nav-link-text">{{ __('Teachers') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'student' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('student.index') }}">
                                <i class="fa fa-users text-primary"></i>
                                <span class="nav-link-text">{{ __('Students') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'semester' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('semester.index') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">{{ __('Semester') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'subject' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('subject.index') }}">
                                <i class="fa fa-book text-primary"></i>
                                <span class="nav-link-text">{{ __('Subjects') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'study_class' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('study_class.index') }}">
                                <i class="fa fa-home text-primary"></i>
                                <span class="nav-link-text">{{ __('Study Classes') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'department' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('department.index') }}">
                                <i class="fa fa-building text-primary"></i>
                                <span class="nav-link-text">{{ __('Departments') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'material' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('material.index') }}">
                                <i class="fa fa-download text-primary"></i>
                                <span class="nav-link-text">{{ __('Materials') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'assignment' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('assignment.index') }}">
                                <i class="fa fa-upload text-primary"></i>
                                <span class="nav-link-text">{{ __('Assignments') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'content' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('content.index') }}">
                                <i class="fa fa-file text-primary"></i>
                                <span class="nav-link-text">{{ __('Contents') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'log' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('log.index') }}">
                                <i class="fa fa-history text-primary"></i>
                                <span class="nav-link-text">{{ __('User Logs') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'activity_log' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('activity_log.index') }}">
                                <i class="fa fa-tasks text-primary"></i>
                                <span class="nav-link-text">{{ __('Activity Logs') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'school_year' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('school_year.index') }}">
                                <i class="fa fa-school text-primary"></i>
                                <span class="nav-link-text">{{ __('School Year') }}</span>
                            </a>
                        </li>
                    @elseif(Auth::user()->hasRole('Teacher'))
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-school text-primary"></i>
                                <span class="nav-link-text">{{ __('My Classes') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-bell text-primary"></i>
                                <span class="nav-link-text">{{ __('Notifications') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-envelope text-primary"></i>
                                <span class="nav-link-text">{{ __('Messages') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-suitcase text-primary"></i>
                                <span class="nav-link-text">{{ __('Backpack') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-download text-primary"></i>
                                <span class="nav-link-text">{{ __('Downloadable Materials') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-bullhorn text-primary"></i>
                                <span class="nav-link-text">{{ __('Announcements') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-tasks text-primary"></i>
                                <span class="nav-link-text">{{ __('Assignments') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-question text-primary"></i>
                                <span class="nav-link-text">{{ __('Quiz') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('page.index','calendar') }}">
                                <i class="fa fa-share-alt text-primary"></i>
                                <span class="nav-link-text">{{ __('Shared Files') }}</span>
                            </a>
                        </li>
                    @elseif(Auth::user()->hasRole('Student'))
                    <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fa-users text-primary"></i>
                            <span class="nav-link-text">{{ __('My Class') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'notification' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('page.index','calendar') }}">
                            <i class="fa fa-bell text-primary"></i>
                            <span class="nav-link-text">{{ __('Notification') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'Message' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.message') }}">
                            <i class="fa fa-envelope text-primary"></i>
                            <span class="nav-link-text">{{ __('Message') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'backpack' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('page.index','calendar') }}">
                            <i class="fa fa-shopping-bag text-primary"></i>
                            <span class="nav-link-text">{{ __('Backpack') }}</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
