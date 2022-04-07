<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('public/admin/assets') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
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
                                <li class="nav-item {{ $elementName == 'user-management' ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}" class="nav-link">{{ __('User Management') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-users text-primary"></i>
                            <span class="nav-link-text">{{ __('Teachers') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-users text-primary"></i>
                            <span class="nav-link-text">{{ __('Students') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('semester') || request()->is('semester/create') || request()->is('semester/*/edit') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('semester.index') }}">
                            <i class="fa fa-calendar text-primary"></i>
                            <span class="nav-link-text">{{ __('Semester') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-book text-primary"></i>
                            <span class="nav-link-text">{{ __('Subjects') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-home text-primary"></i>
                            <span class="nav-link-text">{{ __('Classes') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-building text-primary"></i>
                            <span class="nav-link-text">{{ __('Departments') }}</span>
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
                            <i class="fa fa-upload text-primary"></i>
                            <span class="nav-link-text">{{ __('Uploaded Assignments') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-file text-primary"></i>
                            <span class="nav-link-text">{{ __('Contents') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-history text-primary"></i>
                            <span class="nav-link-text">{{ __('User Logs') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-tasks text-primary"></i>
                            <span class="nav-link-text">{{ __('Activity Logs') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $elementName == 'calendar' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('page.index','calendar') }}">
                            <i class="fa fa-school text-primary"></i>
                            <span class="nav-link-text">{{ __('School Year') }}</span>
                        </a>
                    </li>


                    <li class="nav-item {{ $elementName == 'forms' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="{{ $elementName == 'forms' ? 'true' : '' }}" aria-controls="navbar-forms">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">{{ __('Forms') }}</span>
                        </a>
                        <div class="collapse {{ $elementName == 'forms' ? 'show' : '' }}" id="navbar-forms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'elements' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','elements') }}" class="nav-link">{{ __('Elements') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'components' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','components') }}" class="nav-link">{{ __('Components') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'validations' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','validation') }}" class="nav-link">{{ __('Validations') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ $elementName == 'tables' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="{{ $elementName == 'tables' ? 'true' : '' }}" aria-controls="navbar-tables">
                            <i class="ni ni-align-left-2 text-default"></i>
                            <span class="nav-link-text">{{ __('Tables') }}</span>
                        </a>
                        <div class="collapse {{ $elementName == 'tables' ? 'show' : '' }}" id="navbar-tables">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'tables' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','tables') }}" class="nav-link">{{ __('Tables') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'sortable' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','sortable') }}" class="nav-link">{{ __('Sortable') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'datatables' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','datatables') }}" class="nav-link">{{ __('Datatables') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">{{ __('Documentation') }}</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/docs/getting-started/overview.html') }}" target="_blank">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Getting started</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/docs/foundation/colors.html') }}" target="_blank">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Foundation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
