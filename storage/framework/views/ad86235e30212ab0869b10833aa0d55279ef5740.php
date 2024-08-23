<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="">
        <h2 class="section-title"><?php echo e(trans('panel.affiliate_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($referredUsersCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.referred_users')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/38.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($registrationBonus)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.registration_bonus')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/36.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($affiliateBonus)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.affiliate_bonus')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('panel.affiliate_summary')); ?></h2>

        <?php if(!empty($referralSettings)): ?>
            <div class="mt-15 font-14 text-gray">
                <?php if(!empty($referralSettings['affiliate_user_amount'])): ?><p>- <?php echo e(trans('panel.user_registration_reward')); ?>: <?php echo e(handlePrice($referralSettings['affiliate_user_amount'])); ?></p><?php endif; ?>
                <?php if(!empty($referralSettings['referred_user_amount'])): ?><p>- <?php echo e(trans('panel.referred_user_registration_reward')); ?>: <?php echo e(handlePrice($referralSettings['referred_user_amount'])); ?></p><?php endif; ?>
                <?php if(!empty($referralSettings['affiliate_user_commission'])): ?><p>- <?php echo e(trans('panel.referred_user_purchase_commission')); ?>: <?php echo e($referralSettings['affiliate_user_commission']); ?>%</p><?php endif; ?>
                <p>- <?php echo e(trans('panel.your_affiliate_code')); ?>: <?php echo e($affiliateCode->code); ?></p>
                <?php if(!empty($referralSettings['referral_description'])): ?><p>- <?php echo e($referralSettings['referral_description']); ?></p><?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="row mt-15">
            <div class="col-12 col-lg-5">
                <h3 class="font-16 font-weight-500"><?php echo e(trans('panel.affiliate_url')); ?></h3>

                <div class="form-group mt-5">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text js-copy" data-input="affiliate_url" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.copy')); ?>" data-copy-text="<?php echo e(trans('public.copy')); ?>" data-done-text="<?php echo e(trans('public.done')); ?>">
                                <i data-feather="copy" width="18" height="18" class="text-white"></i>
                            </button>
                        </div>
                        <input type="text" name="affiliate_url" readonly value="<?php echo e($affiliateCode->getAffiliateUrl()); ?>" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('panel.earnings')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table class="table text-center custom-table">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('panel.user')); ?></th>
                                <th class="text-center"><?php echo e(trans('panel.registration_bonus')); ?></th>
                                <th class="text-center"><?php echo e(trans('panel.affiliate_bonus')); ?></th>
                                <th class="text-center"><?php echo e(trans('panel.registration_date')); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $affiliates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left">
                                        <div class="user-inline-avatar d-flex align-items-center">
                                            <div class="avatar bg-gray200">
                                                <img src="<?php echo e($affiliate->referredUser->getAvatar()); ?>" class="img-cover" alt="<?php echo e($affiliate->referredUser->full_name); ?>">
                                            </div>
                                            <div class=" ml-5">
                                                <span class="d-block font-weight-500"><?php echo e($affiliate->referredUser->full_name); ?></span>
                                            </div>
                                        </div>
                                    </td>

                                    <td><?php echo e(handlePrice($affiliate->getAffiliateRegistrationAmountsOfEachReferral())); ?></td>

                                    <td><?php echo e(handlePrice($affiliate->getTotalAffiliateCommissionOfEachReferral())); ?></td>

                                    <td><?php echo e(dateTimeFormat($affiliate->created_at, 'Y M j | H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-30">
                        <?php echo e($affiliates->appends(request()->input())->links('vendor.pagination.panel')); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\marketing\affiliates.blade.php ENDPATH**/ ?>