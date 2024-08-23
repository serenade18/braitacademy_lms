<div class="row">
    <div class="col-12">
        <div class="accordion-content-wrapper" id="certificateAccordion" role="tablist" aria-multiselectable="true">
            <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($quiz->certificate)): ?>
                    <div class="accordion-row rounded-sm border mt-20 p-15">
                        <div class="d-flex align-items-center justify-content-between" role="tab" id="quizCertificate_<?php echo e($quiz->id); ?>">

                            <div class="d-flex align-items-center" href="#collapseQuizCertificate<?php echo e($quiz->id); ?>" aria-controls="collapseQuizCertificate<?php echo e($quiz->id); ?>" data-parent="#certificateAccordion" role="button" data-toggle="collapse" aria-expanded="true">
                                    <span class="chapter-icon chapter-content-icon mr-15">
                                        <i data-feather="award" width="20" height="20" class="text-gray"></i>
                                    </span>

                                <span class="font-weight-bold font-14 text-secondary d-block"><?php echo e($quiz->title); ?></span>
                            </div>

                            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseQuizCertificate<?php echo e(!empty($quiz) ? $quiz->id :'record'); ?>" aria-controls="collapseQuizCertificate<?php echo e(!empty($quiz) ? $quiz->id :'record'); ?>" data-parent="#certificateAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
                        </div>

                        <div id="collapseQuizCertificate<?php echo e($quiz->id); ?>" aria-labelledby="quizCertificate_<?php echo e($quiz->id); ?>" class=" collapse" role="tabpanel">
                            <div class="panel-collapse">
                                <div class="d-flex align-items-center justify-content-between mt-20">
                                    <div class="d-flex align-items-center">
                                        <?php if(!empty($quiz->result)): ?>
                                            <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                                                <i data-feather="calendar" width="18" height="18" class="text-gray mr-5"></i>
                                                <span class="line-height-1"><?php echo e(dateTimeFormat($quiz->result->created_at, 'j M Y')); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <div class="d-flex align-items-center text-gray text-center font-14 mr-20">
                                            <i data-feather="check-square" width="18" height="18" class="text-gray mr-5"></i>
                                            <span class="line-height-1"><?php echo e(trans('update.passed_grade')); ?>: <?php echo e($quiz->pass_mark); ?>/<?php echo e($quiz->quizQuestions->sum('grade')); ?></span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <?php if(!empty($user) and $quiz->can_download_certificate and $hasBought): ?>
                                            <a href="/panel/quizzes/results/<?php echo e($quiz->result->id); ?>/showCertificate" target="_blank" class="course-content-btns btn btn-sm btn-primary"><?php echo e(trans('home.download')); ?></a>
                                        <?php else: ?>
                                            <button type="button" class="course-content-btns btn btn-sm btn-gray disabled <?php echo e(((empty($user)) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_download_certificate ? 'can-not-download-certificate-toast' : '')))); ?>">
                                                <?php echo e(trans('home.download')); ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\contents\certificate.blade.php ENDPATH**/ ?>