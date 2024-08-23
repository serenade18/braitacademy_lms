<?php
    $checkSequenceContent = $assignment->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>

<div class="accordion-row rounded-sm border mt-15 p-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="assignment_<?php echo e($assignment->id); ?>">
        <div class="d-flex align-items-center" href="#collapseAssignment<?php echo e($assignment->id); ?>" aria-controls="collapseAssignment<?php echo e($assignment->id); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true">

            <span class="mr-15 chapter-icon chapter-content-icon">
                <i data-feather="feather" width="20" height="20" class="text-gray"></i>
            </span>

            <span class="font-weight-bold text-secondary font-14 file-title"><?php echo e($assignment->title); ?></span>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseAssignment<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" aria-controls="collapseAssignment<?php echo e(!empty($assignment) ? $assignment->id :'record'); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>

    <div id="collapseAssignment<?php echo e($assignment->id); ?>" aria-labelledby="assignment_<?php echo e($assignment->id); ?>" class=" collapse" role="tabpanel">
        <div class="panel-collapse">
            <div class="text-gray">
                <?php echo nl2br(clean($assignment->description)); ?>

            </div>

            <div class="d-flex align-items-center justify-content-between mt-20">

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="clock" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1"><?php echo e(trans('update.min_grade')); ?>: <?php echo e($assignment->pass_grade); ?></span>
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
                    <?php elseif(!empty($user) and $hasBought): ?>
                        <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=assignment&item=<?php echo e($assignment->id); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary">
                            <?php echo e(trans('public.read')); ?>

                        </a>
                    <?php else: ?>
                        <button type="button" class="course-content-btns btn btn-sm btn-gray disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : ''))); ?>">
                            <?php echo e(trans('public.read')); ?>

                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\contents\assignment.blade.php ENDPATH**/ ?>