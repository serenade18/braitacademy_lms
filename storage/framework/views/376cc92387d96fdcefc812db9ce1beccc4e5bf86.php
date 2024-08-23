<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications_create')): ?>
                        <div class="text-right">
                            <a href="<?php echo e(getAdminPanelUrl("/purchase_notifications/create")); ?>" class="btn btn-primary"><?php echo e(trans('update.new_notification')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.displayed_time')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.contents')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.users')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.start_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.end_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                <th><?php echo e(trans('public.controls')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($notification->title); ?></td>

                                    <td class="text-center"><?php echo e($notification->display_time); ?></td>

                                    <td class="text-center"><?php echo e($notification->webinars_count + $notification->bundles_count + $notification->products_count); ?></td>

                                    <td class="text-center">
                                        <?php echo e(!empty($notification->users) ? count(explode(',', $notification->users)) : 0); ?>

                                    </td>

                                    <td class="text-center"><?php echo e(!empty($notification->start_at) ? dateTimeFormat($notification->start_at, 'j M Y') : '-'); ?></td>

                                    <td class="text-center"><?php echo e(!empty($notification->end_at) ? dateTimeFormat($notification->end_at, 'j M Y') : '-'); ?></td>

                                    <td class="text-center">
                                        <?php if(!$notification->enable): ?>
                                            <span class="text-danger"><?php echo e(trans('admin/main.disabled')); ?></span>
                                        <?php elseif(!empty($notification->start_at) and $notification->start_at > time()): ?>
                                            <span class="text-warning"><?php echo e(trans('admin/main.pending')); ?></span>
                                        <?php elseif(!empty($notification->end_at) and $notification->end_at < time()): ?>
                                            <span class="text-danger"><?php echo e(trans('panel.expired')); ?></span>
                                        <?php else: ?>
                                            <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td width="100">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications_edit')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl("/purchase_notifications/{$notification->id}/edit")); ?>" class="btn-transparent  text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_purchase_notifications_delete')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/purchase_notifications/{$notification->id}/delete"),'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($notifications->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\purchase_notifications\lists\index.blade.php ENDPATH**/ ?>