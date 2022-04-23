<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.headers.auth'); ?>
        <?php $__env->startComponent('layouts.headers.breadcrumbs'); ?>
            <?php $__env->slot('title'); ?>
                <?php echo e(__('Mail Setting')); ?>

            <?php $__env->endSlot(); ?>

            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Mail Setting')); ?></li>
        <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><?php echo e(__('Mail Setting Management')); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('mail_setting.update', $mail_setting->id)); ?>" autocomplete="off"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>


                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Mail Setting information')); ?></h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('mail_mailer') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_mailer"><?php echo e(__('Mail Mailer')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="mail_mailer" id="input-mail_mailer" class="form-control<?php echo e($errors->has('mail_mailer') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_mailer')); ?>" value="<?php echo e($mail_setting->mail_mailer); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_mailer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_host') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_host"><?php echo e(__('Mail host')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="mail_host" id="input-mail_host" class="form-control<?php echo e($errors->has('mail_host') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_host')); ?>" value="<?php echo e($mail_setting->mail_host); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_host'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_port') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_port"><?php echo e(__('Mail Port')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="mail_port" id="input-mail_port" class="form-control<?php echo e($errors->has('mail_port') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_port')); ?>" value="<?php echo e($mail_setting->mail_port); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_port'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_username') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_username"><?php echo e(__('Mail User Name')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="mail_username" id="input-mail_username" class="form-control<?php echo e($errors->has('mail_username') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_username')); ?>" value="<?php echo e($mail_setting->mail_username); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_username'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_password') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_password"><?php echo e(__('Mail Password')); ?> <span style="color: red">*</span></label>
                                    <input type="text" name="mail_password" id="input-mail_password" class="form-control<?php echo e($errors->has('mail_password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_password')); ?>" value="<?php echo e($mail_setting->mail_password); ?>" required autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_encryption') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_encryption"><?php echo e(__('Mail Encryption')); ?></label>
                                    <input type="text" name="mail_encryption" id="input-mail_encryption" class="form-control<?php echo e($errors->has('mail_encryption') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_encryption')); ?>" value="<?php echo e($mail_setting->mail_encryption); ?>" autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_encryption'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_from_address') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_from_address"><?php echo e(__('Mail From Address')); ?></label>
                                    <input type="text" name="mail_from_address" id="input-mail_from_address" class="form-control<?php echo e($errors->has('mail_from_address') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_from_address')); ?>" value="<?php echo e($mail_setting->mail_from_address); ?>" autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_from_address'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mail_from_name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-mail_from_name"><?php echo e(__('Mail From Name')); ?></label>
                                    <input type="text" name="mail_from_name" id="input-mail_from_name" class="form-control<?php echo e($errors->has('mail_from_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('mail_from_name')); ?>" value="<?php echo e($mail_setting->mail_from_name); ?>" autofocus>

                                    <?php echo $__env->make('alerts.feedback', ['field' => 'mail_from_name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary mt-4"><?php echo e(__('Save')); ?></button>
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
    'title' => __('Mail Setting Management'),
    'parentSection' => 'laravel',
    'elementName' => 'mail_setting-management'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/mail_setting/edit.blade.php ENDPATH**/ ?>