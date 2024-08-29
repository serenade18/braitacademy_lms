<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="course-private-content text-center w-100 border rounded-lg">
            <div class="course-private-content-icon m-auto">
                <img src="/assets/default/img/course/private_content_icon.svg" alt="private content icon" class="img-cover">
            </div>

            <?php if(!empty($userNotAccess) and $userNotAccess): ?>
                <div class="mt-30">
                    <h2 class="font-20 text-dark-blue"><?php echo e(trans('update.not_access_to_content')); ?></h2>
                    <p class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.not_access_to_content_hint')); ?></p>
                </div>
            <?php else: ?>
                <div class="mt-30">
                    <h2 class="font-20 font-weight-bold text-dark-blue"><?php echo e(trans('update.private_content')); ?></h2>
                    <p class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.private_content_login_hint')); ?></p>
                </div>

                <a href="/login" class="btn btn-primary mt-15"><?php echo e(trans('auth.login')); ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/course/private_content.blade.php ENDPATH**/ ?>