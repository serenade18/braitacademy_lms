<div class="tab-pane mt-3 fade" id="financial" role="tabpanel" aria-labelledby="financial-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id .'/financialUpdate'); ?>" method="Post">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label><?php echo e(trans('financial.account_type')); ?></label>

                    <select name="bank_id" class="js-user-bank-input form-control <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option selected disabled><?php echo e(trans('financial.select_account_type')); ?></option>

                        <?php $__currentLoopData = $userBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($userBank->id); ?>" <?php if(!empty($user) and !empty($user->selectedBank) and $user->selectedBank->user_bank_id == $userBank->id): ?> selected="selected" <?php endif; ?> data-specifications="<?php echo e(json_encode($userBank->specifications->pluck('name','id')->toArray())); ?>"><?php echo e($userBank->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['bank_id'];
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

                <div class="js-bank-specifications-card">
                    <?php if(!empty($user) and !empty($user->selectedBank) and !empty($user->selectedBank->bank)): ?>
                        <?php $__currentLoopData = $user->selectedBank->bank->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $selectedBankSpecification = $user->selectedBank->specifications->where('user_selected_bank_id', $user->selectedBank->id)->where('user_bank_specification_id', $specification->id)->first();
                            ?>
                            <div class="form-group">
                                <label class="font-weight-500 text-dark-blue"><?php echo e($specification->name); ?></label>
                                <input type="text" name="bank_specifications[<?php echo e($specification->id); ?>]" value="<?php echo e((!empty($selectedBankSpecification)) ? $selectedBankSpecification->value : ''); ?>" class="form-control"/>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>

                <div class="form-group mt-15">
                    <label class="input-label"><?php echo e(trans('financial.identity_scan')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="identity_scan" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="identity_scan" id="identity_scan" value="<?php echo e(!empty($user->identity_scan) ? $user->identity_scan : old('identity_scan')); ?>" class="form-control"/>
                        <div class="input-group-append">
                            <button type="button" class="input-group-text admin-file-view" data-input="identity_scan">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('financial.address')); ?></label>
                    <input type="text" name="address"
                           class="form-control "
                           value="<?php echo e(!empty($user) ? $user->address : old('address')); ?>"
                           placeholder="<?php echo e(trans('financial.address')); ?>"/>
                </div>

                <div class="form-group mb-0 d-flex align-items-center">
                    <div class="custom-control custom-switch d-block">
                        <input type="checkbox" name="financial_approval" class="custom-control-input" id="verifySwitch" <?php echo e((($user->financial_approval) or (old('financial_approval') == 'on')) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="verifySwitch"></label>
                    </div>
                    <label for="verifySwitch"><?php echo e(trans('admin/main.financial_approval')); ?></label>
                </div>

                <div class="form-group mb-0 d-flex align-items-center">
                    <div class="custom-control custom-switch d-block">
                        <input type="checkbox" name="enable_installments" class="custom-control-input" id="enableInstallmentsSwitch" <?php echo e((($user->enable_installments) or (old('enable_installments') == 'on')) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="enableInstallmentsSwitch"></label>
                    </div>
                    <label for="enableInstallmentsSwitch"><?php echo e(trans('update.enable_installments')); ?></label>
                </div>

                <div class="form-group mb-0 d-flex align-items-center">
                    <div class="custom-control custom-switch d-block">
                        <input type="checkbox" name="installment_approval" class="custom-control-input" id="installmentApprovalSwitch" <?php echo e((($user->installment_approval) or (old('installment_approval') == 'on')) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="installmentApprovalSwitch"></label>
                    </div>
                    <label for="installmentApprovalSwitch"><?php echo e(trans('update.installment_approval')); ?></label>
                </div>

                <div class="form-group mb-0 d-flex align-items-center">
                    <div class="custom-control custom-switch d-block">
                        <input type="checkbox" name="disable_cashback" class="custom-control-input" id="disableCashbackSwitch" <?php echo e((($user->disable_cashback) or (old('disable_cashback') == 'on')) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="disableCashbackSwitch"></label>
                    </div>
                    <label for="disableCashbackSwitch"><?php echo e(trans('update.disable_cashback')); ?></label>
                </div>

                <div class="form-group mb-0 d-flex align-items-center">
                    <div class="custom-control custom-switch d-block">
                        <input type="checkbox" name="enable_registration_bonus" class="custom-control-input" id="enable_registration_bonusSwitch" <?php echo e(($user->enable_registration_bonus) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="enable_registration_bonusSwitch"></label>
                    </div>
                    <label for="enable_registration_bonusSwitch"><?php echo e(trans('update.enable_registration_bonus')); ?></label>
                </div>

                <div class="js-registration-bonus-field form-group <?php echo e($user->enable_registration_bonus ? '' : 'd-none'); ?>">
                    <label><?php echo e(trans('update.registration_bonus_amount')); ?></label>
                    <input type="text" name="registration_bonus_amount"
                           class="form-control "
                           value="<?php echo e(!empty($user) ? $user->registration_bonus_amount : old('registration_bonus_amount')); ?>"
                           placeholder="<?php echo e(trans('update.user_registration_bonus_amount_placeholder')); ?>"/>
                </div>


                <?php if(!$user->isUser()): ?>
                    <?php
                        $commissions = $user->commissions;
                    ?>

                    <h5 class="mb-2 font-16 text-dark"><?php echo e(trans('update.commissions')); ?></h5>

                    <?php $__currentLoopData = \App\Models\UserCommission::$sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commissionSource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $commission = $commissions->where('source', $commissionSource)->first();
                            $commissionValue = null;

                            if (!empty($commission)) {
                                $commissionValue = $commission->value;

                                if ($commission->type == "fixed_amount") {
                                    $commissionValue = convertPriceToUserCurrency($commissionValue);
                                }
                            }
                        ?>

                        <div class="form-group">
                            <label class="mb-0"><?php echo e(trans("update.{$commissionSource}_commission")); ?></label>

                            <div class="row">
                                <div class="col-6">
                                    <label class=""><?php echo e(trans("admin/main.type")); ?></label>
                                    <select name="commissions[<?php echo e($commissionSource); ?>][type]" class="js-commission-type-input form-control" data-currency="<?php echo e($currency); ?>">
                                        <option value="percent" <?php echo e((!empty($commission) and $commission->type == "percent") ? 'selected' : ''); ?>><?php echo e(trans('update.percent')); ?></option>
                                        <option value="fixed_amount" <?php echo e((!empty($commission) and $commission->type == "fixed_amount") ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <div class="">
                                        <label class="">
                                            <?php echo e(trans("update.value")); ?>


                                            <span class="ml-1 js-commission-value-span">(<?php echo e(!empty($commission) ? (($commission->type == "percent") ? '%' : $currency) : '%'); ?>)</span>
                                        </label>

                                        <input type="number" name="commissions[<?php echo e($commissionSource); ?>][value]" value="<?php echo e((!empty($commissionValue)) ? $commissionValue : ''); ?>" class="js-commission-value-input form-control text-center" <?php echo e((!empty($commission) and $commission->type == "percent") ? 'maxlength="3" min="0" max="100"' : ''); ?>/>
                                    </div>
                                </div>
                            </div>

                            <div class="text-muted text-small mt-1"><?php echo e(trans("update.{$commissionSource}_commission_hint")); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class=" mt-4">
                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/users/editTabs/financial.blade.php ENDPATH**/ ?>