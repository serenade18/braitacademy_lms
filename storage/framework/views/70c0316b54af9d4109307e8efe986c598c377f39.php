<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.referral_history')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.referral_history')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-people-arrows"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total')); ?> <?php echo e(trans('admin/main.referred_users')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($affiliatesCount); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user-tag"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total')); ?> <?php echo e(trans('admin/main.affiliate_users')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($affiliateUsersCount); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total')); ?> <?php echo e(trans('admin/main.registeration_amount')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(handlePrice($allAffiliateAmounts)); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill-wave"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('admin/main.total_commission_amount')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(handlePrice($allAffiliateCommissionAmounts)); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_referrals_export')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/referrals/excel?type=history" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.affiliate_user')); ?></th>
                                        <th><?php echo e(trans('admin/main.referred_user')); ?></th>
                                        <th><?php echo e(trans('admin/main.affiliate_registration_amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.affiliate_user_commission')); ?></th>
                                        <th><?php echo e(trans('admin/main.referred_user_amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.date')); ?></th>
                                    </tr>

                                    <tbody>
                                    <?php $__currentLoopData = $affiliates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($affiliate->affiliateUser->full_name); ?></td>

                                            <td><?php echo e($affiliate->referredUser->full_name); ?></td>

                                            <td><?php echo e(handlePrice($affiliate->getAffiliateRegistrationAmountsOfEachReferral())); ?></td>

                                            <td><?php echo e(handlePrice($affiliate->getTotalAffiliateCommissionOfEachReferral())); ?></td>

                                            <td><?php echo e(handlePrice($affiliate->getReferredAmount())); ?></td>

                                            <td><?php echo e(dateTimeFormat($affiliate->created_at, 'Y M j | H:i')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($affiliates->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.total_user_hint')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.total_user_desc')); ?></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.total_affiliate_hint')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.total_affiliate_desc')); ?></div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.total_aff_amount_hint')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('admin/main.total_aff_amount_desc')); ?></div>
                    </div>
                </div>

                  <div class="col-md-3">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.total_aff_commission_hint')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('admin/main.total_aff_commission_desc')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\referrals\history.blade.php ENDPATH**/ ?>