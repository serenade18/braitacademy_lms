<div class="row">
    <div class="col-12 col-md-8">

        <div class="mb-20">
            <div class="form-group mt-30 mb-0 d-flex align-items-center">
                <label class="" for="verificationSwitch"><?php echo e(trans('update.verification')); ?></label>
                <div class="custom-control custom-switch ml-3">
                    <input type="checkbox" name="verification" class="custom-control-input" id="verificationSwitch" <?php echo e((!empty($installment) && $installment->verification) ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="verificationSwitch"></label>
                </div>
            </div>
            <p class="text-muted font-12"><?php echo e(trans('update.installment_verification_hint')); ?></p>
        </div>

        <div class="js-verification-fields <?php echo e((!empty($installment) && $installment->verification) ? '' : 'd-none'); ?>">

            <div class="form-group ">
                <label class="control-label"><?php echo e(trans('update.verification_description')); ?></label>
                <textarea name="verification_description" class="summernote form-control text-left  <?php $__errorArgs = ['verification_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-height="180"><?php echo e((!empty($installment)) ? $installment->verification_description :''); ?></textarea>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.installment_verification_description_hint')); ?></div>
                <div class="invalid-feedback"><?php $__errorArgs = ['verification_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
            </div>
            
            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('update.verification_banner')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="verification_banner" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="verification_banner" id="verification_banner" value="<?php echo e(!empty($installment) ? $installment->verification_banner : old('verification_banner')); ?>" class="form-control <?php $__errorArgs = ['verification_banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text admin-file-view" data-input="verification_banner">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    
                    <?php $__errorArgs = ['verification_banner'];
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
                    <p class="text-muted font-12"><?php echo e(trans('update.installment_verification_banner_hint')); ?></p>
                </div>
            </div>

            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('update.verification_video')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="verification_video" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="verification_video" id="verification_video" value="<?php echo e(!empty($installment) ? $installment->verification_video : old('verification_video')); ?>" class="form-control <?php $__errorArgs = ['verification_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text admin-file-view" data-input="verification_video">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    
                    <?php $__errorArgs = ['verification_video'];
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
                    <p class="text-muted font-12"><?php echo e(trans('update.installment_verification_video_hint')); ?></p>
                </div>
            </div>

        </div>

        <div class="mb-20">
            <div class="form-group mt-30 mb-0 d-flex align-items-center">
                <label class="" for="request_uploadsSwitch"><?php echo e(trans('update.request_uploads')); ?></label>
                <div class="custom-control custom-switch ml-3">
                    <input type="checkbox" name="request_uploads" class="custom-control-input" id="request_uploadsSwitch" <?php echo e((!empty($installment) && $installment->request_uploads) ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="request_uploadsSwitch"></label>
                </div>
            </div>
            <p class="text-muted font-12"><?php echo e(trans('update.installment_request_uploads_hint')); ?></p>
        </div>

        <div class="mb-20">
            <div class="form-group mt-30 mb-0 d-flex align-items-center">
                <label class="" for="bypassSwitch"><?php echo e(trans('update.bypass_verification_for_verified_users')); ?></label>
                <div class="custom-control custom-switch ml-3">
                    <input type="checkbox" name="bypass_verification_for_verified_users" class="custom-control-input" id="bypassSwitch" <?php echo e((!empty($installment) && $installment->bypass_verification_for_verified_users) ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="bypassSwitch"></label>
                </div>
            </div>
            <p class="text-muted font-12"><?php echo e(trans('update.installment_bypass_verification_for_verified_users_hint')); ?></p>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\create\includes\verification.blade.php ENDPATH**/ ?>