<div class="content-tab p-15 pb-50">

    <?php if(
        (empty($sessionsWithoutChapter) or !count($sessionsWithoutChapter)) and
        (empty($textLessonsWithoutChapter) or !count($textLessonsWithoutChapter)) and
        (empty($filesWithoutChapter) or !count($filesWithoutChapter)) and
        (empty($course->chapters) or !count($course->chapters))
    ): ?>
        <div class="learning-page-forum-empty d-flex align-items-center justify-content-center flex-column">
            <div class="learning-page-forum-empty-icon d-flex align-items-center justify-content-center">
                <img src="/assets/default/img/learning/content-empty.svg" class="img-fluid" alt="">
            </div>

            <div class="d-flex align-items-center flex-column mt-10 text-center">
                <h3 class="font-20 font-weight-bold text-dark-blue text-center"><?php echo e(trans('update.learning_page_empty_content_title')); ?></h3>
                <p class="font-14 font-weight-500 text-gray mt-5 text-center"><?php echo e(trans('update.learning_page_empty_content_hint')); ?></p>
            </div>
        </div>
    <?php else: ?>
        <?php if(!empty($sessionsWithoutChapter) and count($sessionsWithoutChapter)): ?>
            <?php $__currentLoopData = $sessionsWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content',['item' => $session, 'type' => \App\Models\WebinarChapter::$chapterSession], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(!empty($textLessonsWithoutChapter) and count($textLessonsWithoutChapter)): ?>
            <?php $__currentLoopData = $textLessonsWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $textLesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content',['item' => $textLesson, 'type' => \App\Models\WebinarChapter::$chapterTextLesson], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(!empty($filesWithoutChapter) and count($filesWithoutChapter)): ?>
            <?php $__currentLoopData = $filesWithoutChapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.course.learningPage.components.content_tab.content',['item' => $file, 'type' => \App\Models\WebinarChapter::$chapterFile], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(!empty($course->chapters) and count($course->chapters)): ?>
            <?php echo $__env->make('web.default.course.learningPage.components.content_tab.chapter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    <?php endif; ?>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/course/learningPage/components/content_tab/index.blade.php ENDPATH**/ ?>