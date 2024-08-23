<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body ">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/payment_channels/<?php echo e((!empty($paymentChannel) ? $paymentChannel->id.'/update':'store')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo e(trans('admin/main.title')); ?></label>
                                            <input type="text" name="title"
                                                   class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(!empty($paymentChannel) ? $paymentChannel->title : old('title')); ?>"
                                                   placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>
                                            <?php $__errorArgs = ['title'];
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
                                            <label><?php echo e(trans('update.class_dev')); ?></label>
                                            <input type="text" disabled name="class_name"
                                                   class="form-control  <?php $__errorArgs = ['class_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(!empty($paymentChannel) ? $paymentChannel->class_name : old('class_name')); ?>"/>
                                            <?php $__errorArgs = ['class_name'];
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
                                            <label class="input-label"><?php echo e(trans('public.image')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image" data-preview="holder">
                                                        <i class="fa fa-upload"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="image" id="image" value="<?php echo e(!empty($paymentChannel->image) ? $paymentChannel->image : old('image')); ?>" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                                <div class="input-group-append">
                                                    <button type="button" class="input-group-text admin-file-view" data-input="image">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>

                                                <?php $__errorArgs = ['image'];
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
                                        </div>

                                        <?php if(!empty($credentialItems)): ?>
                                            <div class="payment-channel-credentials-card border mb-3">
                                                <h5 class="mb-2"><?php echo e(trans('update.channel_credentials')); ?></h5>

                                                <?php $__currentLoopData = $credentialItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credentialItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-group">
                                                        <label><?php echo e($credentialItem); ?></label>
                                                        <input type="text" name="credentials[<?php echo e($credentialItem); ?>]"
                                                               class="form-control"
                                                               value="<?php echo e((!empty($paymentChannel) and !empty($paymentChannel->credentials) and !empty($paymentChannel->credentials[$credentialItem])) ? $paymentChannel->credentials[$credentialItem] : ''); ?>"/>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="form-group custom-switches-stacked mb-0">
                                                    <label class="custom-switch pl-0">
                                                        <input type="hidden" name="credentials[test_mode]" value="">
                                                        <input type="checkbox" name="credentials[test_mode]" id="test_modeSwitch" value="on" class="custom-switch-input" <?php echo e((!empty($paymentChannel) and !empty($paymentChannel->credentials) and !empty($paymentChannel->credentials['test_mode'])) ? 'checked' : ''); ?>/>
                                                        <span class="custom-switch-indicator"></span>
                                                        <label class="custom-switch-description mb-0 cursor-pointer" for="test_modeSwitch"><?php echo e(trans('update.test_mode')); ?></label>
                                                    </label>
                                                </div>

                                            </div>
                                        <?php endif; ?>

                                        <?php
                                            $selectedCurrency = !empty($paymentChannel->currencies) ? $paymentChannel->currencies : [];
                                        ?>

                                        <?php if(!empty($currencies) and count($currencies)): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('update.supported_currencies')); ?></label>
                                                <select name="currencies[]" class="form-control select2" multiple>
                                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($currencyItem->currency); ?>" <?php echo e(in_array($currencyItem->currency, $selectedCurrency) ? 'selected' : ''); ?>><?php echo e(currenciesLists($currencyItem->currency)); ?> (<?php echo e(currencySign($currencyItem->currency)); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['currency'];
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
                                        <?php else: ?>
                                            <input type="hidden" name="currencies[]" value="<?php echo e(getDefaultCurrency()); ?>">
                                        <?php endif; ?>


                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0">
                                                <input type="hidden" name="status" value="inactive">
                                                <input type="checkbox" name="status" id="statusSwitch" value="active" <?php echo e((!empty($paymentChannel) and $paymentChannel->status == 'active') ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4"><?php echo e(trans('admin/main.save_change')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\payment_channel\create.blade.php ENDPATH**/ ?>