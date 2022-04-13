<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('public/admin/assets')); ?>/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <!-- Collapse header -->
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(asset('public/admin/assets')); ?>/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        <span class="nav-link-inner--text"><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">
                            <span class="nav-link-inner--text"><?php echo e(__('Login')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">
                            <span class="nav-link-inner--text"><?php echo e(__('Register')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <hr class="d-lg-none" />
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="" data-original-title="Like us on Facebook">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Facebook</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Instagram">
                        <i class="fab fa-instagram"></i>
                        <span class="nav-link-inner--text d-lg-none">Instagram</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Twitter">
                        <i class="fab fa-twitter-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Twitter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="" data-original-title="Star us on Github">
                        <i class="fab fa-github"></i>
                        <span class="nav-link-inner--text d-lg-none">Github</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block ml-lg-4">
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon">
                            <i class="fas fa-shopping-cart mr-2"></i>
                        </span>
                        <span class="nav-link-inner--text">Purchase now</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\lms\resources\views/layouts/navbars/navs/guest.blade.php ENDPATH**/ ?>