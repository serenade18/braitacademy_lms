<?php
    $checkSequenceContent = $item->checkSequenceContent();
   $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>


<div class="<?php echo e((!empty($checkSequenceContent) and $sequenceContentHasError) ? 'js-sequence-content-error-modal' : 'tab-item'); ?> p-10 cursor-pointer <?php echo e($class ?? ''); ?>"
     data-type="<?php echo e($type); ?>"
     data-id="<?php echo e($item->id); ?>"
     data-passed-error="<?php echo e(!empty($checkSequenceContent['all_passed_items_error']) ? $checkSequenceContent['all_passed_items_error'] : ''); ?>"
     data-access-days-error="<?php echo e(!empty($checkSequenceContent['access_after_day_error']) ? $checkSequenceContent['access_after_day_error'] : ''); ?>"
>

    <div class="d-flex align-items-center">
        <span class="chapter-icon bg-gray300 mr-10">
            <i data-feather="award" class="text-gray" width="16" height="16"></i>
        </span>

        <div class="flex-grow-1">
            <span class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e($item->title); ?></span>

            <div class="d-flex align-items-center justify-content-between">
                <span class="font-12 text-gray d-block">
                    <?php if(!empty($item->time)): ?>
                        <?php echo e($item->time .' '. trans('public.min')); ?>

                    <?php else: ?>
                        <?php echo e(trans('update.unlimited_time')); ?>

                    <?php endif; ?>

                    <?php echo e(($item->quizQuestions ? ' | ' . (($item->display_limited_questions and !empty($item->display_number_of_questions)) ? $item->display_number_of_questions : $item->quizQuestions->count()) .' '. trans('public.questions') : '')); ?>

                </span>

                <?php if(!empty($quiz->result_status)): ?>
                    <?php if($quiz->result_status == 'passed'): ?>
                        <span class="font-12 text-primary"><?php echo e(trans('quiz.passed')); ?></span>
                    <?php elseif($quiz->result_status == 'failed'): ?>
                        <span class="font-12 text-danger"><?php echo e(trans('quiz.failed')); ?></span>
                    <?php elseif($quiz->result_status == 'waiting'): ?>
                        <span class="font-12 text-warning"><?php echo e(trans('quiz.waiting')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\learningPage\components\quiz_tab\quiz.blade.php ENDPATH**/ ?>