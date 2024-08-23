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

            
            <?php echo $__env->make("admin.abandoned_cart.users_carts.top_stats", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make("admin.abandoned_cart.users_carts.filters", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card">
                <div class="card-header">

                    <div class="text-right">
                        <a href="<?php echo e(getAdminPanelUrl("/abandoned-cart/users-carts?excel=1")); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                <th class="text-center"><?php echo e(trans('public.user_role')); ?></th>
                                <th class="text-center"><?php echo e(trans('cart.cart_items')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.amount')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.coupons')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.reminders')); ?></th>
                                <th><?php echo e(trans('public.controls')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cart->user->full_name); ?></td>

                                    <td class="text-center"><?php echo e(trans('admin/main.'.$cart->user->role_name)); ?></td>

                                    <td class="text-center"><?php echo e($cart->total_items); ?></td>

                                    <td class="text-center"><?php echo e(handlePrice($cart->total_amount)); ?></td>

                                    <td class="text-center">
                                        <?php echo e($cart->send_coupons); ?>

                                    </td>

                                    <td class="text-center">
                                        <?php echo e($cart->send_reminders); ?>

                                    </td>

                                    <td width="100">


                                        <a href="<?php echo e(getAdminPanelUrl("/abandoned-cart/users-carts/{$cart->creator_id}/view-items")); ?>" class="btn-transparent  text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.view_items')); ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <?php echo $__env->make('admin.includes.delete_button', [
                                                'url' => getAdminPanelUrl("/abandoned-cart/users-carts/{$cart->creator_id}/send-reminder"),
                                                'btnClass' => '',
                                                'tooltip' => trans('admin/main.send_reminder'),
                                                'btnIcon' => 'fa-clock'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($cart->creator_id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                                <i class="fa fa-user-shield"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($cart->creator_id); ?>/edit" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.edit_user')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php echo $__env->make('admin.includes.delete_button', [
                                                'url' => getAdminPanelUrl("/abandoned-cart/users-carts/{$cart->creator_id}/empty"),
                                                'btnClass' => '',
                                                'tooltip' => trans('update.empty_cart'),
                                                'btnIcon' => 'fa-times'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($carts->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\users_carts\index.blade.php ENDPATH**/ ?>