<?php $__env->startSection('formContent'); ?>

    <div class="d-flex-center flex-column">
        <div class="forms-body-welcome-image">
            <img src="/assets/default/img/forms/please_login.svg" alt="<?php echo e(trans("update.access_denied")); ?>" class="h-100">
        </div>

        <h3 class="font-24 mt-30"><?php echo e(trans("update.access_denied")); ?></h3>

        <?php if(empty($form->end_date)): ?>
            <div class="forms-body-welcome-message white-space-pre-wrap mt-10 font-14 text-gray"><?php echo e(trans("update.you_can_fill_out_this_form_from_date",['date' => dateTimeFormat($form->start_date, 'j M Y')])); ?></div>
        <?php else: ?>
            <div class="forms-body-welcome-message white-space-pre-wrap mt-10 font-14 text-gray"><?php echo e(trans("update.you_can_fill_out_this_form_from_date_to_end_date",['date' => dateTimeFormat($form->start_date, 'j M Y'), 'end_date' => dateTimeFormat($form->end_date, 'j M Y')])); ?></div>
        <?php endif; ?>

        <a href="/" class="btn btn-primary mt-20"><?php echo e(trans('update.back_to_home')); ?></a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.forms.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forms\not_start.blade.php ENDPATH**/ ?>