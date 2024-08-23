<?php
    $canReserve = false;
    if(!empty($instructor->meeting) and !$instructor->meeting->disabled and !empty($instructor->meeting->meetingTimes) and $instructor->meeting->meeting_times_count > 0) {
        $canReserve = true;
    }
?>

<div class="rounded-lg shadow-sm mt-25 p-20 course-teacher-card instructors-list text-center d-flex align-items-center flex-column position-relative">
    <?php if(!empty($instructor->meeting) and $instructor->meeting->disabled): ?>
        <span class="px-15 py-10 bg-gray off-label text-white font-12"><?php echo e(trans('public.unavailable')); ?></span>
    <?php elseif(!empty($instructor->meeting) and !empty($instructor->meeting->discount)): ?>
        <span class="px-15 py-10 bg-danger off-label text-white font-12"><?php echo e($instructor->meeting->discount); ?>% <?php echo e(trans('public.off')); ?></span>
    <?php endif; ?>

    <a href="<?php echo e($instructor->getProfileUrl()); ?><?php echo e(($canReserve) ? '?tab=appointments' : ''); ?>" class="text-center d-flex flex-column align-items-center justify-content-center">
        <div class=" teacher-avatar mt-5 position-relative">
            <img src="<?php echo e($instructor->getAvatar(190)); ?>" class="img-cover" alt="<?php echo e($instructor->full_name); ?>">

            <?php if($instructor->offline): ?>
                <span class="user-circle-badge unavailable d-flex align-items-center justify-content-center">
                <i data-feather="slash" width="20" height="20" class="text-white"></i>
                </span>
            <?php elseif($instructor->verified): ?>
                <span class="user-circle-badge has-verified d-flex align-items-center justify-content-center">
                    <i data-feather="check" width="20" height="20" class="text-white"></i>
                </span>
            <?php endif; ?>
        </div>

        <h3 class="mt-20 font-16 font-weight-bold text-dark-blue text-center"><?php echo e($instructor->full_name); ?></h3>
    </a>

    <div class="mt-5 font-14 text-gray">
        <?php if(!empty($instructor->bio)): ?>
            <?php echo e($instructor->bio); ?>

        <?php endif; ?>
    </div>

    <div class="stars-card d-flex align-items-center mt-10">
        <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $instructor->rates()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="d-flex align-items-center mt-20">
        <?php $__currentLoopData = $instructor->getBadges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mr-15 mt-5" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($badge->badge_id) ? nl2br($badge->badge->description) : nl2br($badge->description)); ?>">
                <img src="<?php echo e(!empty($badge->badge_id) ? $badge->badge->image : $badge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($badge->badge_id) ? $badge->badge->title : $badge->title); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-15">
        <?php if(!empty($instructor->meeting) and !$instructor->meeting->disabled and !empty($instructor->meeting->amount)): ?>
            <?php if(!empty($instructor->meeting->discount)): ?>
                <span class="font-20 text-primary font-weight-bold"><?php echo e(handlePrice($instructor->meeting->amount - (($instructor->meeting->amount * $instructor->meeting->discount) / 100))); ?></span>
                <span class="font-14 text-gray text-decoration-line-through ml-10"><?php echo e(handlePrice($instructor->meeting->amount)); ?></span>
            <?php else: ?>
                <span class="font-20 text-primary font-weight-500"><?php echo e(handlePrice($instructor->meeting->amount)); ?></span>
            <?php endif; ?>
        <?php else: ?>
            <span class="py-10">&nbsp;</span>
        <?php endif; ?>
    </div>

    <div class="mt-20 d-flex flex-row align-items-center justify-content-center w-100">
        <a href="<?php echo e($instructor->getProfileUrl()); ?><?php echo e(($canReserve) ? '?tab=appointments' : ''); ?>" class="btn btn-primary btn-block">
            <?php if($canReserve): ?>
                <?php echo e(trans('public.reserve_a_meeting')); ?>

            <?php else: ?>
                <?php echo e(trans('public.view_profile')); ?>

            <?php endif; ?>
        </a>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\pages\instructor_card.blade.php ENDPATH**/ ?>