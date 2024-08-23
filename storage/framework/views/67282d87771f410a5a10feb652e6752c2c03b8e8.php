<?php
    $mobileAppSettings = getMobileAppSettings();

    $layoutOptions = [
        'appHeader' => false,
        'justMobileApp' => true
    ];

    if (empty($mobileAppSettings['show_app_footer'])) {
        $layoutOptions['appFooter'] = true;
    }
?>



<?php $__env->startSection('content'); ?>
    <section class="mobile-app-section my-50 position-relative">
        <div class="container mobile-app-section__container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="font-36 text-secondary font-weight-bold"><?php echo nl2br(trans('update.download_mobile_app_and_enjoy')); ?></h1>
                    <p class="mt-15 font-14 text-gray"><?php echo $mobileAppSettings['mobile_app_description'] ?? ''; ?></p>

                    <?php if(!empty($mobileAppSettings) and !empty($mobileAppSettings['mobile_app_buttons'])): ?>
                        <div class="mt-20 d-flex align-items-center flex-wrap">
                            <?php $__currentLoopData = $mobileAppSettings['mobile_app_buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobileAppButton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($mobileAppButton['link'] ?? ''); ?>" target="_blank" class="rounded-pill mobile-app__buttons btn btn-<?php echo e($mobileAppButton['color'] ?? ''); ?> <?php echo e((!empty($mobileAppButton['icon'])) ? 'has-icon' : ''); ?>">
                                    <?php if(!empty($mobileAppButton['icon'])): ?>
                                        <span class="mobile-app__button-icon rounded-circle mr-10">
                                        <img src="<?php echo e($mobileAppButton['icon']); ?>" class="img-cover rounded-circle" alt="<?php echo e($mobileAppButton['title'] ?? ''); ?>">
                                    </span>
                                    <?php endif; ?>

                                    <span class=""><?php echo e($mobileAppButton['title'] ?? ''); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="mobile-app-section__image d-flex align-items-center justify-content-center">

            <div class="bubble-one"></div>
            <div class="bubble-two"></div>
            <div class="bubble-three"></div>

            <div class="mobile-app-section__image-hero">
                <img src="/assets/default/img/home/dot.png" class="mobile-app-section__dots" alt="dots">

                <?php if(!empty($mobileAppSettings['mobile_app_hero_image'])): ?>
                    <img src="<?php echo e($mobileAppSettings['mobile_app_hero_image']); ?>" class="img-cover" alt="trans('update.download_mobile_app_and_enjoy')">
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', $layoutOptions, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\mobile_app\index.blade.php ENDPATH**/ ?>