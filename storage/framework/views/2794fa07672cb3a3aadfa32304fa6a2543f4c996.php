<?php $__env->startSection('body'); ?>
    <!-- content -->
    <td valign="top" class="bodyContent" mc:edit="body_content">
        <h1 class="h1"><?php echo e($confirm['title']); ?></h1>
        <p><?php echo nl2br($confirm['message']); ?></p>

        <p class="code"><?php echo e($confirm['code']); ?></p>

        <p><?php echo e(trans('notification.email_ignore_msg')); ?></p>
    </td>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/emails/confirmCode.blade.php ENDPATH**/ ?>