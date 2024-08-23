<?php $__env->startSection('formContent'); ?>

    <div class="d-flex-center flex-column">
        <div class="">
            <img src="<?php echo e($form->tank_you_message_image); ?>" alt="<?php echo e($form->tank_you_message_title); ?>" class="img-fluid">
        </div>

        <h3 class="font-24 mt-30"><?php echo e($form->tank_you_message_title); ?></h3>
    </div>

    <div class="forms-body-welcome-message white-space-pre-wrap mt-15 font-14 text-gray"><?php echo e($form->tank_you_message_description); ?></div>

    <div class="d-flex-center mt-20">
        <a href="/" class="btn btn-primary"><?php echo e(trans('update.back_to_home')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.forms.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forms\tanks.blade.php ENDPATH**/ ?>