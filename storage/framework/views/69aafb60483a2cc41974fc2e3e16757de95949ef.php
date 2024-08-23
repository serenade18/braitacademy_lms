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

            
            <?php echo $__env->make("admin.abandoned_cart.rules.lists.top_stats", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_rules')): ?>
                        <div class="text-right">
                            <a href="<?php echo e(getAdminPanelUrl("/abandoned-cart/rules/create")); ?>" class="btn btn-primary"><?php echo e(trans('update.new_rule')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.activities')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.sales')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.minimum_amount')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.maximum_amount')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.action')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.start_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.expire_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                <th><?php echo e(trans('public.controls')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($rule->title); ?></td>

                                    <td class="text-center">0</td>

                                    <td class="text-center">0</td>

                                    <td class="text-center">
                                        <?php if(!empty($rule->minimum_cart_amount)): ?>
                                            <?php echo e(handlePrice($rule->minimum_cart_amount)); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('update.unlimited')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if(!empty($rule->maximum_cart_amount)): ?>
                                            <?php echo e(handlePrice($rule->maximum_cart_amount)); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('update.unlimited')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php echo e(trans('update.'.$rule->action)); ?>

                                    </td>

                                    <td class="text-center">
                                        <?php if(!empty($rule->start_at)): ?>
                                            <?php echo e(dateTimeFormat($rule->start_at, 'j M Y H:i')); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if(!empty($rule->end_at)): ?>
                                            <?php echo e(dateTimeFormat($rule->end_at, 'j M Y H:i')); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>


                                    <td class="text-center">
                                        <?php if(!$rule->enable): ?>
                                            <span class="text-danger"><?php echo e(trans('admin/main.disabled')); ?></span>
                                        <?php elseif(!empty($rule->start_at) and $rule->start_at > time()): ?>
                                            <span class="text-warning"><?php echo e(trans('admin/main.pending')); ?></span>
                                        <?php elseif(!empty($rule->end_at) and $rule->end_at < time()): ?>
                                            <span class="text-danger"><?php echo e(trans('panel.expired')); ?></span>
                                        <?php else: ?>
                                            <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td width="100">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_rules')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl("/abandoned-cart/rules/{$rule->id}/edit")); ?>" class="btn-transparent  text-primary mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_abandoned_cart_rules')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/abandoned-cart/rules/{$rule->id}/delete"),'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($rules->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\abandoned_cart\rules\lists\index.blade.php ENDPATH**/ ?>