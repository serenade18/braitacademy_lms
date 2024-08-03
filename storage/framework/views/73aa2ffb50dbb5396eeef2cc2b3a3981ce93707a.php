<div id="changeChapterModalHtml" class="d-none">
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('update.change_chapter')); ?></h2>

        <div class="js-content-form change-chapter-form mt-20" data-action="<?php echo e(getAdminPanelUrl("/chapters/change")); ?>">

            <input type="hidden" name="ajax[webinar_id]" class="" value="<?php echo e($webinar->id); ?>">
            <input type="hidden" name="ajax[item_id]" class="js-item-id" value="">
            <input type="hidden" name="ajax[item_type]" class="js-item-type" value="">

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.chapter')); ?></label>

                <select name="ajax[chapter_id]" class="js-ajax-chapter_id custom-select">
                    <option value=""><?php echo e(trans('update.select_chapter')); ?></option>

                    <?php if(!empty($webinar->chapters) and count($webinar->chapters)): ?>
                        <?php $__currentLoopData = $webinar->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($chapter->id); ?>"><?php echo e($chapter->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <button type="button" class="save-change-chapter btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/webinars/create_includes/change_chapter_modal.blade.php ENDPATH**/ ?>