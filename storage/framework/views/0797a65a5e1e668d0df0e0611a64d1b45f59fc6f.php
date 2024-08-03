<div id="multiCurrencyModal" class="<?php echo e(empty($editCurrency) ? 'd-none' : ''); ?>">
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('update.multi_currency')); ?></h2>

        <div class="currency-form" data-action="<?php echo e(getAdminPanelUrl("/settings/financial/currency")); ?>">
            <?php if(!empty($editCurrency)): ?>
                <input type="hidden" name="item_id" value="<?php echo e($editCurrency->id); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('admin/main.currency')); ?></label>
                <select name="currency" class="js-ajax-currency form-control js-select2" data-placeholder="<?php echo e(trans('admin/main.currency')); ?>">
                    <option value=""></option>
                    <?php $__currentLoopData = currenciesLists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currencyListItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php if(!empty($editCurrency) and $editCurrency->currency == $key): ?> selected <?php endif; ?> ><?php echo e($currencyListItem); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('update.currency_position')); ?></label>
                <select name="currency_position" class="js-ajax-currency_position form-control">
                    <?php $__currentLoopData = \App\Models\Currency::$currencyPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($position); ?>" <?php if(!empty($editCurrency) and $editCurrency->currency_position == $position): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_position_'.$position)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('update.currency_separator')); ?></label>
                <select name="currency_separator" class="js-ajax-currency_separator form-control">
                    <option value="dot" <?php if(!empty($editCurrency) and $editCurrency->currency_separator == 'dot'): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_separator_dot')); ?></option>
                    <option value="comma" <?php if(!empty($editCurrency) and $editCurrency->currency_separator == 'comma'): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_separator_comma')); ?></option>
                </select>

                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('update.currency_decimal')); ?></label>
                <input type="number" name="currency_decimal" class="js-ajax-currency_decimal form-control" min="0" max="3" value="<?php echo e((!empty($editCurrency) and !empty($editCurrency->currency_decimal)) ? $editCurrency->currency_decimal : 0); ?>">

                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('update.exchange_rate')); ?></label>
                <input type="number" name="exchange_rate" class="js-ajax-exchange_rate form-control" value="<?php echo e((!empty($editCurrency) and !empty($editCurrency->exchange_rate)) ? $editCurrency->exchange_rate : 0); ?>">
                <div class="invalid-feedback"></div>

                <p class="mt-1 text-muted font-12"><?php echo e(trans('update.insert_the_selected_currency_exchange_rate_to_the_default_currency',['sign' => $currency])); ?></p>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <button type="button" class="save-currency btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/financial/currency_modal.blade.php ENDPATH**/ ?>