<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    
    <?php if(!empty($cashbackRules) and count($cashbackRules)): ?>
        <?php $__currentLoopData = $cashbackRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashbackRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex align-items-center mb-20 p-15 success-transparent-alert <?php echo e($classNames ?? ''); ?>">
                <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
                    <i data-feather="credit-card" width="18" height="18" class=""></i>
                </div>

                <div class="ml-10">
                    <div class="font-14 font-weight-bold "><?php echo e(trans('update.get_cashback')); ?></div>

                    <div class="font-12 "><?php echo e(trans('update.by_charging_your_wallet_will_get_amount_as_cashback',['amount' => ($cashbackRule->amount_type == 'percent' ? "%{$cashbackRule->amount}" : handlePrice($cashbackRule->amount))])); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>



    <?php if(!empty($registrationBonusAmount)): ?>
        <div class="mb-25 d-flex align-items-center justify-content-between p-15 bg-white panel-shadow">
            <div class="d-flex align-items-center">
                <img src="/assets/default/img/icons/money.png" alt="money" width="51" height="51">

                <div class="ml-15">
                    <span class="d-block font-16 text-dark font-weight-bold"><?php echo e(trans('update.unlock_registration_bonus')); ?></span>
                    <span class="d-block font-14 text-gray font-weight-500 mt-5"><?php echo e(trans('update.your_wallet_includes_amount_registration_bonus_This_amount_is_locked',['amount' => handlePrice($registrationBonusAmount)])); ?></span>
                </div>
            </div>

            <a href="/panel/marketing/registration_bonus" class="btn btn-border-gray300"><?php echo e(trans('update.view_more')); ?></a>
        </div>
    <?php endif; ?>

    <section>
        <h2 class="section-title"><?php echo e(trans('financial.account_summary')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/36.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($accountCharge ? handlePrice($accountCharge) : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.account_charge')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/37.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($readyPayout ? handlePrice($readyPayout) : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.ready_to_payout')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/38.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalIncome ? handlePrice($totalIncome) : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.total_income')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php if(\Session::has('msg')): ?>
        <div class="alert alert-warning">
            <ul>
                <li><?php echo \Session::get('msg'); ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <?php
        $showOfflineFields = false;
        if ($errors->has('date') or $errors->has('referral_code') or $errors->has('account') or !empty($editOfflinePayment)) {
            $showOfflineFields = true;
        }

        $isMultiCurrency = !empty(getFinancialCurrencySettings('multi_currency'));
        $userCurrency = currency();
        $invalidChannels = [];
    ?>

    <section class="mt-30">
        <h2 class="section-title"><?php echo e(trans('financial.select_the_payment_gateway')); ?></h2>

        <form action="/panel/financial/<?php echo e(!empty($editOfflinePayment) ? 'offline-payments/'. $editOfflinePayment->id .'/update' : 'charge'); ?>" method="post" enctype="multipart/form-data" class="mt-25">
            <?php echo e(csrf_field()); ?>


            <?php if($errors->has('gateway')): ?>
                <div class="text-danger mb-3"><?php echo e($errors->first('gateway')); ?></div>
            <?php endif; ?>

            <div class="row">
                <?php $__currentLoopData = $paymentChannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentChannel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$isMultiCurrency or (!empty($paymentChannel->currencies) and in_array($userCurrency, $paymentChannel->currencies))): ?>
                        <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                            <input type="radio" class="online-gateway" name="gateway" id="<?php echo e($paymentChannel->class_name); ?>" <?php if(old('gateway') == $paymentChannel->class_name): ?> checked <?php endif; ?> value="<?php echo e($paymentChannel->class_name); ?>">
                            <label for="<?php echo e($paymentChannel->class_name); ?>" class="rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo e($paymentChannel->image); ?>" width="120" height="60" alt="">
                                <p class="mt-30 font-14 font-weight-500 text-dark-blue"><?php echo e(trans('financial.pay_via')); ?>

                                    <span class="font-weight-bold"><?php echo e($paymentChannel->title); ?></span>
                                </p>
                            </label>
                        </div>
                    <?php else: ?>
                        <?php
                            $invalidChannels[] = $paymentChannel;
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(!empty(getOfflineBankSettings('offline_banks_status'))): ?>
                    <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                        <input type="radio" name="gateway" id="offline" value="offline" <?php if(old('gateway') == 'offline' or !empty($editOfflinePayment)): ?> checked <?php endif; ?>>
                        <label for="offline" class="rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                            <img src="/assets/default/img/activity/pay.svg" width="120" height="60" alt="">
                            <p class="mt-30 font-14 font-weight-500 text-dark-blue"><?php echo e(trans('financial.pay_via')); ?>

                                <span class="font-weight-bold"><?php echo e(trans('financial.offline')); ?></span>
                            </p>
                        </label>
                    </div>
                <?php endif; ?>
            </div>

            <?php if(!empty($invalidChannels) and empty(getFinancialSettings("hide_disabled_payment_gateways"))): ?>
                <div class="d-flex align-items-center rounded-lg border p-15">
                    <div class="size-40 d-flex-center rounded-circle bg-gray200">
                        <i data-feather="gift" class="text-gray" width="20" height="20"></i>
                    </div>
                    <div class="ml-5">
                        <h4 class="font-14 font-weight-bold text-gray"><?php echo e(trans('update.disabled_payment_gateways')); ?></h4>
                        <p class="font-12 text-gray"><?php echo e(trans('update.disabled_payment_gateways_hint')); ?></p>
                    </div>
                </div>

                <div class="row mt-20">
                    <?php $__currentLoopData = $invalidChannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invalidChannel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                            <div class="disabled-payment-channel bg-white border rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                                <img src="<?php echo e($invalidChannel->image); ?>" width="120" height="60" alt="">

                                <p class="mt-30 mt-lg-50 font-weight-500 text-dark-blue">
                                    <?php echo e(trans('financial.pay_via')); ?>

                                    <span class="font-weight-bold font-14"><?php echo e($invalidChannel->title); ?></span>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div class="">
                <h3 class="section-title mb-20"><?php echo e(trans('financial.finalize_payment')); ?></h3>

                <div class="row">
                    <div class="col-12 col-lg-3 mb-25 mb-lg-0">
                        <label class="font-weight-500 font-14 text-dark-blue d-block"><?php echo e(trans('panel.amount')); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white font-16">
                                    
                                    <?php echo e($currency); ?>

                                </span>
                            </div>
                            <input type="number" name="amount" min="0" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(!empty($editOfflinePayment) ? $editOfflinePayment->amount : old('amount')); ?>"
                                   placeholder="<?php echo e(trans('panel.number_only')); ?>"/>
                            <div class="invalid-feedback"><?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input " style="<?php echo e((!$showOfflineFields) ? 'display:none' : ''); ?>">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('financial.account')); ?></label>
                            <select name="account" class="form-control <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option selected disabled><?php echo e(trans('financial.select_the_account')); ?></option>

                                <?php $__currentLoopData = $offlineBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($offlineBank->id); ?>" <?php if(!empty($editOfflinePayment) and $editOfflinePayment->offline_bank_id == $offlineBank->id): ?> selected <?php endif; ?>><?php echo e($offlineBank->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input " style="<?php echo e((!$showOfflineFields) ? 'display:none' : ''); ?>">
                        <div class="form-group">
                            <label for="referralCode" class="input-label"><?php echo e(trans('admin/main.referral_code')); ?></label>
                            <input type="text" name="referral_code" id="referralCode" value="<?php echo e(!empty($editOfflinePayment) ? $editOfflinePayment->reference_number : old('referral_code')); ?>" class="form-control <?php $__errorArgs = ['referral_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            <?php $__errorArgs = ['referral_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"> <?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input " style="<?php echo e((!$showOfflineFields) ? 'display:none' : ''); ?>">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.date_time')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="dateRangeLabel">
                                        <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                    </span>
                                </div>
                                <input type="text" name="date" value="<?php echo e(!empty($editOfflinePayment) ? dateTimeFormat($editOfflinePayment->pay_date, 'Y-m-d H:i', false) : old('date')); ?>" class="form-control datetimepicker <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       aria-describedby="dateRangeLabel"/>
                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"> <?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input " style="<?php echo e((!$showOfflineFields) ? 'display:none' : ''); ?>">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.attach_the_payment_photo')); ?></label>

                            <label for="attachmentFile" id="attachmentFileLabel" class="custom-upload-input-group">
                                <span class="custom-upload-icon text-white">
                                    <i data-feather="upload" width="18" height="18" class="text-white"></i>
                                </span>
                                <div class="custom-upload-input"></div>
                            </label>

                            <input type="file" name="attachment" id="attachmentFile"
                                   class="form-control h-auto invisible-file-input <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value=""/>
                            <?php $__errorArgs = ['attachment'];
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

                    <div class="col-12 col-lg-3">
                        <div class="mt-30">
                            <button type="button" id="submitChargeAccountForm" class="btn btn-primary btn-sm"><?php echo e(trans('public.pay')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="mt-40">
        <h2 class="section-title"><?php echo e(trans('financial.bank_accounts_information')); ?></h2>

        <div class="row mt-25">
            <?php $__currentLoopData = $offlineBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineBank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-3 mb-30 mb-lg-0">
                    <div class="py-25 px-20 rounded-sm panel-shadow d-flex flex-column align-items-center justify-content-center">
                        <img src="<?php echo e($offlineBank->logo); ?>" width="120" height="60" alt="">

                        <div class="mt-15 mt-30 w-100">

                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-14 font-weight-500 text-secondary"><?php echo e(trans('public.name')); ?>:</span>
                                <span class="font-14 font-weight-500 text-gray"><?php echo e($offlineBank->title); ?></span>
                            </div>

                            <?php $__currentLoopData = $offlineBank->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex align-items-center justify-content-between mt-10">
                                    <span class="font-14 font-weight-500 text-secondary"><?php echo e($specification->name); ?>:</span>
                                    <span class="font-14 font-weight-500 text-gray"><?php echo e($specification->value); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <?php if($offlinePayments->count() > 0): ?>
        <section class="mt-40">
            <h2 class="section-title"><?php echo e(trans('financial.offline_transactions_history')); ?></h2>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(trans('financial.bank')); ?></th>
                                    <th><?php echo e(trans('admin/main.referral_code')); ?></th>
                                    <th class="text-center"><?php echo e(trans('panel.amount')); ?> (<?php echo e($currency); ?>)</th>
                                    <th class="text-center"><?php echo e(trans('update.attachment')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-right"><?php echo e(trans('public.controls')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $offlinePayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlinePayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <div class="d-flex flex-column">

                                                <?php if(!empty($offlinePayment->offlineBank)): ?>
                                                    <span class="font-weight-500 text-dark-blue"><?php echo e($offlinePayment->offlineBank->title); ?></span>
                                                <?php else: ?>
                                                    <span class="font-weight-500 text-dark-blue">-</span>
                                                <?php endif; ?>
                                                <span class="font-12 text-gray"><?php echo e(dateTimeFormat($offlinePayment->pay_date, 'j M Y H:i')); ?></span>
                                            </div>
                                        </td>
                                        <td class="text-left align-middle">
                                            <span><?php echo e($offlinePayment->reference_number); ?></span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="font-16 font-weight-bold text-primary"><?php echo e(handlePrice($offlinePayment->amount, false)); ?></span>
                                        </td>

                                        <td class="text-center align-middle">
                                            <?php if(!empty($offlinePayment->attachment)): ?>
                                                <a href="<?php echo e($offlinePayment->getAttachmentPath()); ?>" target="_blank" class="text-primary"><?php echo e(trans('public.view')); ?></a>
                                            <?php else: ?>
                                                ---
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center align-middle">
                                            <?php switch($offlinePayment->status):
                                                case (\App\Models\OfflinePayment::$waiting): ?>
                                                    <span class="text-warning"><?php echo e(trans('public.waiting')); ?></span>
                                                    <?php break; ?>
                                                <?php case (\App\Models\OfflinePayment::$approved): ?>
                                                    <span class="text-primary"><?php echo e(trans('financial.approved')); ?></span>
                                                    <?php break; ?>
                                                <?php case (\App\Models\OfflinePayment::$reject): ?>
                                                    <span class="text-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                    <?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td class="text-right align-middle">
                                            <?php if($offlinePayment->status != 'approved'): ?>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="more-vertical" height="20"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="/panel/financial/offline-payments/<?php echo e($offlinePayment->id); ?>/edit"
                                                           class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>
                                                        <a href="/panel/financial/offline-payments/<?php echo e($offlinePayment->id); ?>/delete" data-item-id="1"
                                                           class="webinar-actions d-block mt-10 delete-action"><?php echo e(trans('public.delete')); ?></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    <?php else: ?>

        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
            'file_name' => 'offline.png',
            'title' => trans('financial.offline_no_result'),
            'hint' => nl2br(trans('financial.offline_no_result_hint')),
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/panel/financial/account.min.js"></script>

    <script>
        (function ($) {
            "use strict";

            <?php if(session()->has('sweetalert')): ?>
            Swal.fire({
                icon: "<?php echo e(session()->get('sweetalert')['status'] ?? 'success'); ?>",
                html: '<h3 class="font-20 text-center text-dark-blue py-25"><?php echo e(session()->get('sweetalert')['msg'] ?? ''); ?></h3>',
                showConfirmButton: false,
                width: '25rem',
            });
            <?php endif; ?>
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\financial\account.blade.php ENDPATH**/ ?>