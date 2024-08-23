<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <div class="d-flex-center flex-column empty-cart-container">
                    <div class="empty-cart-icon">
                        <img src="/assets/default/img/cart/empty.svg" alt="<?php echo e(trans('update.cart_is_empty')); ?>" class="img-fluid">
                    </div>

                    <h1 class="mt-30 font-20 font-weight-bold text-secondary"><?php echo e(trans('update.cart_is_empty')); ?></h1>
                    <p class="mt-5 font-14 text-gray"><?php echo e(trans('update.explore_the_platform_and_add_some_items_to_the_cart')); ?></p>


                    <?php if(!empty($cartDiscount)): ?>
                        <?php echo $__env->make('web.default.cart.includes.cart_discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\cart\empty_cart.blade.php ENDPATH**/ ?>