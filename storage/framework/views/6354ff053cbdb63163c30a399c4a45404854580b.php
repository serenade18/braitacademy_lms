<?php
    $days = ['saturday', 'sunday','monday','tuesday','wednesday','thursday','friday'];

    $requestDays = request()->get('day');
    if (!is_array($requestDays)) {
        $requestDays = [$requestDays];
    }
?>

<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
    <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('public.time')); ?></h3>

    <div class="mt-35">
        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-checkbox mb-20 full-checkbox w-100">
                <input type="checkbox" name="day[]" value="<?php echo e($day); ?>" class="custom-control-input" id="day_<?php echo e($day); ?>" <?php echo e((in_array($day, $requestDays)) ? 'checked' : ''); ?>>
                <label class="custom-control-label font-14 w-100" for="day_<?php echo e($day); ?>"><?php echo e(trans('panel.'.$day)); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="form-group">
        <label class="form-label"><?php echo e(trans('update.time_range')); ?></label>
        <div
            class="range wrunner-value-bottom"
            id="timeRangeInstructorPage"
            data-minLimit="0"
            data-maxLimit="23"
        >
            <input type="hidden" name="min_time" value="<?php echo e(request()->get('min_time') ?? null); ?>">
            <input type="hidden" name="max_time" value="<?php echo e(request()->get('max_time') ?? null); ?>">
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\components\time_filter.blade.php ENDPATH**/ ?>