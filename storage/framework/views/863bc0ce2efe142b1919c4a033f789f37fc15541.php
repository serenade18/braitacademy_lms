<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="forms-hero position-relative" <?php if(!empty($form->cover)): ?> style="background-image: url('<?php echo e($form->cover); ?>')" <?php endif; ?>>
        <div class="forms-hero-mask"></div>

        <div class="forms-hero-content container user-select-none position-relative">
            <h1 class="font-36 text-white text-center"><?php echo e($form->title); ?></h1>
        </div>
    </div>

    <div class="forms-body container bg-white p-20">
        <?php echo $__env->yieldContent("formContent"); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/assets/default/js/parts/forms.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forms\layout.blade.php ENDPATH**/ ?>