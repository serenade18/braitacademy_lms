
<div class="tab-pane mt-3 fade active show " id="general" role="tabpanel" aria-labelledby="general-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationPackagesGeneralName); ?>">

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[status]" value="0">
                        <input type="checkbox" name="value[status]" id="generalStatusSwitch" value="1" <?php echo e((!empty($pageGeneralSettings) and !empty($pageGeneralSettings['status']) and $pageGeneralSettings['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="generalStatusSwitch"><?php echo e(trans('update.registration_packages_general_status')); ?></label>
                    </label>
                    <div class="text-muted text-small"><?php echo e(trans('update.registration_packages_general_status_hint')); ?></div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[show_packages_during_registration]" value="0">
                        <input type="checkbox" name="value[show_packages_during_registration]" id="showPackagesDuringRegistrationSwitch" value="1" <?php echo e((!empty($pageGeneralSettings) and !empty($pageGeneralSettings['show_packages_during_registration']) and $pageGeneralSettings['show_packages_during_registration']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="showPackagesDuringRegistrationSwitch"><?php echo e(trans('update.show_packages_during_registration')); ?></label>
                    </label>
                    <div class="text-muted text-small"><?php echo e(trans('update.show_packages_during_registration_hint')); ?></div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[force_user_to_select_a_package]" value="0">
                        <input type="checkbox" name="value[force_user_to_select_a_package]" id="forceUserSelectPackageSwitch" value="1" <?php echo e((!empty($pageGeneralSettings) and !empty($pageGeneralSettings['force_user_to_select_a_package']) and $pageGeneralSettings['force_user_to_select_a_package']) ? 'checked="checked"' : ''); ?> <?php echo e((empty($pageGeneralSettings) or empty($pageGeneralSettings['show_packages_during_registration']) or !$pageGeneralSettings['show_packages_during_registration']) ? 'disabled' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="forceUserSelectPackageSwitch"><?php echo e(trans('update.force_user_to_select_a_package')); ?></label>
                    </label>
                    <div class="text-muted text-small"><?php echo e(trans('update.force_user_to_select_a_package_hint')); ?></div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[enable_home_section]" value="0">
                        <input type="checkbox" name="value[enable_home_section]" id="enableHomeSectionSwitch" value="1" <?php echo e((!empty($pageGeneralSettings) and !empty($pageGeneralSettings['enable_home_section']) and $pageGeneralSettings['enable_home_section']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="enableHomeSectionSwitch"><?php echo e(trans('update.enable_home_section')); ?></label>
                    </label>
                    <div class="text-muted text-small"><?php echo e(trans('update.enable_home_section_hint')); ?></div>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\registration_packages\settings\general.blade.php ENDPATH**/ ?>