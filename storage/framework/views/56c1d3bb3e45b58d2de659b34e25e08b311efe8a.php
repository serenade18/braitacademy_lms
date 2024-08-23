<?php $__env->startSection('content'); ?>
    <?php
        $siteGeneralSettings = getGeneralSettings();
    ?>

    <div class="p-4 m-3">
        <img src="<?php echo e($siteGeneralSettings['logo'] ?? ''); ?>" alt="logo" width="40%" class="mb-5 mt-2">

        <h4 class="text-dark font-weight-normal"><?php echo e(trans('admin/main.welcome')); ?> <span class="font-weight-bold"><?php echo e($siteGeneralSettings['site_name'] ?? ''); ?></span></h4>

        <p class="text-muted"><?php echo e(trans('auth.admin_tagline')); ?></p>

        <form method="POST" action="<?php echo e(getAdminPanelUrl()); ?>/login" class="needs-validation" novalidate="">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label"><?php echo e(trans('auth.password')); ?></label>
                </div>
                <input id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       name="password" tabindex="2" required>
                <?php $__errorArgs = ['password'];
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

            <?php if(!empty(getGeneralSecuritySettings('captcha_for_admin_login'))): ?>
                <?php echo $__env->make('admin.includes.captcha_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                           id="remember-me">
                    <label class="custom-control-label"
                           for="remember-me"><?php echo e(trans('auth.remember_me')); ?></label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    <?php echo e(trans('auth.login')); ?>

                </button>
            </div>
        </form>

        <a href="<?php echo e(getAdminPanelUrl()); ?>/forget-password" class=""><?php echo e(trans('auth.forget_your_password')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>