<div class="row mt-15">
    <div class="col-12 col-md-4">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('admin/main.amount')); ?></label>
            <input type="number" name="amount" value="<?php echo e(!empty($rule) ? $rule->amount : old('amount')); ?>" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <?php $__errorArgs = ['amount'];
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

    <div class="col-12 col-md-4">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('update.amount_type')); ?></label>
            <select name="amount_type" class="js-amount-type-select form-control">
                <option value="fixed_amount" <?php echo e((!empty($rule) and $rule->amount_type == 'fixed_amount') ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                <option value="percent" <?php echo e((!empty($rule) and $rule->amount_type == 'percent') ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
            </select>
            <?php $__errorArgs = ['amount_type'];
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
</div>

<div class="row">
    <div class="col-12 col-md-6">

        <div class="js-apply-cashback-per-item form-group <?php echo e((empty($rule) or $rule->amount_type == 'fixed_amount') ? '' : 'd-none'); ?>">
            <div class="d-flex align-items-center">
                <label class="" for="perItemSwitch"><?php echo e(trans('update.apply_cashback_per_item')); ?></label>
                <div class="custom-control custom-switch ml-3">
                    <input type="checkbox" name="apply_cashback_per_item" class="custom-control-input" id="perItemSwitch" <?php echo e((!empty($rule) && $rule->apply_cashback_per_item) ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="perItemSwitch"></label>
                </div>
            </div>
            <p class="font-12 text-muted mt-1"><?php echo e(trans('update.apply_cashback_per_item_hint')); ?></p>
        </div>


        <div class="js-max-amount-field form-group <?php echo e((!empty($rule) and $rule->amount_type == 'percent') ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('admin/main.max_amount')); ?></label>
            <input type="number" name="max_amount" value="<?php echo e(!empty($rule) ? $rule->max_amount : old('max_amount')); ?>" class="form-control <?php $__errorArgs = ['max_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_max_amount_hint')); ?></div>
            <?php $__errorArgs = ['max_amount'];
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
            <label class="input-label"><?php echo e(trans('admin/main.min_amount')); ?></label>
            <input type="number" name="min_amount" value="<?php echo e(!empty($rule) ? $rule->min_amount : old('min_amount')); ?>" class="form-control <?php $__errorArgs = ['min_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <div class="text-muted text-small mt-1"><?php echo e(trans('update.cashback_min_amount_hint')); ?></div>
            <?php $__errorArgs = ['min_amount'];
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
</div>

<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\create\includes\payment.blade.php ENDPATH**/ ?>