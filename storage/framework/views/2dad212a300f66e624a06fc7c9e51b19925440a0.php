<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.notifications')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.notifications')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <?php $__currentLoopData = \App\Models\NotificationTemplate::$notificationTemplateAssignSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e($loop->iteration == 1 ? ' active' : ''); ?>" id="<?php echo e($section); ?>-tab" data-toggle="tab" href="#<?php echo e($section); ?>" role="tab" aria-controls="<?php echo e($section); ?>" aria-selected="true"><?php echo e(trans('admin/main.notification_'.$section)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <?php
                                $itemValue = (!empty($settings) and !empty($settings['notifications'])) ? $settings['notifications']->value : '';

                                if (!empty($itemValue) and !is_array($itemValue)) {
                                    $itemValue = json_decode($itemValue, true);
                                }
                            ?>

                            <div class="tab-content" id="myTabContent2">

                                <?php $__currentLoopData = \App\Models\NotificationTemplate::$notificationTemplateAssignSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane mt-3 fade <?php echo e($loop->iteration == 1 ? ' show active' : ''); ?>" id="<?php echo e($tab); ?>" role="tabpanel" aria-labelledby="<?php echo e($tab); ?>-tab">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/notifications/store" method="post">
                                                    <?php echo e(csrf_field()); ?>


                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-group">
                                                            <label class="input-label"><?php echo e(trans('admin/main.notification_'.$item)); ?></label>
                                                            <select name="value[<?php echo e($item); ?>]" class="form-control">
                                                                <option value="" selected disabled></option>

                                                                <?php $__currentLoopData = $notificationTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($template->id); ?>" <?php if(!empty($itemValue) and  !empty($itemValue[$item]) and $itemValue[$item] == $template->id): ?> selected <?php endif; ?>><?php echo e($template->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\notifications.blade.php ENDPATH**/ ?>