<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>


<div class="tab-pane mt-3 fade  <?php if(request()->get('tab') == "currency"): ?> active show <?php endif; ?>" id="currency" role="tabpanel" aria-labelledby="currency-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$currencySettingsName); ?>">


                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('update.default_currency')); ?></label>
                    <select name="value[currency]" class="form-control select2" data-placeholder="<?php echo e(trans('admin/main.currency')); ?>">
                        <option value=""></option>
                        <?php $__currentLoopData = currenciesLists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currencyListItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php if((!empty($itemValue) and !empty($itemValue['currency'])) and $itemValue['currency'] == $key): ?> selected <?php endif; ?> ><?php echo e($currencyListItem); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('update.currency_position')); ?></label>
                    <select name="value[currency_position]" class="form-control">
                        <?php $__currentLoopData = \App\Models\Currency::$currencyPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($position); ?>" <?php if((!empty($itemValue) and !empty($itemValue['currency_position'])) and $itemValue['currency_position'] == $position): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_position_'.$position)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('update.currency_separator')); ?></label>
                    <select name="value[currency_separator]" class="form-control">
                        <option value="dot" <?php if((!empty($itemValue) and !empty($itemValue['currency_separator'])) and $itemValue['currency_separator'] == 'dot'): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_separator_dot')); ?></option>
                        <option value="comma" <?php if((!empty($itemValue) and !empty($itemValue['currency_separator'])) and $itemValue['currency_separator'] == 'comma'): ?> selected <?php endif; ?> ><?php echo e(trans('update.currency_separator_comma')); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('update.currency_decimal')); ?></label>
                    <input type="number" name="value[currency_decimal]" class="form-control" min="0" max="3" value="<?php echo e((!empty($itemValue) and !empty($itemValue['currency_decimal'])) ? $itemValue['currency_decimal'] : 0); ?>">
                </div>


                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[multi_currency]" value="0">
                        <input type="checkbox" name="value[multi_currency]" id="multiCurrencySwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['multi_currency']) and $itemValue['multi_currency']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="multiCurrencySwitch"><?php echo e(trans('update.enable_multi_currency')); ?></label>
                    </label>
                </div>

                <section class="js-multi-currency-section mt-3 <?php echo e((!empty($itemValue) and !empty($itemValue['multi_currency'])) ? : "d-none"); ?>">
                    <div class="d-flex justify-content-between align-items-center pb-2">
                        <h2 class="section-title after-line"><?php echo e(trans('update.currencies')); ?></h2>

                        <button id="add_multi_currency" type="button" class="btn btn-primary btn-sm ml-2"><?php echo e(trans('update.add_currency')); ?></button>
                    </div>

                    <ul class="draggable-currency-lists mb-5" data-order-table="currencies">

                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-id="<?php echo e($currencyItem->id); ?>" class="quiz-question-card d-flex align-items-center mt-4">
                                <div class="flex-grow-1">
                                    <h4 class="font-16 text-black font-weight-500 text-dark mb-0"><?php echo e(currenciesLists($currencyItem->currency)); ?></h4>
                                    <div class="font-12 mt-1 question-infos"><?php echo e(trans('update.exchange_rate')); ?>: <?php echo e($currencyItem->exchange_rate); ?></div>
                                </div>

                                <div class="move-icon mr-10 cursor-pointer">
                                    <i class="fa fa-arrows-alt" height="25"></i>
                                </div>

                                <div class="btn-group dropdown table-actions">
                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>


                                    <div class="dropdown-menu text-left">
                                        <button type="button" data-path="<?php echo e(getAdminPanelUrl("/settings/financial/currency/{$currencyItem->id}/edit")); ?>" class="js-edit-currency font-14 btn-transparent d-block"><?php echo e(trans('public.edit')); ?></button>

                                        <?php echo $__env->make('admin.includes.delete_button',[
                                          'url' => getAdminPanelUrl("/settings/financial/currency/{$currencyItem->id}/delete"),
                                          'btnClass' => 'btn-sm btn-transparent d-block text-danger mt-1' ,
                                          'btnText' => trans('public.delete')
                                          ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </section>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>


<?php echo $__env->make('admin.settings.financial.currency_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>
    <script src="/assets/default/js/admin/settings/currencies.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\currency.blade.php ENDPATH**/ ?>