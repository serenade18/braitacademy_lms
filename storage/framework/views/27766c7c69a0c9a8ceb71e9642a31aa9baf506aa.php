<div class="content-tab p-15 pb-50">
    <?php if(!empty($course->quizzes) and $course->quizzes->count()): ?>
        <?php $__currentLoopData = $course->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('web.default.course.learningPage.components.quiz_tab.quiz',['item' => $quiz, 'type' => 'quiz','class' => 'px-10 border border-gray200 rounded-sm mb-15'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>
        <div class="learning-page-forum-empty d-flex align-items-center justify-content-center flex-column">
            <div class="learning-page-forum-empty-icon d-flex align-items-center justify-content-center">
                <img src="/assets/default/img/learning/quiz-empty.svg" class="img-fluid" alt="">
            </div>

            <div class="d-flex align-items-center flex-column mt-10 text-center">
                <h3 class="font-20 font-weight-bold text-dark-blue text-center"><?php echo e(trans('update.learning_page_empty_quiz_title')); ?></h3>
                <p class="font-14 font-weight-500 text-gray mt-5 text-center"><?php echo e(trans('update.learning_page_empty_quiz_hint')); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/course/learningPage/components/quiz_tab/index.blade.php ENDPATH**/ ?>