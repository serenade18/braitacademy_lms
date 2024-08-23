<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/chartjs/chart.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $registrationBonusSettings = getRegistrationBonusSettings();
        $checkReferralUserCount = (!empty($registrationBonusSettings['unlock_registration_bonus_with_referral']) and !empty($registrationBonusSettings['number_of_referred_users']));
        $purchaseAmountCount = (!empty($registrationBonusSettings['enable_referred_users_purchase']));
    ?>

    <?php if(!empty($accounting)): ?>
        <div class="d-flex align-items-center mb-20 p-15 success-transparent-alert">
            <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
                <i data-feather="credit-card" width="18" height="18" class=""></i>
            </div>
            <div class="ml-10">
                <div class="font-14 font-weight-bold "><?php echo e(trans('update.you_got_the_bonus')); ?></div>
                <div class="font-12 "><?php echo e(trans('update.your_registration_bonus_was_unlocked_on_date',['date' => dateTimeFormat($accounting->created_at, 'j M Y')])); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <section class="">
        <h2 class="section-title"><?php echo e(trans('update.registration_bonus')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/36.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($registrationBonusSettings['registration_bonus_amount'] ?? 0)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.registration_bonus')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/rank.png" width="64" height="64" alt="">
                        <strong class="font-36 font-weight-bold mt-5 <?php echo e(!empty($accounting) ? 'text-primary' : 'text-danger'); ?>"><?php echo e(!empty($accounting) ? trans('update.unlocked') : trans('update.locked')); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bonus_status')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/computer.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(!empty($accounting) ? dateTimeFormat($accounting->created_at, 'j M Y') : '-'); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bonus_date')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="row">

        <?php if($checkReferralUserCount or $purchaseAmountCount): ?>
            <div class="col-12 col-md-6 mt-25">
                <div class="p-15 rounded-sm panel-shadow bg-white h-100">
                    <div class="row">
                        <div class="col-5 d-flex align-items-center justify-content-center">
                            <img src="/assets/default/img/rewards/registration_bonus.png" class="img-fluid" alt="<?php echo e(trans('update.registration_bonus')); ?>">
                        </div>

                        <div class="col-7">
                            <h4 class="font-16 font-weight-bold"><?php echo e(trans('update.bonus_status')); ?></h4>

                            <p class="mt-10 font-14 font-weight-500 text-gray"><?php echo e(trans('update.your_bonus_is_locked_To_unlock_the_bonus_please_check_the_following_statuses')); ?>:</p>

                            <?php if(!empty($registrationBonusSettings['number_of_referred_users'])): ?>
                                <div class="d-flex align-items-center position-relative mt-15 p-15 border border-gray200 rounded-lg">
                                    <div class="bonus-status-pie-charts">
                                        <canvas id="bonusStatusReferredUsersChart" height="40"></canvas>
                                    </div>

                                    <div class="ml-5">
                                        <span class="d-block font-14 font-weight-bold text-gray"><?php echo e(trans('update.referred_users')); ?></span>
                                        <span class="d-block font-12 text-gray"><?php echo e($bonusStatusReferredUsersChart['complete'] == 0 ? trans('update.you_havent_referred_any_users') : trans('update.you_referred_count_users_to_the_platform',['count' => "{$bonusStatusReferredUsersChart['referred_users']}/{$registrationBonusSettings['number_of_referred_users']}"])); ?></span>
                                    </div>

                                    <?php if($bonusStatusReferredUsersChart['complete'] == 100): ?>
                                        <div class="bonus-status-complete-check">
                                            <i data-feather="check" class="text-white" width="12" height="12"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($purchaseAmountCount): ?>
                                <div class="d-flex align-items-center position-relative mt-15 p-15 border border-gray200 rounded-lg">
                                    <div class="bonus-status-pie-charts">
                                        <canvas id="bonusStatusUsersPurchasesChart" height="40"></canvas>
                                    </div>

                                    <div class="ml-5">
                                        <span class="d-block font-14 font-weight-bold text-gray"><?php echo e(trans('update.users_purchases')); ?></span>
                                        <span class="d-block font-12 text-gray"><?php echo e($bonusStatusUsersPurchasesChart['complete'] == 0 ? trans('update.you_havent_referred_any_users_to_purchase') : trans('update.count_users_achieved_purchase_target',['count' => "{$bonusStatusUsersPurchasesChart['reached_user_purchased']}/{$bonusStatusUsersPurchasesChart['total_user_purchased']}"])); ?></span>
                                    </div>

                                    <?php if($bonusStatusUsersPurchasesChart['complete'] == 100): ?>
                                        <div class="bonus-status-complete-check">
                                            <i data-feather="check" class="text-white" width="12" height="12"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $registrationBonusTermsSettings = getRegistrationBonusTermsSettings();
        ?>

        <?php if(!empty($registrationBonusTermsSettings) and !empty($registrationBonusTermsSettings['items'])): ?>
            <div class="mt-25 <?php echo e((!empty($registrationBonusSettings['number_of_referred_users']) or !empty($registrationBonusSettings['purchase_amount_for_unlocking_bonus'])) ? 'col-12 col-md-6' : 'col-12'); ?>">
                <div class="p-15 rounded-sm panel-shadow bg-white h-100">
                    <div class="row">
                        <div class="col-7">
                            <h4 class="font-16 font-weight-bold mb-20"><?php echo e(trans('update.how_to_get_bonus')); ?></h4>

                            <?php $__currentLoopData = $registrationBonusTermsSettings['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $termItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($termItem['icon']) and !empty($termItem['title']) and !empty($termItem['description'])): ?>
                                    <div class="how-to-get-bonus-items d-flex align-items-start">
                                        <div class="icon-box d-flex align-items-center justify-content-center">
                                            <img src="<?php echo e($termItem['icon']); ?>" alt="<?php echo e($termItem['title']); ?>" width="16" height="16">
                                        </div>
                                        <div class="ml-10">
                                            <span class="d-block font-14 font-weight-bold text-dark"><?php echo e($termItem['title']); ?></span>
                                            <span class="d-block font-12 font-weight-500 text-gray mt-5"><?php echo e($termItem['description']); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <?php if(!empty($registrationBonusTermsSettings['term_image'])): ?>
                            <div class="col-5 d-flex align-items-center justify-content-center">
                                <img src="<?php echo e($registrationBonusTermsSettings['term_image']); ?>" class="img-fluid" alt="<?php echo e(trans('update.how_to_get_bonus')); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <?php if($checkReferralUserCount): ?>
        <section class="mt-25">
            <h2 class="section-title"><?php echo e(trans('update.referral_history')); ?></h2>

            <?php if(!empty($referredUsers) and count($referredUsers)): ?>
                <div class="panel-section-card py-20 px-25 mt-20">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="table-responsive">
                                <table class="table text-center custom-table">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(trans('panel.user')); ?></th>
                                        <?php if($purchaseAmountCount): ?>
                                            <th class="text-center"><?php echo e(trans('update.purchase_status')); ?></th>
                                        <?php endif; ?>
                                        <th class="text-right"><?php echo e(trans('panel.registration_date')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $referredUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left">
                                                <div class="user-inline-avatar d-flex align-items-center">
                                                    <div class="avatar bg-gray200">
                                                        <img src="<?php echo e($user->getAvatar()); ?>" class="img-cover" alt="<?php echo e($user->full_name); ?>">
                                                    </div>
                                                    <div class=" ml-5">
                                                        <span class="d-block font-weight-500"><?php echo e($user->full_name); ?></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <?php if($purchaseAmountCount): ?>
                                                <td>
                                                    <?php if((!empty($registrationBonusSettings['purchase_amount_for_unlocking_bonus']) and $user->totalPurchase >= $registrationBonusSettings['purchase_amount_for_unlocking_bonus']) or (empty($registrationBonusSettings['purchase_amount_for_unlocking_bonus']) and $user->totalPurchase > 0)): ?>
                                                        <span class="font-16 font-weight-500 text-primary"><?php echo e(trans('update.reached')); ?></span>
                                                    <?php else: ?>
                                                        <span class="font-16 font-weight-500 text-dark"><?php echo e(trans('update.not_reached')); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>

                                            <td class="text-right"><?php echo e(dateTimeFormat($user->created_at, 'Y M j | H:i')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="no-result my-50 d-flex align-items-center justify-content-center flex-column">
                    <div class="no-result-logo">
                        <img src="/assets/default/img/no-results/no_followers.png" alt="<?php echo e(trans('update.no_referred_users')); ?>">
                    </div>
                    <div class="d-flex align-items-center flex-column mt-30 text-center">
                        <h2><?php echo e(trans('update.no_referred_users')); ?></h2>
                        <p class="mt-5 text-center"><?php echo e(trans('update.you_havent_referred_any_users_yet')); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>
    <script src="/assets/default/js/panel/registration_bonus.min.js"></script>

    <script>
        (function ($) {
            "use strict";

            <?php if(!empty($bonusStatusReferredUsersChart)): ?>
            makePieChart('bonusStatusReferredUsersChart', <?php echo json_encode($bonusStatusReferredUsersChart['labels'], 15, 512) ?>, Number(<?php echo e($bonusStatusReferredUsersChart['complete']); ?>));
            <?php endif; ?>

            <?php if(!empty($bonusStatusUsersPurchasesChart)): ?>
            makePieChart('bonusStatusUsersPurchasesChart', <?php echo json_encode($bonusStatusUsersPurchasesChart['labels'], 15, 512) ?>, Number(<?php echo e($bonusStatusUsersPurchasesChart['complete']); ?>));
            <?php endif; ?>
        })()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\marketing\registration_bonus.blade.php ENDPATH**/ ?>