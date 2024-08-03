<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.main_general')); ?> <?php echo e(trans('admin/main.settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item "><?php echo e(trans('admin/main.main_general')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($social)): ?> active <?php endif; ?>" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true"><?php echo e(trans('admin/main.basic')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php if(!empty($social)): ?> active <?php endif; ?>" id="socials-tab" data-toggle="tab" href="#socials" role="tab" aria-controls="socials" aria-selected="true"><?php echo e(trans('admin/main.socials')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="true"><?php echo e(trans('update.features')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="reminders-tab" data-toggle="tab" href="#reminders" role="tab" aria-controls="reminders" aria-selected="true"><?php echo e(trans('update.reminders')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="true"><?php echo e(trans('update.security')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="general_options-tab" data-toggle="tab" href="#general_options" role="tab" aria-controls="general_options" aria-selected="true"><?php echo e(trans('update.options')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="sms_channels-tab" data-toggle="tab" href="#sms_channels" role="tab" aria-controls="sms_channels" aria-selected="true"><?php echo e(trans('update.sms_channels')); ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent2">
                                <?php echo $__env->make('admin.settings.general.basic',['itemValue' => (!empty($settings) and !empty($settings['general'])) ? $settings['general']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.socials',['itemValue' => (!empty($settings) and !empty($settings['socials'])) ? $settings['socials']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.features',['itemValue' => (!empty($settings) and !empty($settings['features'])) ? $settings['features']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.reminders',['itemValue' => (!empty($settings) and !empty($settings['reminders'])) ? $settings['reminders']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.security',['itemValue' => (!empty($settings) and !empty($settings['security'])) ? $settings['security']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.options',['itemValue' => (!empty($settings) and !empty($settings['general_options'])) ? $settings['general_options']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('admin.settings.general.sms_channels',['itemValue' => (!empty($settings) and !empty($settings['sms_channels'])) ? $settings['sms_channels']->value : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

    <script src="/assets/default/js/admin/settings/general.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/settings/general.blade.php ENDPATH**/ ?>