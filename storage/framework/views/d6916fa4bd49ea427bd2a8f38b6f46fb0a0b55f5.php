<?php $__env->startSection('body'); ?>
    <!-- content -->
    <td valign="top" class="bodyContent" mc:edit="body_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><?php echo e(trans('auth.verify_your_email_address')); ?></div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <?php echo e(trans('auth.verification_link_has_been_sent_to_your_email')); ?>

                            </div>
                            <a href="<?php echo e(url('/reset-password/'.$token.'?email='.$email)); ?>"><?php echo e(trans('auth.click_here')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\auth\password_verify.blade.php ENDPATH**/ ?>