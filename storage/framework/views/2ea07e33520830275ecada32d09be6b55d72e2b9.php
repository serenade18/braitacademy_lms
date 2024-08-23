<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.verified_users')); ?>

                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(getAdminPanelUrl("/financial/installments/verified_users/export")); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                        </div>

                        <div class="card-body">
                            <div class="<?php echo e((count($users) > 4) ? 'table-responsive' : 'table-responsive-2'); ?>">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.register_date')); ?></th>
                                        <th class=""><?php echo e(trans('update.total_purchases')); ?></th>
                                        <th class=""><?php echo e(trans('update.total_installments')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.installments_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.overdue_installments')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left">
                                                <div class="d-flex align-items-center">
                                                    <figure class="avatar mr-2">
                                                        <img src="<?php echo e($user->getAvatar()); ?>" alt="<?php echo e($user->full_name); ?>">
                                                    </figure>
                                                    <div class="media-body ml-1">
                                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($user->full_name); ?></div>

                                                        <?php if($user->mobile): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->mobile); ?></div>
                                                        <?php endif; ?>

                                                        <?php if($user->email): ?>
                                                            <div class="text-primary text-small font-600-bold"><?php echo e($user->email); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class=""><?php echo e(dateTimeFormat($user->created_at, 'j M Y')); ?></td>

                                            <td class="text-center"><?php echo e(handlePrice($user->getPurchaseAmounts())); ?></td>

                                            <td class="text-center"><?php echo e(handlePrice($user->totalAmount)); ?></td>

                                            <td>
                                                <span class="d-block font-14"><?php echo e($user->unpaidStepsCount); ?></span>

                                                <?php if($user->unpaidStepsAmount): ?>
                                                    <span class="d-block font-12"><?php echo e(handlePrice($user->unpaidStepsAmount)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <span class="d-block font-14"><?php echo e($user->overdueCount); ?></span>

                                                <?php if($user->overdueAmount): ?>
                                                    <span class="d-block font-12"><?php echo e(handlePrice($user->overdueAmount)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu text-left webinars-lists-dropdown">

                                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                            'url' => getAdminPanelUrl("/users/{$user->id}/disable_installment_approval"),
                                                            'btnClass' => 'd-flex align-items-center text-danger text-decoration-none btn-transparent btn-sm mb-1',
                                                            'btnText' => '<i class="fa fa-times"></i><span class="ml-2">'. trans("update.unverifiable") .'</span>'
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id); ?>/impersonate" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                                <i class="fa fa-user-shield"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.login')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id); ?>/edit" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm mt-1">
                                                                <i class="fa fa-edit"></i>
                                                                <span class="ml-2"><?php echo e(trans('admin/main.edit')); ?></span>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_send')): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/create?user_id=<?php echo e($user->id); ?>" target="_blank" class="d-flex align-items-center text-dark text-decoration-none btn-transparent btn-sm text-primary mt-1">
                                                                <i class="fa fa-comment"></i>
                                                                <span class="ml-2"><?php echo e(trans('site.send_message')); ?></span>
                                                            </a>
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
                            <?php echo e($users->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\verified_users.blade.php ENDPATH**/ ?>