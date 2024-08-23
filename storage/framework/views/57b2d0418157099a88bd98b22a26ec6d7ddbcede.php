<div class="add-answer-card mt-25 <?php echo e((empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'main-answer-row' : ''); ?>">
    <button type="button" class="btn btn-sm btn-danger rounded-circle answer-remove <?php echo e((!empty($answer) and !empty($loop) and $loop->iteration > 1) ? '' : 'd-none'); ?>">
        <i data-feather="x" width="20" height="20"></i>
    </button>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('quiz.answer_title')); ?></label>
                <textarea type="text" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][title]" class=" form-control <?php echo e(!empty($answer) ? 'js-ajax-answer-title-'.$answer->id : ''); ?>" rows="1"><?php echo e(!empty($answer) ? $answer->title : ''); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-15 align-items-end">
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('quiz.answer_image')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="file<?php echo e(!empty($answer) ? $answer->id : '_ans_tmp'); ?>" data-preview="holder">
                            <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                    <input id="file<?php echo e(!empty($answer) ? $answer->id : '_ans_tmp'); ?>" type="text" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][file]" value="<?php echo e(!empty($answer) ? $answer->image : ''); ?>" class="form-control lfm-input"/>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group mt-20 d-flex align-items-center justify-content-between js-switch-parent">
                <label class="js-switch input-label" for="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>"><?php echo e(trans('quiz.correct_answer')); ?></label>
                <div class="custom-control custom-switch">
                    <input id="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>" type="checkbox" name="ajax[answers][<?php echo e(!empty($answer) ? $answer->id : 'ans_tmp'); ?>][correct]" <?php if(!empty($answer) and $answer->correct): ?> checked <?php endif; ?> class="custom-control-input js-switch">
                    <label class="custom-control-label js-switch" for="correctAnswerSwitch<?php echo e(!empty($answer) ? $answer->id : ''); ?>"></label>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\quizzes\modals\multiple_answer_form.blade.php ENDPATH**/ ?>