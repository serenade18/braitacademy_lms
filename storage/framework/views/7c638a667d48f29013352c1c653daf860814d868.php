<section class="px-15 pb-15 my-15 mx-lg-15 bg-white rounded-lg">

    <?php if(!empty($course->noticeboards) and count($course->noticeboards)): ?>
        <?php $__currentLoopData = $course->noticeboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticeboard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="course-noticeboards noticeboard-<?php echo e($noticeboard->color); ?> p-15 mt-15 rounded-sm w-100">
                <div class="d-flex align-items-center">
                    <div class="course-noticeboard-icon d-flex align-items-center justify-content-center rounded-circle">
                        <i data-feather="<?php echo e($noticeboard->getIcon()); ?>" class="" width="24" height="24"></i>
                    </div>

                    <div class="ml-10">
                        <h3 class="font-14 font-weight-bold"><?php echo e($noticeboard->title); ?></h3>
                        <span class="d-block font-12"><?php echo e($noticeboard->creator->full_name); ?> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($noticeboard->created_at,'j M Y')); ?></span>
                    </div>
                </div>

                <div class="mt-10 font-14"><?php echo $noticeboard->message; ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\learningPage\components\noticeboards.blade.php ENDPATH**/ ?>