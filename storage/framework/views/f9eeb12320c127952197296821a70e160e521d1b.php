<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<div class="tab-pane mt-3 fade" id="general_options" role="tabpanel" aria-labelledby="general_options-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/general_options" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="general">
                <input type="hidden" name="general_options" value="general_options">

                <div class="mb-5">
                    <h5><?php echo e(trans('update.direct_publication_options')); ?></h5>

                    <?php
                        $directPublicationOptions = ['direct_publication_of_courses', 'direct_publication_of_bundles', 'direct_publication_of_comments', 'direct_publication_of_reviews', 'direct_publication_of_blog'];
                    ?>

                    <?php $__currentLoopData = $directPublicationOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directPublicationOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group mt-3 custom-switches-stacked">
                            <label class="custom-switch pl-0">
                                <input type="hidden" name="value[<?php echo e($directPublicationOption); ?>]" value="0">
                                <input type="checkbox" name="value[<?php echo e($directPublicationOption); ?>]" id="<?php echo e($directPublicationOption); ?>Switch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue[$directPublicationOption]) and $itemValue[$directPublicationOption]) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="<?php echo e($directPublicationOption); ?>Switch"><?php echo e(trans("update.{$directPublicationOption}")); ?></label>
                            </label>
                            <p class="font-12 text-gray mb-0"><?php echo e(trans("update.{$directPublicationOption}_hint")); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.delete_contents')); ?></h5>


                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[allow_instructor_delete_content]" value="">
                            <input type="checkbox" name="value[allow_instructor_delete_content]" id="allow_instructor_delete_contentSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['allow_instructor_delete_content']) and $itemValue['allow_instructor_delete_content']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="allow_instructor_delete_contentSwitch"><?php echo e(trans("update.allow_instructor_delete_content")); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans("update.allow_instructor_delete_content_hint")); ?></p>
                    </div>

                    <div class="js-content-delete-method-field form-group <?php echo e((!empty($itemValue) and !empty($itemValue['allow_instructor_delete_content'])) ? '' : 'd-none'); ?>">
                        <label><?php echo e(trans('update.content_delete_method')); ?></label>

                        <select class="form-control" name="value[content_delete_method]">
                            <?php $__currentLoopData = ['delete_directly', 'delete_with_admin_approval']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentDeleteMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($contentDeleteMethod); ?>" <?php echo e((!empty($itemValue) and !empty($itemValue['content_delete_method']) and $itemValue['content_delete_method'] == $contentDeleteMethod) ? 'selected' : ''); ?>><?php echo e(trans("update.{$contentDeleteMethod}")); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.verification_process')); ?></h5>


                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[disable_registration_verification_process]" value="">
                            <input type="checkbox" name="value[disable_registration_verification_process]" id="disable_registration_verification_processSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['disable_registration_verification_process']) and $itemValue['disable_registration_verification_process']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="disable_registration_verification_processSwitch"><?php echo e(trans("update.disable_registration_verification_process")); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans("update.disable_registration_verification_process_hint")); ?></p>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/general/options.blade.php ENDPATH**/ ?>