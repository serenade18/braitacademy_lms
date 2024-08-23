<?php
    $restrictionSettings = getRestrictionSettings();
?>

<?php $__env->startSection('content'); ?>
    <section class="maintenance-section mt-25 mb-50 position-relative">
        <div class="container">
            <div class="d-flex-center flex-column">
                <?php if(!empty($restrictionSettings['image'])): ?>
                    <div class="maintenance-image">
                        <img src="<?php echo e($restrictionSettings['image']); ?>" alt="<?php echo e($restrictionSettings['title']); ?>" class="img-cover">
                    </div>
                <?php endif; ?>

                <?php if(!empty($restrictionSettings['title'])): ?>
                    <h1 class="font-36 font-weight-bold mt-10"><?php echo e($restrictionSettings['title']); ?></h1>
                <?php endif; ?>

                <?php if(!empty($restrictionSettings['description'])): ?>
                    <p class="font-14 font-weight-500 text-gray mt-15"><?php echo nl2br($restrictionSettings['description']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', ['appFooter' => false, 'appHeader' => false, 'justMobileApp' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\restriction\index.blade.php ENDPATH**/ ?>