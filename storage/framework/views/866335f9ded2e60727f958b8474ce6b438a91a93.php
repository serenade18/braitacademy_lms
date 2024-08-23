<?php
    $maintenanceSettings = getMaintenanceSettings();
    $endDate = !empty($maintenanceSettings['end_date']) ? $maintenanceSettings['end_date'] : null;

    $remainingTimes = null;

    if (!empty($endDate) and is_numeric($endDate)) {
        $remainingTimes = time2string($endDate -  time());
    }
?>

<?php $__env->startSection('content'); ?>
    <section class="maintenance-section mt-25 mb-50 position-relative">
        <div class="container">
            <div class="d-flex-center flex-column">
                <?php if(!empty($maintenanceSettings['image'])): ?>
                    <div class="maintenance-image">
                        <img src="<?php echo e($maintenanceSettings['image']); ?>" alt="<?php echo e($maintenanceSettings['title']); ?>" class="img-cover">
                    </div>
                <?php endif; ?>

                <?php if(!empty($maintenanceSettings['title'])): ?>
                    <h1 class="font-36 font-weight-bold mt-10"><?php echo e($maintenanceSettings['title']); ?></h1>
                <?php endif; ?>

                <?php if(!empty($maintenanceSettings['description'])): ?>
                    <p class="font-14 font-weight-500 text-gray mt-15"><?php echo nl2br($maintenanceSettings['description']); ?></p>
                <?php endif; ?>

                <?php if(!empty($remainingTimes)): ?>
                    <div id="maintenanceCountDown" class="d-flex time-counter-down mt-15"
                         data-day="<?php echo e($remainingTimes['day']); ?>"
                         data-hour="<?php echo e($remainingTimes['hour']); ?>"
                         data-minute="<?php echo e($remainingTimes['minute']); ?>"
                         data-second="<?php echo e($remainingTimes['second']); ?>">

                        <div class="d-flex align-items-center flex-column mr-10">
                            <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item days"></span>
                            <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.day')); ?></span>
                        </div>
                        <div class="d-flex align-items-center flex-column mr-10">
                            <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item hours"></span>
                            <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.hr')); ?></span>
                        </div>
                        <div class="d-flex align-items-center flex-column mr-10">
                            <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item minutes"></span>
                            <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.min')); ?></span>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <span class="bg-gray300 rounded p-10 font-16 font-weight-bold text-dark time-item seconds"></span>
                            <span class="font-12 mt-1 text-gray"><?php echo e(trans('public.sec')); ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($maintenanceSettings['maintenance_button']) and !empty($maintenanceSettings['maintenance_button']['title']) and !empty($maintenanceSettings['maintenance_button']['link'])): ?>
                    <a href="<?php echo e($maintenanceSettings['maintenance_button']['link']); ?>" class="btn btn-primary mt-20"><?php echo e($maintenanceSettings['maintenance_button']['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/js/parts/maintenance.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', ['appFooter' => false, 'appHeader' => false, 'justMobileApp' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\maintenance\index.blade.php ENDPATH**/ ?>