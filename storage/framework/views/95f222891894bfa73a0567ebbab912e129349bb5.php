<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(empty($new_user)): ?>
        <?php echo $__env->make('web.default.panel.setting.setting_includes.progress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <form method="post" id="userSettingForm" class="mt-30" action="<?php echo e((!empty($new_user)) ? '/panel/manage/'. $user_type .'/new' : '/panel/setting'); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="step" value="<?php echo e(!empty($currentStep) ? $currentStep : 1); ?>">
        <input type="hidden" name="next_step" value="0">

        <?php if(!empty($organization_id)): ?>
            <input type="hidden" name="organization_id" value="<?php echo e($organization_id); ?>">
            <input type="hidden" id="userId" name="user_id" value="<?php echo e($user->id); ?>">
        <?php endif; ?>

        <?php if(!empty($new_user) or (!empty($currentStep) and $currentStep == 1)): ?>
            <?php echo $__env->make('web.default.panel.setting.setting_includes.basic_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(empty($new_user) and !empty($currentStep)): ?>
            <?php switch($currentStep):
                case (2): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>

                <?php case (3): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>

                <?php case (4): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>

                <?php case (5): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.experiences', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>


                <?php case (6): ?>
                    <?php if(!$user->isUser()): ?>
                        <?php echo $__env->make('web.default.panel.setting.setting_includes.occupations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('web.default.panel.setting.setting_includes.identity_and_financial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php break; ?>

                <?php case (7): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.identity_and_financial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>

                <?php case (8): ?>
                    <?php echo $__env->make('web.default.panel.setting.setting_includes.settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php break; ?>

            <?php endswitch; ?>
        <?php endif; ?>
    </form>

    <div class="create-webinar-footer d-flex align-items-center justify-content-between mt-20 pt-15 border-top">
        <div class="d-flex align-items-center">
            <?php if(!empty($user) and empty($new_user)): ?>
                <?php if(!empty($currentStep) and $currentStep > 1): ?>
                    <a href="/panel/setting/step/<?php echo e(($currentStep - 1)); ?>" class="btn btn-sm btn-primary"><?php echo e(trans('webinars.previous')); ?></a>
                <?php else: ?>
                    <a href="" class="btn btn-sm btn-primary disabled"><?php echo e(trans('webinars.previous')); ?></a>
                <?php endif; ?>

                <button type="button" id="getNextStep" class="btn btn-sm btn-primary ml-15" <?php if(!empty($currentStep) and (($user->isUser() and $currentStep == 7) or (!$user->isUser() and $currentStep == 9))): ?> disabled <?php endif; ?>><?php echo e(trans('webinars.next')); ?></button>
            <?php endif; ?>
        </div>

        <div class="d-flex align-items-center">
            <?php if(empty($new_user) and empty($edit_new_user)): ?>
                <a href="/panel/setting/deleteAccount" class="delete-action btn btn-sm btn-danger" data-confirm="<?php echo e(trans('update.delete_account_modal_confirm_btn_text')); ?>" data-title="<?php echo e(trans('update.delete_account_modal_hint')); ?>"><?php echo e(trans('update.delete_account')); ?></a>
            <?php endif; ?>

            <button type="button" id="saveData" class="btn btn-sm btn-primary ml-15"><?php echo e(trans('public.save')); ?></button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/cropit/jquery.cropit.js"></script>
    <script src="/assets/default/js/parts/img_cropit.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script>
        var editEducationLang = '<?php echo e(trans('site.edit_education')); ?>';
        var editExperienceLang = '<?php echo e(trans('site.edit_experience')); ?>';
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var saveErrorLang = '<?php echo e(trans('site.store_error_try_again')); ?>';
        var notAccessToLang = '<?php echo e(trans('public.not_access_to_this_content')); ?>';
    </script>

    <script src="/assets/default/js/panel/user_setting.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/setting/index.blade.php ENDPATH**/ ?>