<div class="row">
    <div class="col-12 col-md-5">

        <div class="form-group d-flex align-items-center mt-20">
            <label class="" for="enable_tank_you_messageSwitch"><?php echo e(trans('update.enable_tank_you_message')); ?></label>
            <div class="custom-control custom-switch ml-3">
                <input type="checkbox" name="enable_tank_you_message" class="custom-control-input" id="enable_tank_you_messageSwitch" <?php echo e((!empty($form) and $form->enable_tank_you_message) ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="enable_tank_you_messageSwitch"></label>
            </div>
        </div>

        <div class="js-enable-tank-you-message-fields <?php echo e(((!empty($form) and $form->enable_tank_you_message) or !empty(old('enable_tank_you_message'))) ? '' : 'd-none'); ?>">

            <div class="form-group ">
                <label class="input-label"><?php echo e(trans('update.tank_you_message_title')); ?></label>
                <input type="text" name="tank_you_message_title" value="<?php echo e(!empty($form) ? $form->tank_you_message_title : old('tank_you_message_title')); ?>" class="form-control <?php $__errorArgs = ['tank_you_message_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['tank_you_message_title'];
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

            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('update.tank_you_message_description')); ?></label>
                <textarea name="tank_you_message_description" rows="5" class="form-control <?php $__errorArgs = ['tank_you_message_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" ><?php echo !empty($form) ? $form->tank_you_message_description : old('tank_you_message_description'); ?></textarea>
                <?php $__errorArgs = ['tank_you_message_description'];
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


            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('update.tank_you_message_image')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="tank_you_message_image" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="tank_you_message_image" id="tank_you_message_image" value="<?php echo e(!empty($form) ? $form->tank_you_message_image : old('tank_you_message_image')); ?>" class="form-control <?php $__errorArgs = ['tank_you_message_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text admin-file-view" data-input="tank_you_message_image">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['tank_you_message_image'];
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
            </div>

        </div>

    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/forms/create/includes/tank_you_message.blade.php ENDPATH**/ ?>