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
                                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$aiContentsSettingsName); ?>">
                                <input type="hidden" name="locale" value="<?php echo e(\App\Models\Setting::$defaultSettingsLocale); ?>">

                                <?php
                                    $switches = ['status', 'active_for_admin_panel', 'active_for_organization_panel', 'active_for_instructor_panel']
                                ?>

                                <?php $__currentLoopData = $switches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group custom-switches-stacked">
                                        <label class="custom-switch pl-0 d-flex align-items-center">
                                            <input type="hidden" name="value[<?php echo e($switch); ?>]" value="0">
                                            <input type="checkbox" name="value[<?php echo e($switch); ?>]" id="<?php echo e($switch); ?>Switch" value="1" <?php echo e((!empty($values) and !empty($values[$switch]) and $values[$switch]) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                            <span class="custom-switch-indicator"></span>
                                            <label class="custom-switch-description mb-0 cursor-pointer" for="<?php echo e($switch); ?>Switch"><?php echo e(($switch == 'status') ? trans('admin/main.active') : trans("update.{$switch}")); ?></label>
                                        </label>
                                        <div class="text-muted text-small"><?php echo e(trans("update.ai_content_setting_{$switch}_hint")); ?></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group">
                                    <label class="control-label"><?php echo e(trans('update.secret_key')); ?></label>
                                    <input type="text" name="value[secret_key]" class="form-control" value="<?php echo e((!empty($values) and !empty($values['secret_key'])) ? $values['secret_key'] : ''); ?>">
                                </div>


                                <div class="form-group custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center">
                                        <input type="hidden" name="value[activate_text_service_type]" value="0">
                                        <input type="checkbox" name="value[activate_text_service_type]" id="activate_text_service_typeSwitch" value="1" <?php echo e((!empty($values) and !empty($values['activate_text_service_type']) and $values['activate_text_service_type']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="activate_text_service_typeSwitch"><?php echo e(trans('update.activate_text_service_type')); ?></label>
                                    </label>
                                </div>

                                <div class="js-text-fields <?php echo e((!empty($values) and !empty($values['activate_text_service_type']) and $values['activate_text_service_type']) ? '' : 'd-none'); ?>">

                                    <div class="form-group ">
                                        <label class="control-label"><?php echo trans('update.text_service_type'); ?></label>
                                        <select name="value[text_service_type]" class=" form-control">
                                            <option value=""><?php echo e(trans('update.select_text_service_type')); ?></option>
                                            <?php $__currentLoopData = \App\Enums\AiTextServices::types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($typ); ?>" <?php echo e((!empty($values) and !empty(!empty($values['text_service_type'])) and $values['text_service_type'] == $typ) ? 'selected' : ''); ?>><?php echo e(trans("update.{$typ}")); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label"><?php echo trans('update.number_of_text_generated_per_request'); ?></label>
                                        <select name="value[number_of_text_generated_per_request]" class=" form-control">

                                            <?php $__currentLoopData = [1,2,3,4,5,6,7,8,9,10]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($num); ?>" <?php echo e((!empty($values) and !empty(!empty($values['number_of_text_generated_per_request'])) and $values['number_of_text_generated_per_request'] == $num) ? 'selected' : ''); ?>><?php echo e($num); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(trans('update.max_tokens')); ?></label>
                                        <input type="number" name="value[max_tokens]" class="form-control" value="<?php echo e((!empty($values) and !empty($values['max_tokens'])) ? $values['max_tokens'] : ''); ?>" >
                                    </div>

                                </div>

                                <div class="form-group custom-switches-stacked">
                                    <label class="custom-switch pl-0 d-flex align-items-center">
                                        <input type="hidden" name="value[activate_image_service_type]" value="0">
                                        <input type="checkbox" name="value[activate_image_service_type]" id="activate_image_service_typeSwitch" value="1" <?php echo e((!empty($values) and !empty($values['activate_image_service_type']) and $values['activate_image_service_type']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="activate_image_service_typeSwitch"><?php echo e(trans('update.activate_image_service_type')); ?></label>
                                    </label>
                                </div>

                                <div class="js-image-fields <?php echo e((!empty($values) and !empty($values['activate_image_service_type']) and $values['activate_image_service_type']) ? '' : 'd-none'); ?>">

                                    <div class="form-group ">
                                        <label class="control-label"><?php echo trans('update.number_of_images_generated_per_request'); ?></label>
                                        <select name="value[number_of_images_generated_per_request]" class=" form-control">

                                            <?php $__currentLoopData = [1,2,3,4,5,6,7,8,9,10]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($num); ?>" <?php echo e((!empty($values) and !empty(!empty($values['number_of_images_generated_per_request'])) and $values['number_of_images_generated_per_request'] == $num) ? 'selected' : ''); ?>><?php echo e($num); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

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
    <script src="/assets/default/js/admin/ai_content_settings.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\ai_contents\settings\index.blade.php ENDPATH**/ ?>