<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<div class="tab-pane mt-3 fade" id="security" role="tabpanel" aria-labelledby="security-tab">

    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/security" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="page" value="general">
        <input type="hidden" name="security" value="security">

        <div class="row">
            <div class="col-12 col-md-6">

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0">
                        <input type="hidden" name="value[login_device_limit]" value="0">
                        <input type="checkbox" name="value[login_device_limit]" id="loginDeviceLimit" value="1"
                               <?php echo e((!empty($itemValue) and !empty($itemValue['login_device_limit']) and $itemValue['login_device_limit']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer"
                               for="loginDeviceLimit"><?php echo e(trans('update.device_limit')); ?></label>
                    </label>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.device_limit_hint')); ?></div>
                </div>

                <div class="js-device-limit-number <?php echo e((!empty($itemValue) and !empty($itemValue['login_device_limit']) and $itemValue['login_device_limit']) ? '' : 'd-none'); ?>">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.number_of_allowed_devices')); ?></label>
                        <input type="number" name="value[number_of_allowed_devices]" id="number_of_allowed_devices"
                               value="<?php echo e((!empty($itemValue) and !empty($itemValue['number_of_allowed_devices'])) ? $itemValue['number_of_allowed_devices'] : 1); ?>"
                               class="form-control"/>
                        <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.number_of_allowed_devices_hint')); ?></p>
                    </div>


                    <?php echo $__env->make('admin.includes.delete_button',[
                        'url' => getAdminPanelUrl("/settings/reset-users-login-count"),
                        'noBtnTransparent' => true,
                        'btnClass' => 'btn btn-danger text-white',
                        'btnText' => trans('update.reset_users_login_count'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

                <h5 class="mt-5"><?php echo e(trans('update.captcha_settings')); ?></h5>
                <?php
                    $captchaSwitchs = ['captcha_for_admin_login', 'captcha_for_admin_forgot_pass', 'captcha_for_login', 'captcha_for_register', 'captcha_for_forgot_pass']
                ?>

                <?php $__currentLoopData = $captchaSwitchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $captchaSwitch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0 mb-0">
                            <input type="hidden" name="value[<?php echo e($captchaSwitch); ?>]" value="0">
                            <input type="checkbox" name="value[<?php echo e($captchaSwitch); ?>]"
                                   id="captchaSwitch<?php echo e($captchaSwitch); ?>" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue[$captchaSwitch]) and $itemValue[$captchaSwitch]) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer"
                                   for="captchaSwitch<?php echo e($captchaSwitch); ?>"><?php echo e(trans('update.'.$captchaSwitch)); ?></label>
                        </label>
                        <div class="text-muted text-small"><?php echo e(trans('update.'.$captchaSwitch.'_hint')); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <h5 class="mt-5"><?php echo e(trans('update.admin_panel_url')); ?></h5>

                <div class="form-group mt-2">
                    <label class="input-label"><?php echo e(trans('admin/main.url')); ?></label>
                    <input type="text" name="value[admin_panel_url]" id="admin_panel_url"
                           value="<?php echo e((!empty($itemValue) and !empty($itemValue['admin_panel_url'])) ? $itemValue['admin_panel_url'] : 'admin'); ?>"
                           class="form-control" required/>
                    <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.admin_panel_url_hint')); ?></p>
                </div>


            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
    </form>

</div>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/general/security.blade.php ENDPATH**/ ?>