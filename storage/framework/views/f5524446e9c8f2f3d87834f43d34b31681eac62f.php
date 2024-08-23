<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container pt-50 mt-10">
        <div class="text-center">
            <h1 class="font-36"><?php echo e(trans('update.select_an_installment_plan')); ?></h1>
            <p class="mt-10 font-16 text-gray"><?php echo e(trans('update.please_select_an_installment_plan_in_order_to_finalize_your_purchase')); ?></p>
        </div>

        <div class="d-flex align-items-center flex-column flex-lg-row mt-50 border rounded-lg p-15 p-lg-25">
            <div class="default-package-icon">
                <img src="/assets/default/img/become-instructor/default.png" class="img-cover" alt="<?php echo e(trans('update.installment_overview')); ?>" width="176" height="144">
            </div>

            <div class="ml-lg-25 w-100 mt-20 mt-lg-0">
                <h2 class="font-24 font-weight-bold text-dark-blue"><?php echo e($overviewTitle); ?></h2>

                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="check-square" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e(handlePrice($cash)); ?> <?php echo e(trans('update.cash')); ?></span>
                    </div>

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="menu" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e($plansCount); ?> <?php echo e(trans('update.installment_plans')); ?></span>
                    </div>

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="dollar-sign" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e(handlePrice($minimumAmount)); ?> <?php echo e(trans('update.minimum_installment_amount')); ?></span>
                    </div>

                </div>
            </div>
        </div>

        <?php $__currentLoopData = $installments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installmentRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('web.default.installment.card',['installment' => $installmentRow, 'itemPrice' => $itemPrice, 'itemId' => $itemId, 'itemType' => $itemType], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/assets/default/js/parts/installment_verify.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\installment\plans.blade.php ENDPATH**/ ?>