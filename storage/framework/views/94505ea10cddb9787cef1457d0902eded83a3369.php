<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php
                                $basicValue = !empty($setting) ? $setting->value : null;

                                if (!empty($basicValue)) {
                                    $basicValue = json_decode($basicValue, true);
                                }
                            ?>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <form action="<?php echo e(getAdminPanelUrl('/gifts/settings')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="page" value="general">
                                        <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$giftsGeneralSettingsName); ?>">
                                        <input type="hidden" name="locale" value="<?php echo e(\App\Models\Setting::$defaultSettingsLocale); ?>">

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[status]" value="0">
                                                <input type="checkbox" name="value[status]" id="giftsStatusSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['status']) and $basicValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="giftsStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.gifts_setting_active_hint')); ?></div>
                                        </div>


                                        <div class="js-show-after-enable <?php echo e((!empty($basicValue) and !empty($basicValue['status']) and $basicValue['status']) ? '' : 'd-none'); ?>">
                                            <?php
                                                $otherSwitches = ['allow_sending_gift_for_courses', 'allow_sending_gift_for_bundles', 'allow_sending_gift_for_products'];
                                            ?>

                                            <?php $__currentLoopData = $otherSwitches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherSwitch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group custom-switches-stacked">
                                                    <label class="custom-switch pl-0 d-flex align-items-center">
                                                        <input type="hidden" name="value[<?php echo e($otherSwitch); ?>]" value="0">
                                                        <input type="checkbox" name="value[<?php echo e($otherSwitch); ?>]" id="<?php echo e($otherSwitch); ?>Switch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue[$otherSwitch]) and $basicValue[$otherSwitch]) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                        <span class="custom-switch-indicator"></span>
                                                        <label class="custom-switch-description mb-0 cursor-pointer" for="<?php echo e($otherSwitch); ?>Switch"><?php echo e(trans("update.{$otherSwitch}")); ?></label>
                                                    </label>
                                                    <div class="text-muted text-small"><?php echo e(trans("update.{$otherSwitch}_hint")); ?></div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                        <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/settings/gifts_settings.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\gifts\settings.blade.php ENDPATH**/ ?>