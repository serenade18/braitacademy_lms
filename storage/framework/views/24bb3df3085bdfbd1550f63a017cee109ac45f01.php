<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="course-private-content text-center w-100 border rounded-lg">
            <div class="course-private-content-icon m-auto">
                <img src="/assets/default/img/course/private_content_icon.svg" alt="private content icon" class="img-cover">
            </div>

            <div class="mt-30">
                <h2 class="font-20 text-dark-blue"><?php echo e(trans('update.access_denied')); ?></h2>
                <p class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.you_have_an_overdue_installment_please_pay_it_to_access_this_course')); ?></p>

                <a href="/panel/financial/installments" class="btn btn-primary mt-15"><?php echo e(trans('update.view_installments')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\access_denied.blade.php ENDPATH**/ ?>