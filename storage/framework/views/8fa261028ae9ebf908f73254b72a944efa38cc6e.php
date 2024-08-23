<section>
    <h2 class="section-title after-line mt-2 mb-4"><?php echo e(trans('public.extra_information')); ?></h2>

    <div class="row">
    <div class="col-12 col-md-6 mt-15">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.price')); ?> (<?php echo e($currency); ?>)</label>
            <input type="number" name="price" value="<?php echo e(!empty($product) ? $product->price : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
            <?php $__errorArgs = ['price'];
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

        <?php if($product->isPhysical()): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('update.delivery_fee')); ?></label>
                <input type="number" name="delivery_fee" value="<?php echo e(!empty($product) ? $product->delivery_fee : old('delivery_fee')); ?>" class="form-control <?php $__errorArgs = ['delivery_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('update.0_for_free_delivery')); ?>"/>
                <?php $__errorArgs = ['delivery_fee'];
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
                <label class="input-label"><?php echo e(trans('update.delivery_estimated_time')); ?> (<?php echo e(trans('public.day')); ?>)</label>
                <input type="number" name="delivery_estimated_time" value="<?php echo e(!empty($product) ? $product->delivery_estimated_time : old('delivery_estimated_time')); ?>" class="form-control <?php $__errorArgs = ['delivery_estimated_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['delivery_estimated_time'];
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
        <?php endif; ?>

        <div class="form-group js-inventory-inputs <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'd-none' : ''); ?>">
            <label class="input-label"><?php echo e(trans('update.inventory')); ?></label>
            <input type="number" name="inventory" value="<?php echo e((!empty($product) and $product->getAvailability() != 99999) ? $product->getAvailability() : old('inventory')); ?>" class="form-control <?php $__errorArgs = ['inventory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <?php $__errorArgs = ['inventory'];
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

        <div class="form-group js-inventory-inputs <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'd-none' : ''); ?>">
            <label class="input-label"><?php echo e(trans('update.inventory_warning')); ?></label>
            <input type="number" name="inventory_warning" value="<?php echo e(!empty($product) ? $product->inventory_warning : old('inventory_warning')); ?>" class="form-control <?php $__errorArgs = ['inventory_warning'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.inventory_warning_hint')); ?></div>
            <?php $__errorArgs = ['inventory_warning'];
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

        
        <?php if(!empty($product)): ?>
            <?php echo $__env->make('admin.product_badges.content_include', ['itemTarget' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="form-group mb-1 d-flex align-items-center">
            <label class="cursor-pointer mb-0 input-label mr-2" for="unlimitedInventorySwitch"><?php echo e(trans('update.unlimited_inventory')); ?></label>
            <div class="custom-control custom-switch d-inline-block">
                <input type="checkbox" name="unlimited_inventory" class="custom-control-input" id="unlimitedInventorySwitch" <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'checked' :  ''); ?>>
                <label class="custom-control-label" for="unlimitedInventorySwitch"></label>
            </div>
        </div>

        <p class="text-gray font-12"><?php echo e(trans('update.create_product_unlimited_inventory_hint')); ?></p>

    </div>
</div>

</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\create\extra_information.blade.php ENDPATH**/ ?>