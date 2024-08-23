<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php
    $values = !empty($setting) ? $setting->value : null;

    if (!empty($values)) {
        $values = json_decode($values, true);
    }
?>


<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('update.settings')); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="<?php echo e(getAdminPanelUrl('/settings/main')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="page" value="general">
                                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$abandonedCartSettingsName); ?>">
                                <input type="hidden" name="locale" value="<?php echo e(\App\Models\Setting::$defaultSettingsLocale); ?>">

                                <?php
                                    $switches = ['status', 'reset_cart_items']
                                ?>

                                <?php $__currentLoopData = $switches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group custom-switches-stacked">
                                        <label class="custom-switch pl-0 d-flex align-items-center">
                                            <input type="hidden" name="value[<?php echo e($switch); ?>]" value="0">
                                            <input type="checkbox" name="value[<?php echo e($switch); ?>]" id="<?php echo e($switch); ?>Switch" value="1" <?php echo e((!empty($values) and !empty($values[$switch]) and $values[$switch]) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                            <span class="custom-switch-indicator"></span>
                                            <label class="custom-switch-description mb-0 cursor-pointer" for="<?php echo e($switch); ?>Switch"><?php echo e(($switch == 'status') ? trans('admin/main.active') : trans("update.{$switch}")); ?></label>
                                        </label>
                                        <div class="text-muted text-small"><?php echo e(trans("update.abandoned_cart_setting_{$switch}_hint")); ?></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="js-reset-hours-field form-group <?php echo e((!empty($values) and !empty($values['reset_cart_items']) and $values['reset_cart_items']) ? '' : 'd-none'); ?>">
                                    <label class="control-label"><?php echo e(trans('update.reset_hours')); ?></label>
                                    <input type="number" name="value[reset_hours]" class="form-control" value="<?php echo e((!empty($values) and !empty($values['reset_hours'])) ? $values['reset_hours'] : ''); ?>" min="0">
                                    <div class="text-muted text-small"><?php echo e(trans("update.abandoned_cart_setting_reset_hours_hint")); ?></div>
                                </div>


                                <div class="form-group ">
                                    <label class="control-label"><?php echo trans('update.default_cart_reminder'); ?></label>
                                    <select name="value[default_cart_reminder]" class=" form-control select2">
                                        <option value=""><?php echo e(trans('update.select_default_cart_reminder')); ?></option>

                                        <?php $__currentLoopData = $notificationTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificationTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($notificationTemplate->id); ?>" <?php echo e((!empty($values) and !empty(!empty($values['default_cart_reminder'])) and $values['default_cart_reminder'] == $notificationTemplate->id) ? 'selected' : ''); ?>><?php echo e($notificationTemplate->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_reminder_template_hint')); ?></div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label"><?php echo trans('update.default_cart_coupon_template'); ?></label>
                                    <select name="value[default_cart_coupon_template]" class=" form-control select2">
                                        <option value=""><?php echo e(trans('update.select_default_cart_coupon_template')); ?></option>

                                        <?php $__currentLoopData = $notificationTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificationTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($notificationTemplate->id); ?>" <?php echo e((!empty($values) and !empty(!empty($values['default_cart_coupon_template'])) and $values['default_cart_coupon_template'] == $notificationTemplate->id) ? 'selected' : ''); ?>><?php echo e($notificationTemplate->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.abandoned_cart_coupon_template_hint')); ?></div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/abandoned_cart_settings.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\settings\index.blade.php ENDPATH**/ ?>