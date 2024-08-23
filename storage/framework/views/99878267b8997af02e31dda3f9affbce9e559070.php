<?php
    $days = ['saturday', 'sunday','monday','tuesday','wednesday','thursday','friday'];
?>

<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/wrunner-html-range-slider-with-2-handles/css/wrunner-default-theme.css">
<?php $__env->stopPush(); ?>

<div class="wizard-step-1">
    <h3 class="font-20 text-dark font-weight-bold"><?php echo e(trans('update.meeting_time')); ?></h3>

    <span class="d-block mt-30 text-gray wizard-step-num">
        <?php echo e(trans('update.step')); ?> 4/4
    </span>

    <span class="d-block font-16 font-weight-500 mt-30"><?php echo e(trans('update.what_time_is_better_for_the_meeting')); ?></span>

    <div class="mb-30 custom-control custom-checkbox mt-30 full-checkbox w-100">
        <input type="checkbox" name="flexible_date" value="1" class="custom-control-input" id="date">
        <label class="custom-control-label font-14 w-100" for="date"><?php echo e(trans('update.im_flexible')); ?></label>
    </div>

    <div id="dateTimeCard">
        <div class="mb-30 form-group d-flex align-items-center flex-wrap">
            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="wizard-custom-checkbox">
                    <input type="radio" name="day[]" value="<?php echo e($day); ?>" id="<?php echo e($day); ?>" <?php echo e((request()->get('day') == $day) ? 'checked' : ''); ?>/>
                    <label for="<?php echo e($day); ?>" class="cursor-pointer"><?php echo e(trans('panel.'.$day)); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div
            class="range"
            id="timeRange"
            data-minLimit="0"
            data-maxLimit="23"
        >
            <input type="hidden" name="min_time" value="0">
            <input type="hidden" name="max_time" value="23">

        </div>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/wrunner-html-range-slider-with-2-handles/js/wrunner-jquery.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\wizard\step_4.blade.php ENDPATH**/ ?>