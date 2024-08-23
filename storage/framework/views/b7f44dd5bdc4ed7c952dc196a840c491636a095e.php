<div class="gift-webinar-card bg-white">
    <figure>
        <div class="image-box">
            <a href="<?php echo e($bundle->getUrl()); ?>">
                <img src="<?php echo e($bundle->getImage()); ?>" class="img-cover" alt="<?php echo e($bundle->title); ?>">
            </a>
        </div>

        <figcaption class="mt-10">
            <div class="user-inline-avatar d-flex align-items-center">
                <div class="avatar bg-gray200">
                    <img src="<?php echo e($bundle->teacher->getAvatar()); ?>" class="img-cover" alt="<?php echo e($bundle->teacher->full_name); ?>">
                </div>
                <a href="<?php echo e($bundle->teacher->getProfileUrl()); ?>" target="_blank" class="user-name ml-5 font-14"><?php echo e($bundle->teacher->full_name); ?></a>
            </div>

            <a href="<?php echo e($bundle->getUrl()); ?>">
                <h3 class="mt-15 webinar-title font-weight-bold font-16 text-dark-blue"><?php echo e(clean($bundle->title,'title')); ?></h3>
            </a>

            <?php if($bundle->getRate()): ?>
                <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $bundle->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="webinar-price-box mt-15">
                <?php if(!empty($bundle->price) and $bundle->price > 0): ?>
                    <?php if($bundle->bestTicket() < $bundle->price): ?>
                        <span class="real"><?php echo e(handlePrice($bundle->bestTicket())); ?></span>
                        <span class="off ml-10"><?php echo e(handlePrice($bundle->price)); ?></span>
                    <?php else: ?>
                        <span class="real"><?php echo e(handlePrice($bundle->price)); ?></span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="real font-14"><?php echo e(trans('public.free')); ?></span>
                <?php endif; ?>
            </div>
        </figcaption>
    </figure>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\gift\bundle_card.blade.php ENDPATH**/ ?>