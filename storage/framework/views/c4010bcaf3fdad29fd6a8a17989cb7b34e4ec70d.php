<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
<?php $__env->stopPush(); ?>

<div class=" mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="theme_fonts">
                <input type="hidden" name="page" value="personalization">


                <?php $__currentLoopData = ['main','rtl']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fontType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-2">
                        <strong class="font-16 mb-2 text-dark d-block"><?php echo e(trans('update.'.$fontType.'_font')); ?></strong>

                        <div class="pl-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.regular')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text admin-file-manager" data-input="<?php echo e($fontType); ?>FontRegular" data-preview="holder">
                                            <i class="fa fa-chevron-up"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="value[<?php echo e($fontType); ?>][regular]" id="<?php echo e($fontType); ?>FontRegular" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$fontType]) and !empty($itemValue[$fontType]['regular'])) ? $itemValue[$fontType]['regular'] : ''); ?>" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.bold')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text admin-file-manager" data-input="<?php echo e($fontType); ?>FontBold" data-preview="holder">
                                            <i class="fa fa-chevron-up"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="value[<?php echo e($fontType); ?>][bold]" id="<?php echo e($fontType); ?>FontBold" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$fontType]) and !empty($itemValue[$fontType]['bold'])) ? $itemValue[$fontType]['bold'] : ''); ?>" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.medium')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text admin-file-manager" data-input="<?php echo e($fontType); ?>FontMedium" data-preview="holder">
                                            <i class="fa fa-chevron-up"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="value[<?php echo e($fontType); ?>][medium]" id="<?php echo e($fontType); ?>FontMedium" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$fontType]) and !empty($itemValue[$fontType]['medium'])) ? $itemValue[$fontType]['medium'] : ''); ?>" class="form-control"/>
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
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\theme_fonts.blade.php ENDPATH**/ ?>