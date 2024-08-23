<div class="text-left">
    <h3 class="section-title font-16 text-dark-blue mb-25"><?php echo e(trans('update.upgrade_your_plan')); ?></h3>

    <div class="text-center">
        <img src="/assets/default/img/icons/diamond.png" class="buy-with-points-modal-img" alt="diamond">

        <p class="font-14 font-weight-500 text-gray mt-30">
            <span class="d-block"><?php echo e(trans('update.your_account_limited')); ?></span>
            <span class="d-block"><?php echo e(trans('update.your_account_'. $type .'_limited_hint')); ?></span>
            <?php if(!empty($currentCount)): ?>
                <span class="d-block"><?php echo e(trans('update.your_current_plan_'.$type,['count' => $currentCount])); ?></span>
            <?php endif; ?>
        </p>
    </div>

    <div class="d-flex align-items-center mt-25">
        <a href="/panel/financial/registration-packages" class="btn btn-primary btn-sm flex-grow-1"><?php echo e(trans('update.upgrade')); ?></a>
        <button type="button" class="btn btn-outline-danger ml-15 btn-sm flex-grow-1 close-swl"><?php echo e(trans('public.cancel')); ?></button>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\financial\package_limitation_modal.blade.php ENDPATH**/ ?>