<?php $__env->startSection('content'); ?>
    <div class="container mt-20 my-50">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8">
                <div class="installment-request-card d-flex align-items-center justify-content-center flex-column border rounded-lg">
                    <img src="/assets/default/img/course/course_access_denied.svg" alt="<?php echo e(trans('update.access_denied')); ?>" width="267" height="265">

                    <h1 class="font-20 mt-30"><?php echo e(trans('update.access_denied')); ?></h1>
                    <p class="font-14 text-gray mt-5"><?php echo e(trans('update.this_course_is_not_accessible_publicly_at_this_moment')); ?></p>

                    <a href="/" class="btn btn-primary mt-15"><?php echo e(trans('update.back_to_home')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\not_access.blade.php ENDPATH**/ ?>