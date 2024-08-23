<div class="row align-items-center input-group mt-2">
    <div class="col-4">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('admin/main.title')); ?></label>
            <input type="text" name="steps[<?php echo e(!empty($step) ? $step->id : 'record'); ?>][title]" required="required" value="<?php echo e((!empty($step) and !empty($step->translate($selectedLocale))) ? $step->translate($selectedLocale)->title : ''); ?>" class="form-control"/>
        </div>
    </div>

    <div class="col-3">
        <div class="form-group ">
            <label class="input-label"><?php echo e(trans('update.deadline')); ?></label>
            <input type="number" name="steps[<?php echo e(!empty($step) ? $step->id : 'record'); ?>][deadline]" min="0" value="<?php echo e(!empty($step) ? $step->deadline : ''); ?>" class="form-control"/>
        </div>
    </div>

    <div class="col-4">
        <div class="row">
            <div class="col-6">
                <div class="form-group ">
                    <label class="input-label"><?php echo e(trans('admin/main.amount')); ?></label>
                    <input type="number" name="steps[<?php echo e(!empty($step) ? $step->id : 'record'); ?>][amount]" min="1" value="<?php echo e(!empty($step) ? $step->amount : ''); ?>" class="form-control"/>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group ">
                    <label class="input-label"><?php echo e(trans('update.amount_type')); ?></label>
                    <select name="steps[<?php echo e(!empty($step) ? $step->id : 'record'); ?>][amount_type]" class="form-control">
                        <option value="fixed_amount" <?php echo e((!empty($step) and $step->amount_type == 'fixed_amount') ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                        <option value="percent" <?php echo e((!empty($step) and $step->amount_type == 'percent') ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-1 text-left">
        <button type="button" class="js-remove-btn btn btn-danger"><i class="fa fa-times"></i></button>
    </div>
</div>


<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\create\includes\installment_step_inputs.blade.php ENDPATH**/ ?>