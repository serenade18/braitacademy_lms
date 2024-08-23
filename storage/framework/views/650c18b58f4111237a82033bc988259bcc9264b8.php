<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>



<div class="tab-pane mt-3 fade" id="offline_banks_credits" role="tabpanel" aria-labelledby="offline_banks_credits-tab">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/site_bank_accounts" method="post">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="page" value="financial">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div id="addAccountTypes">

                                    <button type="button" class="btn btn-success add-btn mb-4 fa fa-plus"></button>

                                    <div class="form-group d-flex align-items-start main-row">
                                        <div class="px-2 py-1 border flex-grow-1">

                                            <div class="form-group mt-3">
                                                <label><?php echo e(trans('admin/main.title')); ?></label>
                                                <input type="text" name="value[record][title]"
                                                       class="form-control"
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label><?php echo e(trans('admin/main.logo')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="input-group-text admin-file-manager" data-input="image_record" data-preview="holder">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="value[record][image]" id="image_record" value="" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label><?php echo e(trans('financial.card_id')); ?></label>
                                                <input type="text" name="value[record][card_id]"
                                                       class="form-control"
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label><?php echo e(trans('financial.account_id')); ?></label>
                                                <input type="text" name="value[record][account_id]"
                                                       class="form-control"
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label><?php echo e(trans('financial.iban')); ?></label>
                                                <input type="text" name="value[record][iban]"
                                                       class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger d-none"></button>
                                    </div>

                                    <?php if(!empty($itemValue)): ?>

                                        <?php if(!empty($itemValue) and is_array($itemValue)): ?>
                                            <?php $__currentLoopData = $itemValue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group d-flex align-items-start">
                                                    <div class="px-2 py-1 border flex-grow-1">

                                                        <div class="form-group mt-3">
                                                            <label><?php echo e(trans('admin/main.title')); ?></label>
                                                            <input type="text" name="value[<?php echo e($key); ?>][title]"
                                                                   class="form-control"
                                                                   value="<?php echo e($item['title'] ?? ''); ?>"
                                                            />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><?php echo e(trans('admin/main.logo')); ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image_record" data-preview="holder">
                                                                        <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </div>
                                                                <input type="text" name="value[<?php echo e($key); ?>][image]" id="image_<?php echo e($key); ?>" value="<?php echo e($item['image'] ?? ''); ?>" class="form-control"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label><?php echo e(trans('financial.card_id')); ?></label>
                                                            <input type="text" name="value[<?php echo e($key); ?>][card_id]"
                                                                   class="form-control"
                                                                   value="<?php echo e($item['card_id'] ?? ''); ?>"
                                                            />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><?php echo e(trans('financial.account_id')); ?></label>
                                                            <input type="text" name="value[<?php echo e($key); ?>][account_id]"
                                                                   class="form-control"
                                                                   value="<?php echo e($item['account_id'] ?? ''); ?>"
                                                            />
                                                        </div>

                                                        <div class="form-group">
                                                            <label><?php echo e(trans('financial.iban')); ?></label>
                                                            <input type="text" name="value[<?php echo e($key); ?>][iban]"
                                                                   class="form-control"
                                                                   value="<?php echo e($item['iban'] ?? ''); ?>"
                                                            />
                                                        </div>
                                                    </div>
                                                    <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger"></button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/settings/site_bank_accounts.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\site_bank_accounts.blade.php ENDPATH**/ ?>