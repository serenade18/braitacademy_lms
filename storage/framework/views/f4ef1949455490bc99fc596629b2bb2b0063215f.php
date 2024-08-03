<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<div class="tab-pane mt-3 fade " id="referral" role="tabpanel" aria-labelledby="referral-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="financial">
                <input type="hidden" name="name" value="referral">


                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[status]" value="0">
                        <input type="checkbox" name="value[status]" id="referralStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['status']) and $itemValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="referralStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                    </label>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.referral_hint')); ?></div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0 d-flex align-items-center">
                        <input type="hidden" name="value[users_affiliate_status]" value="0">
                        <input type="checkbox" name="value[users_affiliate_status]" id="userReferralStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['users_affiliate_status']) and $itemValue['users_affiliate_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="userReferralStatusSwitch"><?php echo e(trans('admin/main.active_users_affiliate_when_registration')); ?>                       </label>
                    </label>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.active_referral_new_users_hint')); ?></div>
                </div>


                <div class="form-group">
                    <label><?php echo e(trans('admin/main.affiliate_user_commission')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-percentage"></i>
                            </div>
                        </div>
                        <input type="number" name="value[affiliate_user_commission]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['affiliate_user_commission'])) ? $itemValue['affiliate_user_commission'] : old('affiliate_user_commission')); ?>" class="form-control text-center <?php $__errorArgs = ['affiliate_user_commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="3" min="0" max="100"/>

                        <?php $__errorArgs = ['affiliate_user_commission'];
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

                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.affiliate_user_commission_hint')); ?></div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.store_affiliate_user_commission')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-percentage"></i>
                            </div>
                        </div>
                        <input type="number" name="value[store_affiliate_user_commission]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['store_affiliate_user_commission'])) ? $itemValue['store_affiliate_user_commission'] : old('store_affiliate_user_commission')); ?>" class="form-control text-center <?php $__errorArgs = ['store_affiliate_user_commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="3" min="0" max="100"/>

                        <?php $__errorArgs = ['store_affiliate_user_commission'];
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

                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.store_affiliate_user_commission_hint')); ?></div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.affiliate_user_amount')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <input type="number" name="value[affiliate_user_amount]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['affiliate_user_amount'])) ? $itemValue['affiliate_user_amount'] : old('affiliate_user_amount')); ?>" class="form-control text-center" maxlength="8" min="0" />
                    </div>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.affiliate_user_amount_hint')); ?></div>
                </div>


                <div class="form-group">
                    <label><?php echo e(trans('admin/main.referred_user_amount')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <input type="number" name="value[referred_user_amount]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['referred_user_amount'])) ? $itemValue['referred_user_amount'] : old('referred_user_amount')); ?>" class="form-control text-center" maxlength="8" min="0" />
                    </div>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.referred_user_amount_hint')); ?></div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.referral_description')); ?></label>
                    <textarea name="value[referral_description]" class="form-control" rows="6" placeholder=""><?php echo e((!empty($itemValue) and !empty($itemValue['referral_description'])) ? $itemValue['referral_description'] : old('referral_description')); ?></textarea>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.referral_description_hint')); ?></div>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/financial/referral.blade.php ENDPATH**/ ?>