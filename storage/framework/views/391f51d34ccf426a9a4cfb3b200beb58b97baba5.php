<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <form action="<?php echo e(getAdminPanelUrl()); ?>/store/settings" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="page" value="general">
                                        <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$storeSettingsName); ?>">

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[status]" value="0">
                                                <input type="checkbox" name="value[status]" id="storeStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['status']) and $itemValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="storeStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_store_setting_active_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.virtual_product_commission')); ?></label>
                                            <input type="number" name="value[virtual_product_commission]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['virtual_product_commission'])) ? $itemValue['virtual_product_commission'] : old('virtual_product_commission')); ?>" class="form-control text-center  <?php $__errorArgs = ['virtual_product_commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['virtual_product_commission'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.virtual_product_commission_setting_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.physical_product_commission')); ?></label>
                                            <input type="number" name="value[physical_product_commission]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['physical_product_commission'])) ? $itemValue['physical_product_commission'] : old('physical_product_commission')); ?>" class="form-control text-center  <?php $__errorArgs = ['physical_product_commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['physical_product_commission'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.physical_product_commission_setting_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('admin/main.tax')); ?></label>
                                            <input type="number" name="value[store_tax]" value="<?php echo e((!empty($itemValue) and isset($itemValue['store_tax'])) ? $itemValue['store_tax'] : old('store_tax')); ?>" class="form-control text-center  <?php $__errorArgs = ['store_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['store_tax'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.admin_store_setting_tax_hint')); ?></div>
                                        </div>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[possibility_create_virtual_product]" value="0">
                                                <input type="checkbox" name="value[possibility_create_virtual_product]" id="possibilityCreateVirtualProductSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['possibility_create_virtual_product']) and $itemValue['possibility_create_virtual_product']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="possibilityCreateVirtualProductSwitch"><?php echo e(trans('update.possibility_create_virtual_product')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.possibility_create_virtual_product_hint')); ?></div>
                                        </div>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[possibility_create_physical_product]" value="0">
                                                <input type="checkbox" name="value[possibility_create_physical_product]" id="possibilityCreatePhysicalProductSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['possibility_create_physical_product']) and $itemValue['possibility_create_physical_product']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="possibilityCreatePhysicalProductSwitch"><?php echo e(trans('update.possibility_create_physical_product')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.possibility_create_physical_product_hint')); ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo e(trans('update.shipping_tracking_url')); ?></label>
                                            <input type="text" name="value[shipping_tracking_url]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['shipping_tracking_url'])) ? $itemValue['shipping_tracking_url'] : old('shipping_tracking_url')); ?>" class="form-control  <?php $__errorArgs = ['value.shipping_tracking_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                            <?php $__errorArgs = ['value.shipping_tracking_url'];
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

                                            <div class="text-muted text-small mt-1"><?php echo e(trans('update.shipping_tracking_url_hint')); ?></div>
                                        </div>

                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[show_address_selection_in_cart]" value="0">
                                                <input type="checkbox" name="value[show_address_selection_in_cart]" id="show_address_selection_in_cart_switch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['show_address_selection_in_cart']) and $itemValue['show_address_selection_in_cart']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="show_address_selection_in_cart_switch"><?php echo e(trans('update.show_address_selection_in_cart')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_store_setting_show_address_selection_in_cart_hint')); ?></div>
                                        </div>


                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[take_address_selection_optional]" value="0">
                                                <input type="checkbox" name="value[take_address_selection_optional]" id="take_address_selection_optional_switch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['take_address_selection_optional']) and $itemValue['take_address_selection_optional']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="take_address_selection_optional_switch"><?php echo e(trans('update.take_address_selection_optional')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_store_setting_take_address_selection_optional_hint')); ?></div>
                                        </div>


                                        <div class="form-group custom-switches-stacked">
                                            <label class="custom-switch pl-0 d-flex align-items-center">
                                                <input type="hidden" name="value[activate_comments]" value="0">
                                                <input type="checkbox" name="value[activate_comments]" id="activateCommentsSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['activate_comments']) and $itemValue['activate_comments']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                                <span class="custom-switch-indicator"></span>
                                                <label class="custom-switch-description mb-0 cursor-pointer" for="activateCommentsSwitch"><?php echo e(trans('update.admin_store_setting_activate_comments')); ?></label>
                                            </label>
                                            <div class="text-muted text-small"><?php echo e(trans('update.admin_store_setting_activate_comments_hint')); ?></div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\settings.blade.php ENDPATH**/ ?>