<div class="gift-webinar-card bg-white">
    <figure>
        <div class="image-box">
            <a href="<?php echo e($product->getUrl()); ?>">
                <img src="<?php echo e($product->thumbnail); ?>" class="img-cover" alt="<?php echo e($product->title); ?>">
            </a>
        </div>

        <figcaption class="mt-10">
            <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="<?php echo e($product->creator->getAvatar()); ?>" class="img-cover" alt="<?php echo e($product->creator->full_name); ?>">
                </div>
                <a href="<?php echo e($product->creator->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($product->creator->full_name); ?></a>
            </div>

            <a href="<?php echo e($product->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($product->title, 'title')); ?></h3>
            </a>

            <?php if($product->getRate()): ?>
                <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $product->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="webinar-price-box mt-15">
                <?php if(!empty($product->price) and $product->price > 0): ?>
                    <?php if($product->getPriceWithActiveDiscountPrice() < $product->price): ?>
                        <span class="real"><?php echo e(handlePrice($product->getPriceWithActiveDiscountPrice(), true, true, false, null, true, 'store')); ?></span>
                        <span class="off ml-10"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\gift\product_card.blade.php ENDPATH**/ ?>