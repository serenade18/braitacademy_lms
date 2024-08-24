<?php
    $hasCertificateItem=false;
?>

<div class="content-tab p-15 pb-50">
    <?php if($course->certificate): ?>
        <?php
            $hasCertificateItem = true;
        ?>

        <div class="course-certificate-item cursor-pointer p-10 border border-gray200 rounded-sm mb-15" data-course-certificate="<?php echo e(!empty($courseCertificate) ? $courseCertificate->id : ''); ?>">
            <div class="d-flex align-items-center">
                <span class="chapter-icon bg-gray300 mr-10">
                    <i data-feather="award" class="text-gray" width="16" height="16"></i>
                </span>

                <div class="flex-grow-1">
                    <span class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e(trans('update.course_certificate')); ?></span>

                    <div class="d-flex align-items-center">
                        <?php if(!empty($courseCertificate)): ?>
                            <span class="font-12 text-gray"><?php echo e(trans("public.date")); ?>: <?php echo e(dateTimeFormat($courseCertificate->created_at, 'j F Y')); ?></span>
                        <?php else: ?>
                            <span class="font-12 text-gray"><?php echo e(trans("update.not_achieve")); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($course->quizzes) and count($course->quizzes)): ?>
        <?php $__currentLoopData = $course->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($courseQuiz->certificate): ?>
                <?php
                    $hasCertificateItem = true;
                ?>

                <div class="certificate-item cursor-pointer p-10 border border-gray200 rounded-sm mb-15" data-result="<?php echo e($courseQuiz->result ? $courseQuiz->result->id : ''); ?>">
                    <div class="d-flex align-items-center">
                        <span class="chapter-icon bg-gray300 mr-10">
                            <i data-feather="award" class="text-gray" width="16" height="16"></i>
                        </span>

                        <div class="flex-grow-1">
                            <span class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e($courseQuiz->title); ?></span>

                            <div class="d-flex align-items-center">
                                <span class="font-12 text-gray"><?php echo e($courseQuiz->pass_mark); ?>/<?php echo e($courseQuiz->quizQuestions->sum('grade')); ?></span>

                                <?php if(!empty($courseQuiz->result)): ?>
                                    <span class="font-12 text-gray ml-10"><?php echo e(dateTimeFormat($courseQuiz->result->created_at, 'j M Y H:i')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(!$hasCertificateItem): ?>
        <div class="learning-page-forum-empty d-flex align-items-center justify-content-center flex-column">
            <div class="learning-page-forum-empty-icon d-flex align-items-center justify-content-center">
                <img src="/assets/default/img/learning/certificate-empty.svg" class="img-fluid" alt="">
            </div>

            <div class="d-flex align-items-center flex-column mt-10 text-center">
                <h3 class="font-20 font-weight-bold text-dark-blue text-center"><?php echo e(trans('update.learning_page_empty_certificate_title')); ?></h3>
                <p class="font-14 font-weight-500 text-gray mt-5 text-center"><?php echo e(trans('update.learning_page_empty_certificate_hint')); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/course/learningPage/components/certificate_tab/index.blade.php ENDPATH**/ ?>