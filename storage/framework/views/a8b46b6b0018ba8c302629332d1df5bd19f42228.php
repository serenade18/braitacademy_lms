<?php
    $checkSequenceContent = $session->checkSequenceContent();
    $sequenceContentHasError = (!empty($checkSequenceContent) and (!empty($checkSequenceContent['all_passed_items_error']) or !empty($checkSequenceContent['access_after_day_error'])));
?>

<div class="accordion-row rounded-sm border mt-15 p-15">
    <div class="d-flex align-items-center justify-content-between" role="tab" id="session_<?php echo e($session->id); ?>">
        <div class="d-flex align-items-center" href="#collapseSession<?php echo e($session->id); ?>" aria-controls="collapseSession<?php echo e($session->id); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <?php if($session->date > time()): ?>
                <a href="<?php echo e($session->addToCalendarLink()); ?>" target="_blank" class="mr-15 d-flex" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.add_to_calendar')); ?>">
                    <span class="chapter-icon chapter-content-icon">
                    <i data-feather="bell" width="20" height="20" class="text-gray"></i>
                    </span>
                </a>
            <?php else: ?>
                <span class="mr-15 d-flex chapter-icon chapter-content-icon">
                    <i data-feather="bell" width="20" height="20" class="text-gray"></i>
                </span>
            <?php endif; ?>
            <span class="font-weight-bold text-secondary font-14"><?php echo e($session->title); ?></span>
        </div>

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" aria-controls="collapseSession<?php echo e(!empty($session) ? $session->id :'record'); ?>" data-parent="#<?php echo e($accordionParent); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>

    <div id="collapseSession<?php echo e($session->id); ?>" aria-labelledby="session_<?php echo e($session->id); ?>" class=" collapse" role="tabpanel">
        <div class="panel-collapse">
            <div class="text-gray">
                <?php echo nl2br(clean($session->description)); ?>

            </div>

            <?php if(!empty($user) and $hasBought): ?>
                <div class="d-flex align-items-center mt-20">
                    <label class="mb-0 mr-10 cursor-pointer font-weight-500" for="sessionReadToggle<?php echo e($session->id); ?>"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" <?php if(($session->date < time()) or $sequenceContentHasError): ?> disabled <?php endif; ?> id="sessionReadToggle<?php echo e($session->id); ?>" data-session-id="<?php echo e($session->id); ?>" value="<?php echo e($course->id); ?>" class="js-text-session-toggle custom-control-input" <?php if(!empty($session->checkPassedItem())): ?> checked <?php endif; ?>>
                        <label class="custom-control-label" for="sessionReadToggle<?php echo e($session->id); ?>"></label>
                    </div>
                </div>
            <?php endif; ?>

            <div class="d-flex align-items-center justify-content-between mt-20">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="clock" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1"><?php echo e(convertMinutesToHourAndMinute($session->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                    </div>

                    <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                        <i data-feather="calendar" width="18" height="18" class="text-gray mr-5"></i>
                        <span class="line-height-1"><?php echo e(dateTimeFormat($session->date, 'j M Y | H:i')); ?></span>
                    </div>
                </div>

                <div class="">
                    <?php if($session->isFinished()): ?>
                        <button type="button" class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled session-finished-toast"><?php echo e(trans('public.finished')); ?></button>
                    <?php elseif(empty($user)): ?>
                        <button type="button" class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled not-login-toast"><?php echo e(trans('public.go_to_class')); ?></button>
                    <?php elseif($hasBought): ?>
                        <?php if(!empty($checkSequenceContent) and $sequenceContentHasError): ?>
                            <button
                                type="button"
                                class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled js-sequence-content-error-modal"
                                data-passed-error="<?php echo e(!empty($checkSequenceContent['all_passed_items_error']) ? $checkSequenceContent['all_passed_items_error'] : ''); ?>"
                                data-access-days-error="<?php echo e(!empty($checkSequenceContent['access_after_day_error']) ? $checkSequenceContent['access_after_day_error'] : ''); ?>"
                            ><?php echo e(trans('public.go_to_class')); ?></button>
                        <?php else: ?>
                            <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=session&item=<?php echo e($session->id); ?>" target="_blank" class="course-content-btns btn btn-sm btn-primary flex-grow-1"><?php echo e(trans('public.go_to_class')); ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <button type="button" class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled not-access-toast"><?php echo e(trans('public.go_to_class')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\contents\sessions.blade.php ENDPATH**/ ?>