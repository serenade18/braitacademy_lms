<div id="askNewQuestionModal" class="d-none">
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('update.new_question')); ?></h2>

        <form action="<?php echo e($course->getForumPageUrl()); ?>/store" class="mt-20">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                <input type="text" name="title" class="form-control" value=""/>
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                <textarea name="description" rows="5" class="form-control"></textarea>
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('update.attach_a_file')); ?> (<?php echo e(trans('public.optional')); ?>)</label>

                <div class="input-group mr-10">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="questionAttachmentInput_record" data-preview="holder">
                            <i data-feather="upload" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input type="text" name="attach" id="questionAttachmentInput_record" value="" class="form-control" placeholder=""/>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <button type="button" class="js-save-question btn btn-sm btn-primary"><?php echo e(trans('admin/main.post')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/course/learningPage/components/forum/ask_question_modal.blade.php ENDPATH**/ ?>