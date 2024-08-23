<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>


<div class="tab-pane mt-3 fade <?php if(request()->get('tab') == "commissions"): ?> active show <?php endif; ?>" id="commissions" role="tabpanel" aria-labelledby="commissions-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$commissionSettingsName); ?>">


                <?php $__currentLoopData = \App\Models\UserCommission::$sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commissionSource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label class="mb-0"><?php echo e(trans("update.{$commissionSource}_commission")); ?></label>

                        <div class="row">
                            <div class="col-6">
                                <label class=""><?php echo e(trans("admin/main.type")); ?></label>
                                <select name="value[<?php echo e($commissionSource); ?>][type]" class="js-commission-type-input form-control" data-currency="<?php echo e($currency); ?>">
                                    <option value="percent" <?php echo e((!empty($itemValue) and !empty($itemValue[$commissionSource]) and !empty($itemValue[$commissionSource]['type']) and $itemValue[$commissionSource]['type'] == "percent") ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
                                    <option value="fixed_amount" <?php echo e((!empty($itemValue) and !empty($itemValue[$commissionSource]) and !empty($itemValue[$commissionSource]['type']) and $itemValue[$commissionSource]['type'] == "fixed_amount") ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                                </select>
                            </div>

                            <div class="col-6">
                                <div class="">
                                    <label class="">
                                        <?php echo e(trans("update.value")); ?>


                                        <span class="ml-1 js-commission-value-span"><?php if(!empty($itemValue) and !empty($itemValue[$commissionSource]) and !empty($itemValue[$commissionSource]['type'])): ?> (<?php echo e(($itemValue[$commissionSource]['type'] == "percent") ? '%' : $currency); ?>) <?php else: ?>  <?php endif; ?></span>
                                    </label>

                                    <input type="number" name="value[<?php echo e($commissionSource); ?>][value]" value="<?php echo e((!empty($itemValue) and !empty($itemValue[$commissionSource]) and !empty($itemValue[$commissionSource]['value'])) ? $itemValue[$commissionSource]['value'] : ''); ?>" class="js-commission-value-input form-control text-center" />
                                </div>
                            </div>
                        </div>

                        <div class="text-muted text-small mt-1"><?php echo e(trans("update.{$commissionSource}_commission_hint")); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\commission.blade.php ENDPATH**/ ?>