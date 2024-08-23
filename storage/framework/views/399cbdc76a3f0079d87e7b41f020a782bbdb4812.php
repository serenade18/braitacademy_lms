<?php
    $checkSequenceContent = $quiz->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>


<div class="accordion-row rounded-sm border mt-15 p-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="quiz_<?php echo e($quiz->id); ?>">
        <div class="d-flex align-items-center" href="#collapseQuiz<?php echo e(!empty($tagId)); ?><?php echo e($quiz->id); ?>" aria-controls="collapseQuiz<?php echo e(!empty($tagId)); ?><?php echo e($quiz->id); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <span class="mr-15 d-flex">
                <span class="chapter-icon chapter-content-icon">
                <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                </span>
            </span>

            <div class="">
                <span class="font-weight-bold font-14 text-secondary d-block"><?php echo e($quiz->title); ?></span>
            </div>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseQuiz<?php echo e(!empty($tagId)); ?><?php echo e(!empty($quiz) ? $quiz->id :'record'); ?>" aria-controls="collapseQuiz<?php echo e(!empty($tagId)); ?><?php echo e(!empty($quiz) ? $quiz->id :'record'); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>

    <div id="collapseQuiz<?php echo e(!empty($tagId)); ?><?php echo e($quiz->id); ?>" aria-labelledby="quiz_<?php echo e($quiz->id); ?>" class=" collapse" role="tabpanel">
        <div class="panel-collapse">
            <div class="d-flex align-items-center mt-20">
                <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                    <i data-feather="help-circle" width="18" height="18" class="text-gray mr-5"></i>
                    <span class="line-height-1"><?php echo e($quiz->quizQuestions->count()); ?> <?php echo e(trans('public.questions')); ?></span>
                </div>

                <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                    <i data-feather="clock" width="18" height="18" class="text-gray mr-5"></i>
                    <span class="line-height-1"><?php echo e($quiz->time); ?> <?php echo e(trans('public.min')); ?></span>
                </div>

                <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                    <i data-feather="check-square" width="18" height="18" class="text-gray mr-5"></i>
                    <span class="line-height-1"><?php echo e(trans('update.passed_grade')); ?>: <?php echo e($quiz->pass_mark); ?>/<?php echo e($quiz->quizQuestions->sum('grade')); ?></span>
                </div>

                <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                    <i data-feather="check-square" width="18" height="18" class="text-gray mr-5"></i>
                    <span class="line-height-1"><?php echo e(trans('update.attempts')); ?>: <?php echo e((!empty($user) and !empty($quiz->result_count)) ? $quiz->result_count : '0'); ?>/<?php echo e($quiz->attempt); ?></span>
                </div>

                <?php if(!empty($user) and !empty($quiz->result_status)): ?>
                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="check-square" width="18" height="18" class="text-gray mr-5"></i>
                        <div class="line-height-1 text-gray font-14 text-center">
                            <span class="<?php if($quiz->result_status == 'passed'): ?> text-primary <?php elseif($quiz->result_status == 'failed'): ?> text-danger <?php else: ?> text-warning <?php endif; ?>">
                                <?php if($quiz->result_status == 'passed'): ?>
                                    <?php echo e(trans('quiz.passed')); ?>

                                <?php elseif($quiz->result_status == 'failed'): ?>
                                    <?php echo e(trans('quiz.failed')); ?>

                                <?php elseif($quiz->result_status == 'waiting'): ?>
                                    <?php echo e(trans('quiz.waiting')); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <div class="d-flex justify-content-end mt-20">
                <?php if(!empty($user) and $quiz->can_try and $hasBought): ?>
                    <a href="/panel/quizzes/<?php echo e($quiz->id); ?>/start" class="course-content-btns btn btn-sm btn-primary"><?php echo e(trans('quiz.quiz_start')); ?></a>
                <?php else: ?>
                    <button type="button" class="course-content-btns btn btn-sm btn-gray disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_try ? 'can-not-try-again-quiz-toast' : '')))); ?>">
                        <?php echo e(trans('quiz.quiz_start')); ?>

                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\contents\quiz.blade.php ENDPATH**/ ?>