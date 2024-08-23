<div class="add-answer-card mt-4 <?php echo e((empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'main-answer-row' : ''); ?>">
    <button type="button" class="btn btn-sm btn-danger rounded-circle answer-remove <?php echo e((!empty($answer) and !empty($loop) and $loop->iteration > 1) ? '' : 'd-none'); ?>">
        <i class="fa fa-times"></i>
    </button>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('quiz.answer_title')); ?></label>
                <textarea type="text" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][title]" class="form-control <?php echo e(!empty($answer) ? 'js-ajax-answer-title-'.$answer->id : ''); ?>" rows="1"><?php echo e(!empty($answer) ? $answer->title : ''); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-2 align-items-end">
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('quiz.answer_image')); ?> <span class="braces">(<?php echo e(trans('public.optional')); ?>)</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="file<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>" data-preview="holder">
                            <i class="fa fa-arrow-up" class="text-white"></i>
                        </button>
                    </div>
                    <input id="file<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>" type="text" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][file]" value="<?php echo e(!empty($answer) ? $answer->image : ''); ?>" class="form-control lfm-input"/>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group mt-2 d-flex align-items-center justify-content-between js-switch-parent">
                <label class="js-switch" for="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>"><?php echo e(trans('quiz.correct_answer')); ?></label>
                <div class="custom-control custom-switch">
                    <input id="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>" type="checkbox" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][correct]" <?php if(!empty($answer) and $answer->correct): ?> checked <?php endif; ?> class="custom-control-input js-switch">
                    <label class="custom-control-label js-switch" for="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\quizzes\modals\multiple_answer_form.blade.php ENDPATH**/ ?>