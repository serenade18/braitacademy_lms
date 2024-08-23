<div class="d-none" id="exchangePointsModal">
    <h3 class="section-title font-16 text-dark-blue mb-25"><?php echo e(trans('update.exchange_points')); ?></h3>

    <div class="text-center">
        <img src="/assets/default/img/rewards/wallet.png" class="exchange-points-modal-img" alt="wallet">

        <p class="font-14 font-weight-500 text-gray mt-30">
            <span class="d-block"><?php echo e(trans('update.you_will_get_n_for_points',['amount' => handlePrice($earnByExchange) ,'points' => $availablePoints])); ?></span>
            <span class="d-block"><?php echo e(trans('update.the_amount_will_be_charged_to_your_wallet')); ?></span>
            <span class="d-block"><?php echo e(trans('update.do_you_want_to_proceed')); ?></span>
        </p>
    </div>

    <div class="d-flex align-items-center mt-25">
        <button type="button" class="js-apply-exchange btn btn-primary btn-sm flex-grow-1"><?php echo e(trans('update.exchange')); ?></button>
        <button type="button" class="close-swl btn btn-danger ml-15 btn-sm flex-grow-1"><?php echo e(trans('public.close')); ?></button>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\rewards\exchange_modal.blade.php ENDPATH**/ ?>