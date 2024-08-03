<div class="form-group">
    <label class="input-label font-weight-500"><?php echo e(trans('site.captcha')); ?></label>
    <div class="row align-items-center">
        <div class="col">
            <input type="text" name="captcha" class="form-control <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['captcha'];
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
        <div class="col d-flex align-items-center">
            <img id="captchaImageComment" class="captcha-image" src="">

            <button type="button" id="refreshCaptcha" class="btn-transparent ml-15">
                <i data-feather="refresh-ccw" width="24" height="24" class=""></i>
            </button>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/includes/captcha_input.blade.php ENDPATH**/ ?>