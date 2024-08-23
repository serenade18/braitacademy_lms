<?php
    $basicSetting = $settings->where('name', \App\Models\Setting::$registrationBonusSettingsName)->first();
    $basicValue = !empty($basicSetting) ? $basicSetting->value : null;

    if (!empty($basicValue)) {
        $basicValue = json_decode($basicValue, true);
    }
?>

<div class="row">
    <div class="col-12 col-md-6">
        <form action="<?php echo e(getAdminPanelUrl('/registration_bonus/settings')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="page" value="general">
            <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationBonusSettingsName); ?>">
            <input type="hidden" name="locale" value="<?php echo e(\App\Models\Setting::$defaultSettingsLocale); ?>">

            <?php
                $switchs = ['status', 'unlock_registration_bonus_instantly', 'unlock_registration_bonus_with_referral'];
            ?>


            <div class="form-group custom-switches-stacked ">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[status]" value="0">
                    <input type="checkbox" name="value[status]" id="statusSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['status']) and $basicValue['status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.registration_bonus_setting_active_hint')); ?></div>
            </div>

            <div class="form-group custom-switches-stacked ">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[unlock_registration_bonus_instantly]" value="0">
                    <input type="checkbox" name="value[unlock_registration_bonus_instantly]" id="unlock_registration_bonus_instantlySwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly']) and $basicValue['unlock_registration_bonus_instantly']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="unlock_registration_bonus_instantlySwitch"><?php echo e(trans('update.unlock_registration_bonus_instantly')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.unlock_registration_bonus_instantly_hint')); ?></div>
            </div>

            <div class="js-unlock-registration-bonus-with-referral-field form-group custom-switches-stacked <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly'])) ? 'd-none' : ''); ?>">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[unlock_registration_bonus_with_referral]" value="0">
                    <input type="checkbox" name="value[unlock_registration_bonus_with_referral]" id="unlock_registration_bonus_with_referralSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral']) and $basicValue['unlock_registration_bonus_with_referral']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="unlock_registration_bonus_with_referralSwitch"><?php echo e(trans('update.unlock_registration_bonus_with_referral')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.unlock_registration_bonus_with_referral_hint')); ?></div>
            </div>

            <div class="js-number-of-referred-users-field form-group <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral'])) ? '' : 'd-none'); ?>">
                <label><?php echo e(trans('update.number_of_referred_users')); ?></label>
                <input type="number" name="value[number_of_referred_users]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['number_of_referred_users'])) ? $basicValue['number_of_referred_users'] : old('number_of_referred_users')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.number_of_referred_users_hint')); ?></div>
            </div>

            <div class="js-enable-referred-users-purchase-field form-group custom-switches-stacked <?php echo e((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_instantly'])) ? 'd-none' : ((!empty($basicValue) and !empty($basicValue['unlock_registration_bonus_with_referral'])) ? '' : 'd-none')); ?>">
                <label class="custom-switch pl-0 d-flex align-items-center">
                    <input type="hidden" name="value[enable_referred_users_purchase]" value="0">
                    <input type="checkbox" name="value[enable_referred_users_purchase]" id="enable_referred_users_purchaseSwitch" value="1" <?php echo e((!empty($basicValue) and !empty($basicValue['enable_referred_users_purchase']) and $basicValue['enable_referred_users_purchase']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                    <span class="custom-switch-indicator"></span>
                    <label class="custom-switch-description mb-0 cursor-pointer" for="enable_referred_users_purchaseSwitch"><?php echo e(trans('update.enable_referred_users_purchase')); ?></label>
                </label>

                <div class="text-muted text-small"><?php echo e(trans('update.enable_referred_users_purchase_hint')); ?></div>
            </div>

            <div class="js-purchase-amount-for-unlocking-bonus-field form-group <?php echo e((!empty($basicValue) and !empty($basicValue['enable_referred_users_purchase'])) ? '' : 'd-none'); ?>">
                <label><?php echo e(trans('update.purchase_amount_for_unlocking_bonus')); ?></label>
                <input type="number" name="value[purchase_amount_for_unlocking_bonus]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['purchase_amount_for_unlocking_bonus'])) ? $basicValue['purchase_amount_for_unlocking_bonus'] : old('purchase_amount_for_unlocking_bonus')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.purchase_amount_for_unlocking_bonus_hint')); ?></div>
            </div>

            <div class="form-group">
                <label><?php echo e(trans('update.registration_bonus_amount')); ?></label>
                <input type="number" name="value[registration_bonus_amount]" value="<?php echo e((!empty($basicValue) and !empty($basicValue['registration_bonus_amount'])) ? $basicValue['registration_bonus_amount'] : old('registration_bonus_amount')); ?>" class="form-control"/>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.registration_bonus_amount_hint')); ?></div>
            </div>

            <div class="form-group">
                <label><?php echo e(trans('update.bonus_wallet')); ?></label>
                <select name="value[bonus_wallet]" class="form-control">
                    <option value="income_wallet" <?php echo e((!empty($basicValue) and !empty($basicValue['bonus_wallet']) and $basicValue['bonus_wallet'] == "income_wallet") ? 'selected' : ''); ?>><?php echo e(trans('update.income_wallet')); ?></option>
                    <option value="balance_wallet" <?php echo e((!empty($basicValue) and !empty($basicValue['bonus_wallet']) and $basicValue['bonus_wallet'] == "balance_wallet") ? 'selected' : ''); ?>><?php echo e(trans('update.balance_wallet')); ?></option>
                </select>
                <div class="text-muted text-small mt-1"><?php echo e(trans('update.bonus_wallet_hint')); ?></div>
            </div>


            <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
        </form>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\registration_bonus\settings\basic_tab.blade.php ENDPATH**/ ?>