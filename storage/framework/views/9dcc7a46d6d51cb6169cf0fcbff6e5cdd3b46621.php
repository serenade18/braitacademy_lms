<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
<?php $__env->stopPush(); ?>

<div class=" mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <h5 class="d-block mt-1 mb-3 text-dark"><?php echo e(trans("update.front_template")); ?></h5>
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="theme_colors">
                <input type="hidden" name="page" value="personalization">

                <?php $__currentLoopData = \App\Models\Setting::$rootColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strpos($color,'shadow')): ?>
                        <div class="form-group">
                            <label><?php echo e(trans('update.theme_color_'.$color)); ?></label>
                            <input type="text" name="value[<?php echo e($color); ?>]" class="form-control" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$color])) ? $itemValue[$color] : ''); ?>">
                            <p class="font-12 mb-0"><?php echo e(trans("update.theme_color_{$color}_hint")); ?></p>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label><?php echo e(trans('update.theme_color_'.$color)); ?></label>
                            <div class="input-group colorpickerinput">
                                <input type="text" name="value[<?php echo e($color); ?>]" class="form-control" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$color])) ? $itemValue[$color] : ''); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-fill-drip"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="font-12 mb-0"><?php echo e(trans("update.theme_color_{$color}_hint")); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="form-group">
                    <label><?php echo e(trans('update.front_body_background')); ?></label>
                    <div class="input-group colorpickerinput">
                        <input type="text" name="value[front_body_background]" class="form-control" value="<?php echo e((!empty($itemValue) and !empty($itemValue['front_body_background'])) ? $itemValue['front_body_background'] : ''); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-fill-drip"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="d-block mt-4 text-dark"><?php echo e(trans("update.admin_template")); ?></h5>

                <?php $__currentLoopData = \App\Models\Setting::$rootAdminColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label><?php echo e(trans('update.theme_color_'.$color)); ?></label>
                        <div class="input-group colorpickerinput">
                            <input type="text" name="value[admin_<?php echo e($color); ?>]" class="form-control" value="<?php echo e((!empty($itemValue) and !empty($itemValue['admin_'.$color])) ? $itemValue['admin_'.$color] : ''); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\theme_colors.blade.php ENDPATH**/ ?>