<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }

?>

<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<div class="mt-3" id="others_personalization">

    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/others_personalization" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="page" value="personalization">
        <input type="hidden" name="others_personalization" value="others_personalization">



        <div class="row">
            <div class="col-12 col-md-6">
                <h5 class="text-dark font-20"><?php echo e(trans('update.guarantee')); ?></h5>

                <div class="form-group custom-switches-stacked mb-0 mt-2">
                    <label class="custom-switch pl-0">
                        <input type="hidden" name="value[show_guarantee_text]" value="0">
                        <input type="checkbox" name="value[show_guarantee_text]" id="showGuaranteeTextSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['show_guarantee_text']) and $itemValue['show_guarantee_text']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="showGuaranteeTextSwitch"><?php echo e(trans('admin/main.show')); ?></label>
                    </label>
                </div>

                <h5 class="text-dark font-20 mt-5"><?php echo e(trans('update.avatar_settings')); ?></h5>

                <div class="form-group">
                    <label><?php echo e(trans('update.user_avatar_style')); ?></label>
                    <select name="value[user_avatar_style]" class="js-user-avatar-style-select form-control">
                        <option value="default_avatar" <?php echo e((!empty($itemValue) and !empty($itemValue['user_avatar_style']) and $itemValue['user_avatar_style'] == 'default_avatar') ? 'selected' : ''); ?>><?php echo e(trans('update.default_avatar')); ?></option>
                        <option value="ui_avatar" <?php echo e((!empty($itemValue) and !empty($itemValue['user_avatar_style']) and $itemValue['user_avatar_style'] == 'ui_avatar') ? 'selected' : ''); ?>><?php echo e(trans('update.ui_avatar')); ?></option>
                    </select>
                </div>

                <div class="form-group js-default-user-avatar-field <?php echo e((empty($itemValue['user_avatar_style']) or (!empty($itemValue['user_avatar_style'])) and $itemValue['user_avatar_style'] == 'default_avatar') ? '' : 'd-none'); ?>">
                    <label class="input-label"><?php echo e(trans('admin/main.user_avatar_background')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="default_user_avatar" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[default_user_avatar]" id="default_user_avatar" value="<?php echo e((!empty($itemValue) and !empty($itemValue['default_user_avatar'])) ? $itemValue['default_user_avatar'] : ''); ?>" class="form-control"/>
                    </div>
                </div>


                <h5 class="text-dark font-20 mt-5"><?php echo e(trans('update.platform_phone_and_email_position')); ?></h5>

                <div class="form-group">
                    <label><?php echo e(trans('update.select_position')); ?></label>
                    <select name="value[platform_phone_and_email_position]" class="form-control">
                        <option value="header" <?php echo e((!empty($itemValue) and !empty($itemValue['platform_phone_and_email_position']) and $itemValue['platform_phone_and_email_position'] == 'header') ? 'selected' : ''); ?>><?php echo e(trans('update.header')); ?></option>
                        <option value="footer" <?php echo e((!empty($itemValue) and !empty($itemValue['platform_phone_and_email_position']) and $itemValue['platform_phone_and_email_position'] == 'footer') ? 'selected' : ''); ?>><?php echo e(trans('update.footer')); ?></option>
                    </select>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
    </form>

</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/settings/others_personalization.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\others_personalization.blade.php ENDPATH**/ ?>