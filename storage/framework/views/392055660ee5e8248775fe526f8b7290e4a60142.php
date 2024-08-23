<?php
    $price = (!empty($instructor->meeting)) ? $instructor->meeting->amount : 0;
    $discount = (!empty($price) and !empty($instructor->meeting) and !empty($instructor->meeting->discount) and $instructor->meeting->discount > 0) ? $instructor->meeting->discount : 0;
?>

<a href="<?php echo e($instructor->getProfileUrl()); ?>" class="">
    <div class="position-relative d-flex flex-wrap instructor-finder-card border border-gray300 rounded-sm py-25 mt-20">

        <div class="col-12 col-md-8 d-flex">
            <div class="instructor-avatar rounded-circle">
                <img src="<?php echo e($instructor->getAvatar(70)); ?>" class="img-cover rounded-circle" alt="<?php echo e($instructor->full_name); ?>">
            </div>

            <div class="ml-20">
                <h3 class="font-16 font-weight-bold text-secondary"><?php echo e($instructor->full_name); ?></h3>

                <div>
                    <span class="d-block font-12 text-gray"><?php echo e($instructor->bio); ?></span>

                    <?php if(!empty($instructor->occupations)): ?>
                        <div class="d-block font-14 text-gray mt-5">
                            <?php $__currentLoopData = $instructor->occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($occupation->category)): ?>
                                    <span><?php echo e($occupation->category->title); ?><?php echo e(!($loop->last) ? ', ' : ''); ?></span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <p class="font-14 text-gray mt-10"><?php echo e(truncate($instructor->about, 200)); ?></p>
            </div>
        </div>

        <div class="col-12 col-md-4 mt-10 mt-md-0 pt-10 pt-md-0 instructor-finder-card-right-side position-relative">
            <?php if(!empty($discount)): ?>
                <span class="off-badge badge badge-danger"><?php echo e(trans('public.offer',['off' => $discount])); ?></span>
            <?php endif; ?>

            <div class="d-flex align-items-start">
                <?php if(!empty($instructor->meeting) and !empty($instructor->meeting->meetingTimes) and count($instructor->meeting->meetingTimes)): ?>
                    <?php if(!empty($price) and $price > 0): ?>
                        <div class="d-flex flex-column">
                            <span class="font-20 font-weight-bold text-primary"><?php echo e(handlePrice(!empty($discount) ? ($price - ($price * $discount / 100)) : $price)); ?></span>

                            <?php if(!empty($discount)): ?>
                                <span class="font-14 font-weight-500 text-gray text-decoration-line-through"><?php echo e(handlePrice($price)); ?></span>
                            <?php endif; ?>
                        </div>

                        <span class="font-14 font-weight-500 text-gray mt-5">/<?php echo e(trans('update.hour')); ?></span>
                    <?php else: ?>
                        <span class="font-weight-bold text-primary font-14"><?php echo e(trans('public.free')); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="font-weight-bold text-danger font-12"><?php echo e(trans('update.not_available_for_meeting')); ?></span>
                <?php endif; ?>
            </div>

            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $instructor->rates()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="d-flex align-items-center mt-20">
                <i data-feather="clock" width="18" height="18" class="text-dark-blue"></i>

                <span class="font-14 font-weight-500 text-dark-blue ml-10"><?php echo e($instructor->getTotalHoursTutoring()); ?> <?php echo e(trans('update.hours_tutoring')); ?></span>
            </div>

            <div class="d-flex align-items-center flex-wrap mt-15">
                <?php $__currentLoopData = $instructor->getBadges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mr-15 mt-10 instructor-badge rounded-circle" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($badge->badge_id) ? nl2br($badge->badge->description) : nl2br($badge->description)); ?>">
                        <img src="<?php echo e(!empty($badge->badge_id) ? $badge->badge->image : $badge->image); ?>" class="img-cover rounded-circle" alt="<?php echo e(!empty($badge->badge_id) ? $badge->badge->title : $badge->title); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</a>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\components\instructor_card.blade.php ENDPATH**/ ?>