<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.personalization')); ?> <?php echo e(trans('admin/main.settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item "><?php echo e(trans('admin/main.personalization')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php
                                $items = ['page_background','home_sections','home_hero','home_hero2','home_video_or_image_box',
                                            'panel_sidebar','find_instructors','reward_program','become_instructor_section',
                                            'theme_colors', 'theme_fonts', 'forums_section', 'navbar_button','cookie_settings', 'mobile_app', 'maintenance_settings',
                                            'others_personalization', 'statistics', 'restriction_settings'
                                         ];
                            ?>

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(($item == $name) ? 'active' : ''); ?>" href="<?php echo e(getAdminPanelUrl()); ?>/settings/personalization/<?php echo e($item); ?>"><?php echo e(trans('admin/main.'.$item)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="tab-content">
                                <?php echo $__env->make('admin.settings.personalization.'.$name,['itemValue' => (!empty($values)) ? $values : ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/settings/personalization.blade.php ENDPATH**/ ?>