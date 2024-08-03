<?php $__env->startPush('styles_top'); ?>

    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.financial_settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item "><?php echo e(trans('admin/main.financial')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  <?php if(empty(request()->get('tab'))): ?> active <?php endif; ?>" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true"><?php echo e(trans('admin/main.basic')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->get('tab') == "offline_banks"): ?> active <?php endif; ?>" id="offline_banks-tab" href="<?php echo e(getAdminPanelUrl("/settings/financial?tab=offline_banks")); ?>"><?php echo e(trans('admin/main.offline_banks_credits')); ?></a>
                                </li>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payment_channel')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if(request()->get('tab') == "payment_channels"): ?> active <?php endif; ?>" id="payment_channels-tab" data-toggle="tab" href="#payment_channels" role="tab" aria-controls="payment_channels" aria-selected="true"><?php echo e(trans('admin/main.payment_channels')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a class="nav-link " id="referral-tab" data-toggle="tab" href="#referral" role="tab" aria-controls="referral" aria-selected="true"><?php echo e(trans('admin/main.referral')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->get('tab') == "currency"): ?> active <?php endif; ?>" id="currency-tab" href="<?php echo e(getAdminPanelUrl("/settings/financial?tab=currency")); ?>"><?php echo e(trans('admin/main.currency')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->get('tab') == "user_banks"): ?> active <?php endif; ?>" id="user_banks-tab" href="<?php echo e(getAdminPanelUrl("/settings/financial?tab=user_banks")); ?>"><?php echo e(trans('update.user_banks')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->get('tab') == "commissions"): ?> active <?php endif; ?>" id="commissions-tab" href="<?php echo e(getAdminPanelUrl("/settings/financial?tab=commissions")); ?>"><?php echo e(trans('update.commissions')); ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent2">
                                <?php echo $__env->make('admin.settings.financial.basic',['itemValue' => (!empty($settings) and !empty($settings['financial'])) ? $settings['financial']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php if(request()->get('tab') == "offline_banks"): ?>
                                    <?php echo $__env->make('admin.settings.financial.offline_banks.index',['itemValue' => (!empty($settings) and !empty($settings['offline_banks'])) ? $settings['offline_banks']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payment_channel')): ?>
                                    <?php echo $__env->make('admin.settings.financial.payment_channel.lists', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php echo $__env->make('admin.settings.financial.referral',['itemValue' => (!empty($settings) and !empty($settings['referral'])) ? $settings['referral']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php if(request()->get('tab') == "currency"): ?>
                                    <?php echo $__env->make('admin.settings.financial.currency',['itemValue' => (!empty($settings) and !empty($settings[\App\Models\Setting::$currencySettingsName])) ? $settings[\App\Models\Setting::$currencySettingsName]->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php if(request()->get('tab') == "user_banks"): ?>
                                    <?php echo $__env->make('admin.settings.financial.user_banks.index',['itemValue' => (!empty($settings) and !empty($settings['user_banks'])) ? $settings['user_banks']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <?php if(request()->get('tab') == "commissions"): ?>
                                    <?php echo $__env->make('admin.settings.financial.commission',['itemValue' => (!empty($settings) and !empty($settings[\App\Models\Setting::$commissionSettingsName])) ? $settings[\App\Models\Setting::$commissionSettingsName]->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/financial.blade.php ENDPATH**/ ?>