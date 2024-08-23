<?php $__env->startSection('content'); ?>
    <?php
        $siteGeneralSettings = getGeneralSettings();
    ?>

    <div class="p-4 m-3">
        <img src="<?php echo e($siteGeneralSettings['logo'] ?? ''); ?>" alt="logo" width="40%" class="mb-5 mt-2">

        <h4><?php echo e(trans('auth.forget_password')); ?></h4>

        <p class="text-muted"><?php echo e(trans('update.we_will_send_a_link_to_reset_your_password')); ?></p>

        <form method="POST" action="<?php echo e(getAdminPanelUrl()); ?>/forget-password">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="email"><?php echo e(trans('auth.email')); ?></label>
                <input id="email" type="email" value="<?php echo e(old('email')); ?>" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       name="email" tabindex="1"
                       required autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <?php if(!empty(getGeneralSecuritySettings('captcha_for_admin_forgot_pass'))): ?>
                <?php echo $__env->make('admin.includes.captcha_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary btn-block mt-20"><?php echo e(trans('auth.reset_password')); ?></button>
        </form>

        <div class="text-center mt-3">
            <span class=" d-inline-flex align-items-center justify-content-center">or</span>
        </div>

        <div class="text-center mt-20">
            <span class="text-secondary">
                <a href="<?php echo e(getAdminPanelUrl()); ?>/login" class="font-weight-bold"><?php echo e(trans('auth.login')); ?></a>
            </span>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\auth\forgot_password.blade.php ENDPATH**/ ?>