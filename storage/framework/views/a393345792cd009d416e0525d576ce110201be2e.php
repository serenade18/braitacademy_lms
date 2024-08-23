<div class="row mt-15">
    <div class="col-12 col-md-6">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('update.upfront')); ?></label>
            <input type="number" name="upfront" value="<?php echo e(!empty($installment) ? $installment->upfront : old('upfront')); ?>" class="form-control <?php $__errorArgs = ['upfront'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
            <?php $__errorArgs = ['upfront'];
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

    <div class="col-12 col-md-6">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('update.upfront_type')); ?></label>
            <select name="upfront_type" class="form-control">
                <option value="fixed_amount" <?php echo e((!empty($installment) and $installment->upfront_type == 'fixed_amount') ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                <option value="percent" <?php echo e((!empty($installment) and $installment->upfront_type == 'percent') ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
            </select>
            <?php $__errorArgs = ['upfront_type'];
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

<div class="row mt-20">
    <div class="col-12">

        
        <div id="installmentStepsCard" class="mt-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="font-16 text-dark"><?php echo e(trans('update.payment_steps')); ?></h5>

                        <button type="button" class="js-add-btn btn btn-success ml-3">
                            <i class="fa fa-plus"></i>
                            <?php echo e(trans('update.add_step')); ?>

                        </button>
                    </div>
                </div>
            </div>

            <?php if(!empty($installment) and !empty($installment->steps)): ?>
                <?php
                    $installmentSteps = explode(',', $installment->options);
                ?>
                <?php $__currentLoopData = $installment->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stepRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('admin.financial.installments.create.includes.installment_step_inputs',['step' => $stepRow], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>

    </div>
</div>

<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\create\includes\payment.blade.php ENDPATH**/ ?>