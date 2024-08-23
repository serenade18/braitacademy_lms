<?php
    $checkSequenceContent = $textLesson->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>

<div class="accordion-row rounded-sm border mt-15 p-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="textLessons_<?php echo e($textLesson->id); ?>">
        <div class="d-flex align-items-center" href="#collapseTextLessons<?php echo e($textLesson->id); ?>" aria-controls="collapseTextLessons<?php echo e($textLesson->id); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true">

            <?php if($textLesson->accessibility == 'paid'): ?>
                <?php if(!empty($user) and $hasBought): ?>
                    <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=text_lesson&item=<?php echo e($textLesson->id); ?>" target="_blank" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.read')); ?>">
                            <span class="chapter-icon chapter-content-icon">
                            <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                            </span>
                    </a>
                <?php else: ?>
                    <span class="mr-15 chapter-icon chapter-content-icon">
                        <i data-feather="lock" width="20" height="20" class="text-gray"></i>
                    </span>
                <?php endif; ?>
            <?php else: ?>
                <?php if(!empty($user) and $hasBought): ?>
                    <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=text_lesson&item=<?php echo e($textLesson->id); ?>" target="_blank" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.read')); ?>">
                        <span class="chapter-icon chapter-content-icon">
                            <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                        </span>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="mr-15" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.read')); ?>">
                        <span class="chapter-icon chapter-content-icon">
                            <i data-feather="file-text" width="20" height="20" class="text-gray"></i>
                        </span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

            <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($textLesson->title); ?></span>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseTextLessons<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" aria-controls="collapseTextLessons<?php echo e(!empty($textLesson) ? $textLesson->id :'record'); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>

    <div id="collapseTextLessons<?php echo e($textLesson->id); ?>" aria-labelledby="textLessons_<?php echo e($textLesson->id); ?>" class=" collapse" role="tabpanel">
        <div class="panel-collapse">
            <div class="text-gray">
                <?php echo nl2br(clean($textLesson->summary)); ?>

            </div>

            <?php if(!empty($user) and $hasBought): ?>
                <div class="d-flex align-items-center mt-20">
                    <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="textLessonReadToggle<?php echo e($textLesson->id); ?>"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" <?php if($sequenceContentHasError): ?> disabled <?php endif; ?> id="textLessonReadToggle<?php echo e($textLesson->id); ?>" data-lesson-id="<?php echo e($textLesson->id); ?>" value="<?php echo e($course->id); ?>" class="js-text-lesson-learning-toggle custom-control-input" <?php if(!empty($textLesson->checkPassedItem())): ?> checked <?php endif; ?>>
                        <label class="custom-control-label" for="textLessonReadToggle<?php echo e($textLesson->id); ?>"></label>
                    </div>
                </div>
            <?php endif; ?>

            <div class="d-flex align-items-center justify-content-between mt-20">

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="clock" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1"><?php echo e($textLesson->study_time); ?> <?php echo e(trans('public.min')); ?></span>
                    </div>

                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="paperclip" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1"><?php echo e(trans('public.attachments')); ?>: <?php echo e($textLesson->attachments_count); ?></span>
                    </div>
                </div>

                <div class="">
                    <?php if(!empty($checkSequenceContent) and $sequenceContentHasError): ?>
                        <button
                            type="button"
                            class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled js-sequence-content-error-modal"
                            data-passed-error="<?php echo e(!empty($checkSequenceContent['all_passed_items_error']) ? $checkSequenceContent['all_passed_items_error'] : ''); ?>"
                            data-access-days-error="<?php echo e(!empty($checkSequenceContent['access_after_day_error']) ? $checkSequenceContent['access_after_day_error'] : ''); ?>"
                        ><?php echo e(trans('public.read')); ?></button>
                    <?php elseif($textLesson->accessibility == 'paid'): ?>
                        <?php if(!empty($user) and $hasBought): ?>
                            <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=text_lesson&item=<?php echo e($textLesson->id); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                <?php echo e(trans('public.read')); ?>

                            </a>
                        <?php else: ?>
                            <button type="button" class="course-content-btns btn btn-sm btn-gray disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : ''))); ?>">
                                <?php echo e(trans('public.read')); ?>

                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(!empty($user) and $hasBought): ?>
                            <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=text_lesson&item=<?php echo e($textLesson->id); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                <?php echo e(trans('public.read')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($textLesson->id); ?>/read" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                                <?php echo e(trans('public.read')); ?>

                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\contents\text_lessons.blade.php ENDPATH**/ ?>