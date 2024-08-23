<div class="special-offer-card d-flex flex-column flex-md-row align-items-center justify-content-between rounded-lg shadow-xs bg-white p-15 p-md-30">
    <div class="d-flex flex-column">
        <strong class="special-offer-title font-16 text-dark-blue font-weight-bold"><?php echo e(trans('panel.special_offer')); ?></strong>
        <span class="font-14 text-gray"><?php echo e($activeSpecialOffer->name); ?></span>
    </div>

    <div class="mt-20 mt-md-0 mb-30 mb-md-0">
        <?php
            $remainingTimes = $activeSpecialOffer->getRemainingTimes()
        ?>
        <div id="offerCountDown" class="d-flex time-counter-down"
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
    </div>

    <div class="offer-percent-box d-flex flex-column align-items-center justify-content-center">
        <span class="percent text-white"><?php echo e($activeSpecialOffer->percent); ?>%</span>
        <span class="off text-white"><?php echo e(trans('public.off')); ?></span>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\special_offer.blade.php ENDPATH**/ ?>