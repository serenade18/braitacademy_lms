<section class="p-15 m-15 border rounded-lg">
    <h3 class="font-20 font-weight-bold text-secondary"><?php echo e($courseForum->title); ?></h3>

    <span class="d-block font-14 font-weight-500 text-gray mt-5"><?php echo e(trans('public.by')); ?> <span class="font-weight-bold"><?php echo e($courseForum->user->full_name); ?></span> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($courseForum->created_at, 'j M Y | H:i')); ?></span>

    <div class="mt-15 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item font-12 text-gray"><a href="<?php echo e($course->getLearningPageUrl()); ?>"><?php echo e($course->title); ?></a></li>
                <li class="breadcrumb-item font-12 text-gray"><a href="<?php echo e($course->getForumPageUrl()); ?>"><?php echo e(trans('update.forum')); ?></a></li>
                <li class="breadcrumb-item font-12 text-gray font-weight-bold" aria-current="page"><?php echo e($courseForum->title); ?></li>
            </ol>
        </nav>
    </div>
</section>


<?php echo $__env->make('web.default.course.learningPage.components.forum.forum_answer_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(!empty($courseForum) and count($courseForum->answers)): ?>
    <?php $__currentLoopData = $courseForum->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseForumAnswer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('web.default.course.learningPage.components.forum.forum_answer_card',['answer' => $courseForumAnswer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<div class="mt-25">
    <h3 class="font-20 font-weight-bold text-secondary px-15"><?php echo e(trans('update.write_a_reply')); ?></h3>

    <form action="<?php echo e($course->getForumPageUrl()); ?>/<?php echo e($courseForum->id); ?>/answers" method="post">
        <div class="course-forum-answer-card py-15 m-15 rounded-lg">
            <div class="d-flex flex-wrap">
                <div class="col-12 col-md-3">
                    <div class="position-relative bg-info-light d-flex flex-column align-items-center justify-content-center rounded-lg w-100 h-100 p-20">
                        <div class="user-avatar rounded-circle">
                            <img src="<?php echo e($user->getAvatar(72)); ?>" class="img-cover rounded-circle" alt="<?php echo e($user->full_name); ?>">
                        </div>
                        <h4 class="font-14 text-secondary mt-15 font-weight-bold"><?php echo e($user->full_name); ?></h4>

                        <span class="px-10 py-5 mt-5 rounded-lg border bg-info-light text-center font-12 text-gray">
                        <?php if($user->isUser()): ?>
                                <?php echo e(trans('quiz.student')); ?>

                            <?php elseif($user->isTeacher()): ?>
                                <?php echo e(trans('panel.teacher')); ?>

                            <?php elseif($user->isOrganization()): ?>
                                <?php echo e(trans('home.organization')); ?>

                            <?php elseif($user->isAdmin()): ?>
                                <?php echo e(trans('panel.staff')); ?>

                            <?php endif; ?>
                    </span>
                    </div>
                </div>

                <div class="col-12 col-md-9 mt-15 mt-md-0">
                    <div class="form-group mb-0 h-100 w-100">
                        <textarea name="description" class="form-control h-100"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="mt-10 text-right px-15">
                <button type="button" class="js-reply-course-question btn btn-primary btn-sm"><?php echo e(trans('update.post_reply')); ?></button>
            </div>
        </div>
    </form>
</div>


<?php echo $__env->make('web.default.course.learningPage.components.forum.ask_question_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('web.default.course.learningPage.components.forum.edit_answer_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\learningPage\components\forum\forum_answers.blade.php ENDPATH**/ ?>