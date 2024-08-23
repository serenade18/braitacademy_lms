<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.rewards_settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('update.rewards_settings')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <form action="<?php echo e(getAdminPanelUrl()); ?>/rewards/settings" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="page" value="general">
                                        <input type="hidden" name="name" value="rewards_settings">

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[status]" value="0">
                                                <input type="checkbox" name="value[status]" id="rewardsStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['status']) and $itemValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="rewardsStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_reward_setting_active_hint')); ?></div>
                                        </div>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[exchangeable]" value="0">
                                                <input type="checkbox" name="value[exchangeable]" id="exchangeableSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['exchangeable']) and $itemValue['exchangeable']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="exchangeableSwitch"><?php echo e(trans('update.exchangeable')); ?>                       </label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_reward_setting_exchangeable_hint')); ?></div>
                                        </div>

                                        <div id="exchangeableUnitInput" class="form-group <?php echo e(((!empty($itemValue) and !empty($itemValue['exchangeable']) and $itemValue['exchangeable']) or (!empty($errors) and $errors->has('exchangeable_unit'))) ? '' : 'd-none'); ?>">
                                            <label><?php echo e(trans('update.exchangeable_unit')); ?></label>
                                            <input type="number" name="value[exchangeable_unit]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['exchangeable_unit'])) ? $itemValue['exchangeable_unit'] : old('exchangeable_unit')); ?>" class="form-control text-center  <?php $__errorArgs = ['exchangeable_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['exchangeable_unit'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.exchangeable_unit_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.want_more_points_link')); ?></label>
                                            <input type="text" name="value[want_more_points_link]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['want_more_points_link'])) ? $itemValue['want_more_points_link'] : old('want_more_points_link')); ?>" class="form-control  <?php $__errorArgs = ['value.want_more_points_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['value.want_more_points_link'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.want_more_points_link_hint')); ?></div>
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
    <script src="/assets/default/js/admin/rewards_settings.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\rewards\settings.blade.php ENDPATH**/ ?>