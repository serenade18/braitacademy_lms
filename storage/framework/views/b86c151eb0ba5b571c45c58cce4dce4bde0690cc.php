<?php
    $showLoading = true;

    if(
        (!empty($noticeboards) and $noticeboards) or
        !empty($assignment) or
        (!empty($isForumPage) and $isForumPage) or
        (!empty($isForumAnswersPage) and $isForumAnswersPage)
    ) {
        $showLoading = false;
    }
?>

<div class="learning-content" id="learningPageContent">

    <?php if(!empty($isForumAnswersPage) and $isForumAnswersPage): ?>
        <?php echo $__env->make('web.default.course.learningPage.components.forum.forum_answers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(!empty($isForumPage) and $isForumPage): ?>
        <?php echo $__env->make('web.default.course.learningPage.components.forum.forum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(!empty($noticeboards) and $noticeboards): ?>
        <?php echo $__env->make('web.default.course.learningPage.components.noticeboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(!empty($assignment)): ?>
        <?php echo $__env->make('web.default.course.learningPage.components.assignment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="learning-content-loading align-items-center justify-content-center flex-column w-100 h-100 <?php echo e($showLoading ? 'd-flex' : 'd-none'); ?>">
        <img src="/assets/default/img/loading.gif" alt="">
        <p class="mt-10"><?php echo e(trans('update.please_wait_for_the_content_to_load')); ?></p>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/course/learningPage/components/content.blade.php ENDPATH**/ ?>