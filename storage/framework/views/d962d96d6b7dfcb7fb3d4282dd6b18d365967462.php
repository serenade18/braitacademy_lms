<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-50">
        <div class="text-center">
            <h1 class="font-36 font-weight-bold text-dark"><?php echo e($pageTitle); ?></h1>
            <p class="font-16 text-gray mt-10"><?php echo e($titleHint); ?></p>
        </div>

        <div class="mt-50 rounded-lg border border-gray300">
            <div class="row">
                <div class="col-12 col-md-6 px-30 px-lg-80 py-30 py-lg-50 border-right">
                    <h3 class="font-24 font-weight-bold mb-25"><?php echo e(trans('update.recipient_information')); ?></h3>

                    <form action="/gift/<?php echo e($itemType); ?>/<?php echo e($item->slug); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('auth.name')); ?>:</label>
                            <input name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('auth.email')); ?>:</label>
                            <input name="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.gift_date')); ?>:</label>
                            <input name="date" type="text" class="form-control datetimepicker <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="off">
                            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.message_to_recipient_(optional)')); ?>:</label>
                            <textarea name="description" rows="5" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-20"><?php echo e(trans('update.proceed_to_checkout')); ?></button>
                    </form>
                </div>

                <div class="col-12 col-md-6 d-flex-center px-30 px-lg-80 py-30 py-lg-50">
                    <div class="gift-item-card d-flex">

                        <?php if($itemType == 'course'): ?>
                            <?php echo $__env->make('web.default.gift.course_card',['webinar' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif($itemType == 'bundle'): ?>
                            <?php echo $__env->make('web.default.gift.bundle_card',['bundle' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php elseif($itemType == 'product'): ?>
                            <?php echo $__env->make('web.default.gift.product_card',['product' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div class="gift-item-card-icon">
                            <img src="/assets/default/img/gift/gift.svg" alt="gift">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/parts/gifts.min.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\gift\index.blade.php ENDPATH**/ ?>