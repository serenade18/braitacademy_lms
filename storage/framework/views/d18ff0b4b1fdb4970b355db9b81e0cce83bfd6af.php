<?php $__env->startSection('content'); ?>
    <section class="cart-banner position-relative text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">

                    <h1 class="font-30 text-white font-weight-bold"><?php echo e($textLesson->title); ?></h1>

                    <div class="mt-20 font-16 font-weight-500 text-white">
                        <span><?php echo e(trans('public.lesson')); ?> <?php echo e($textLesson->order); ?>/<?php echo e(count($course->textLessons)); ?> </span> | <span><?php echo e(trans('public.study_time')); ?>: <?php echo e($textLesson->study_time); ?> <?php echo e(trans('public.min')); ?></span>
                    </div>

                    <div class="mt-20 font-16 font-weight-500 text-white">
                        <span><?php echo e(trans('product.course')); ?>: <a href="<?php echo e($course->getUrl()); ?>" class="font-16 font-weight-500 text-white text-decoration-underline"><?php echo e($course->title); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-10 mt-md-40">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="post-show mt-30">

                    <?php if(!empty($textLesson->image)): ?>
                        <div class="post-img pb-30">
                            <img src="<?php echo e(url($textLesson->image)); ?>" alt="<?php echo e($textLesson->title); ?>"/>
                        </div>
                    <?php endif; ?>

                    <?php echo nl2br($textLesson->content); ?>

                </div>


                <div class="mt-30 row align-items-center">
                    <div class="col-12 col-md-5">
                        <?php if(auth()->check()): ?>
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer font-weight-500" for="readLessonSwitch"><?php echo e(trans('public.i_passed_this_lesson')); ?></label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="read" class="custom-control-input" id="readLessonSwitch" data-course-id="<?php echo e($course->id); ?>" data-lesson-id="<?php echo e($textLesson->id); ?>" <?php echo e(!empty($textLesson->checkPassedItem()) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="readLessonSwitch"></label>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-7 text-right">
                        <?php if(!empty($course->textLessons) and count($course->textLessons)): ?>
                            <a href="<?php echo e((!empty($previousLesson)) ? $course->getUrl() .'/lessons/'. $previousLesson->id .'/read' : '#'); ?>" class="btn btn-sm <?php echo e((!empty($previousLesson)) ? 'btn-primary' : 'btn-gray disabled'); ?>"><?php echo e(trans('public.previous_lesson')); ?></a>

                            <?php if(!empty($nextLesson)): ?>
                                <a href="<?php echo e((!$nextLesson->not_purchased) ? $course->getUrl() .'/lessons/'. $nextLesson->id .'/read' : '#'); ?>" class="btn btn-sm <?php echo e((!$nextLesson->not_purchased) ? 'btn-primary' : 'btn-gray disabled'); ?> <?php echo e(($nextLesson->not_purchased) ? 'js-not-purchased' : ''); ?>"><?php echo e(trans('public.next_lesson')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">

                <div class="rounded-lg shadow-sm mt-35 p-20 course-teacher-card d-flex align-items-center flex-column">
                    <div class="teacher-avatar mt-5">
                        <img src="<?php echo e($course->teacher->getAvatar(100)); ?>" class="img-cover" alt="<?php echo e($course->teacher->full_name); ?>">
                    </div>
                    <h3 class="mt-10 font-20 font-weight-bold text-secondary"><?php echo e($course->teacher->full_name); ?></h3>
                    <span class="mt-5 font-weight-500 text-gray"><?php echo e(trans('product.product_designer')); ?></span>

                    <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $course->teacher->rates()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="user-reward-badges d-flex flex-wrap align-items-center mt-20">
                        <?php $__currentLoopData = $course->teacher->getBadges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-15 mt-10" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($userBadge->badge_id) ? nl2br($userBadge->badge->description) : nl2br($userBadge->description)); ?>">
                                <img src="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->image : $userBadge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($userBadge->badge_id) ? $userBadge->badge->title : $userBadge->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-25 d-flex flex-row align-items-center justify-content-center w-100">
                        <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" target="_blank" class="btn btn-sm btn-primary teacher-btn-action"><?php echo e(trans('public.profile')); ?></a>

                        <?php if(!empty($course->teacher->hasMeeting())): ?>
                            <a href="<?php echo e($course->teacher->getProfileUrl()); ?>" class="btn btn-sm btn-primary teacher-btn-action ml-15"><?php echo e(trans('public.book_a_meeting')); ?></a>
                        <?php else: ?>
                            <button type="button" class="btn btn-sm btn-primary disabled teacher-btn-action ml-15"><?php echo e(trans('public.book_a_meeting')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(!empty($textLesson->attachments) and count($textLesson->attachments)): ?>
                    <div class="shadow-sm rounded-lg bg-white px-15 px-md-25 py-20 mt-30">
                        <h3 class="category-filter-title font-16 font-weight-bold text-dark-blue"><?php echo e(trans('public.attachments')); ?></h3>

                        <ul class="p-0 m-0 pt-10">
                            <?php $__currentLoopData = $textLesson->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mt-10 p-10 rounded bg-info-light font-14 font-weight-500 text-dark-blue d-flex align-items-center justify-content-between text-ellipsis">
                                    <span class=""><?php echo e($attachment->file->title); ?></span>

                                    <a href="<?php echo e($course->getLearningPageUrl()); ?>?type=file&item=<?php echo e($attachment->file->id); ?>" target="_blank">
                                        <i data-feather="download-cloud" width="20" class="text-secondary"></i>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(!empty($course->textLessons) and count($course->textLessons)): ?>
                    <div class="shadow-sm rounded-lg bg-white px-15 px-md-25 py-20 mt-30">
                        <h3 class="category-filter-title font-16 font-weight-bold text-dark-blue"><?php echo e(trans('public.course_sessions')); ?></h3>

                        <div class="p-0 m-0 pt-10">
                            <?php $__currentLoopData = $course->textLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($course->getUrl()); ?>/lessons/<?php echo e($lesson->id); ?>/read"
                                   class="d-block mt-10 px-10 py-15 rounded font-14 font-weight-500 text-ellipsis <?php if($lesson->id == $textLesson->id): ?> bg-primary text-white <?php else: ?> bg-info-light text-dark-blue <?php endif; ?>">
                                    <?php echo e($loop->iteration .'- '. $lesson->title); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var learningToggleLangSuccess = '<?php echo e(trans('public.course_learning_change_status_success')); ?>';
        var learningToggleLangError = '<?php echo e(trans('public.course_learning_change_status_error')); ?>';
    </script>

    <script src="/assets/default/js/parts/text_lesson.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\text_lesson.blade.php ENDPATH**/ ?>