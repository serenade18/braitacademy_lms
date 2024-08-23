

<div class="tab-pane mt-3 fade " id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationPackagesInstructorsName); ?>">

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[status]" value="0">
                        <input type="checkbox" name="value[status]" id="instructorsStatusSwitch" value="1" <?php echo e((!empty($instructorsSettings) and !empty($instructorsSettings['status']) and $instructorsSettings['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="instructorsStatusSwitch"><?php echo e(trans('update.registration_packages_instructors_status')); ?></label>
                    </label>
                    <div class="text-muted text-small"><?php echo e(trans('update.registration_packages_instructors_status_hint')); ?></div>
                </div>
                <h2 class="section-title"><?php echo e(trans('update.instructor_default_values')); ?></h2>

                <?php $__currentLoopData = ['courses_capacity','courses_count','meeting_count','product_count']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $str): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label><?php echo e(trans('update.'.$str)); ?></label>
                        <input type="text" class="form-control" name="value[<?php echo e($str); ?>]" value="<?php echo e((!empty($instructorsSettings) and isset($instructorsSettings[$str])) ? $instructorsSettings[$str] : ''); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.saas_package_condition_hint')); ?></div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\registration_packages\settings\instructors.blade.php ENDPATH**/ ?>