<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.overdue_installments')); ?>

                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(getAdminPanelUrl("/financial/installments/overdue/export")); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                        </div>

                        <div class="card-body">
                            <div class="<?php echo e((count($orders) > 4) ? 'table-responsive' : 'table-responsive-2'); ?>">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-left"><?php echo e(trans('update.installment_plan')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.product')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.overdue_date')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left">
                                                <div class="d-flex align-items-center">
                                                    <figure class="avatar mr-2">
                                                        <img src="<?php echo e($order->user->getAvatar()); ?>" alt="<?php echo e($order->user->full_name); ?>">
                                                    </figure>
                                                    <div class="media-body ml-1">
                                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($order->user->full_name); ?></div>

                                                        <?php if($order->user->mobile): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($order->user->mobile); ?></div>
                                                        <?php endif; ?>

                                                        <?php if($order->user->email): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($order->user->email); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-left">
                                                <div class="">
                                                    <span class="d-block font-16 font-weight-500"><?php echo e($order->selectedInstallment->installment->title); ?></span>
                                                    <span class="d-block font-12 mt-1"><?php echo e(trans('update.target_types_'.$order->selectedInstallment->installment->target_type)); ?></span>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <?php if(!empty($order->webinar_id)): ?>
                                                    <a href="<?php echo e(!empty($order->webinar) ? $order->webinar->getUrl() : ''); ?>"
                                                       target="_blank" class="font-14">#<?php echo e($order->webinar_id); ?>-<?php echo e(!empty($order->webinar) ? $order->webinar->title : ''); ?></a>
                                                    <span class="d-block font-12"><?php echo e(trans('update.target_types_courses')); ?></span>
                                                <?php elseif(!empty($order->bundle_id)): ?>
                                                    <a href="<?php echo e(!empty($order->bundle) ? $order->bundle->getUrl() : ''); ?>"
                                                       target="_blank" class="font-14">#<?php echo e($order->bundle_id); ?>-<?php echo e(!empty($order->bundle) ? $order->bundle->title : ''); ?></a>
                                                    <span class="d-block font-12"><?php echo e(trans('update.target_types_bundles')); ?></span>
                                                <?php elseif(!empty($order->product_id)): ?>
                                                    <a href="<?php echo e(!empty($order->product) ? $order->product->getUrl() : ''); ?>"
                                                       target="_blank" class="font-14">#<?php echo e($order->product_id); ?>-<?php echo e(!empty($order->product) ? $order->product->title : ''); ?></a>
                                                    <span class="d-block font-12"><?php echo e(trans('update.target_types_store_products')); ?></span>
                                                <?php elseif(!empty($order->subscribe_id)): ?>
                                                    <span class="font-14"><?php echo e(trans('admin/main.purchased_subscribe')); ?></span>
                                                    <span class="d-block font-12"><?php echo e(trans('update.target_types_subscription_packages')); ?></span>
                                                <?php elseif(!empty($order->registration_package_id)): ?>
                                                    <span class="font-14"><?php echo e(trans('update.purchased_registration_package')); ?></span>
                                                    <span class="d-block font-12"><?php echo e(trans('update.target_types_registration_packages')); ?></span>
                                                <?php else: ?>
                                                    ---
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if($order->amount_type == 'percent'): ?>
                                                    <?php echo e($order->amount); ?>% (<?php echo e(handlePrice(($order->getItemPrice() * $order->amount) / 100)); ?>)
                                                <?php else: ?>
                                                    <?php echo e(handlePrice($order->amount)); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($order->overdue_date, 'j M Y')); ?> (<?php echo e(dateTimeFormatForHumans($order->overdue_date,true,null,1)); ?>)</td>

                                            <td>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu text-left webinars-lists-dropdown">

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_orders')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl("/financial/installments/orders/{$order->id}/details")); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                                <span class="ml-2"><?php echo e(trans('update.show_details')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($order->user_id); ?>/impersonate" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                                <i class="fa fa-user-shield"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.login')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($order->user_id); ?>/edit" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/create?user_id=<?php echo e($order->user_id); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1">
                                                                <i class="fa fa-comment"></i>
                                                                <span class="ml-2"><?php echo e(trans('site.send_message')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_installments_orders')): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl("/financial/installments/orders/{$order->id}/cancel"),
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("admin/main.cancel") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl("/financial/installments/orders/{$order->id}/refund"),
                                                                    'btnClass' => 'd-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1',
                                                                    'btnText' => '<i class="fa fa-times-circle"></i><span class="ml-2">'. trans("admin/main.refund") .'</span>'
                                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($orders->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\overdue_installments.blade.php ENDPATH**/ ?>