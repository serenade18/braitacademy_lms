<?php $__env->startSection('formContent'); ?>

    <div class="d-flex-center flex-column">
        <div class="forms-body-welcome-image">
            <img src="/assets/default/img/forms/already_submitted.svg" alt="<?php echo e(trans("update.already_submitted")); ?>" class="h-100">
        </div>

        <h3 class="font-24 mt-30"><?php echo e(trans("update.already_submitted")); ?></h3>
        <div class="forms-body-welcome-message white-space-pre-wrap mt-10 font-14 text-gray"><?php echo e(trans("update.you_have_submitted_this_form_already_and_you_can_not_fill_it_in_again...")); ?></div>

        <a href="/" class="btn btn-primary mt-20"><?php echo e(trans('update.back_to_home')); ?></a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.forms.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forms\already_submitted.blade.php ENDPATH**/ ?>