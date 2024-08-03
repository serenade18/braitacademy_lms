<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">

        <form method="post" action="/panel/webinars/<?php echo e(!empty($webinar) ? $webinar->id .'/update' : 'store'); ?>" id="webinarForm" class="webinar-form" enctype="multipart/form-data">
            <?php echo $__env->make('web.default.panel.webinar.create_includes.progress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="current_step" value="<?php echo e(!empty($currentStep) ? $currentStep : 1); ?>">
            <input type="hidden" name="draft" value="no" id="forDraft"/>
            <input type="hidden" name="get_next" value="no" id="getNext"/>
            <input type="hidden" name="get_step" value="0" id="getStep"/>


            <?php if($currentStep == 1): ?>
                <?php echo $__env->make('web.default.panel.webinar.create_includes.step_1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php elseif(!empty($webinar)): ?>
                <?php echo $__env->make('web.default.panel.webinar.create_includes.step_'.$currentStep, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </form>


        <div class="create-webinar-footer d-flex flex-column flex-md-row align-items-center justify-content-between mt-20 pt-15 border-top">
            <div class="d-flex align-items-center">

                <?php if(!empty($webinar)): ?>
                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/step/<?php echo e(($currentStep - 1)); ?>" class="btn btn-sm btn-primary <?php echo e($currentStep < 2 ? 'disabled' : ''); ?>"><?php echo e(trans('webinars.previous')); ?></a>
                <?php else: ?>
                    <a href="" class="btn btn-sm btn-primary disabled"><?php echo e(trans('webinars.previous')); ?></a>
                <?php endif; ?>

                <button type="button" id="getNextStep" class="btn btn-sm btn-primary ml-15" <?php if($currentStep >= $stepCount): ?> disabled <?php endif; ?>><?php echo e(trans('webinars.next')); ?></button>
            </div>

            <div class="mt-20 mt-md-0">
                <button type="button" id="sendForReview" class="btn btn-sm btn-primary"><?php echo e(!empty(getGeneralOptionsSettings('direct_publication_of_courses')) ? trans('update.publish') : trans('public.send_for_review')); ?></button>

                <button type="button" id="saveAsDraft" class=" btn btn-sm btn-primary"><?php echo e(trans('public.save_as_draft')); ?></button>

                <?php if(!empty($webinar) and $webinar->creator_id == $authUser->id): ?>
                    <?php echo $__env->make('web.default.panel.includes.content_delete_btn', [
                        'deleteContentUrl' => "/panel/webinars/{$webinar->id}/delete?redirect_to=/panel/webinars",
                        'deleteContentClassName' => 'webinar-actions btn btn-danger btn-sm mt-20 mt-md-0',
                        'deleteContentItem' => $webinar,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var zoomJwtTokenInvalid = '<?php echo e(trans('webinars.zoom_jwt_token_invalid')); ?>';
        var hasZoomApiToken = '<?php echo e((!empty($authUser->zoomApi) and !empty($authUser->zoomApi->api_key) and !empty($authUser->zoomApi->api_secret)) ? 'true' : 'false'); ?>';
        var editChapterLang = '<?php echo e(trans('public.edit_chapter')); ?>';
    </script>

    <script src="/assets/default/js/panel/webinar.min.js"></script>
    <script src="/assets/default/js/panel/webinar_content_locale.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/webinar/create.blade.php ENDPATH**/ ?>