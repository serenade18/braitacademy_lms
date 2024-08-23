<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.cashback_rules')); ?>

                </div>
            </div>
        </div>

        
        <?php echo $__env->make('admin.cashback.rules.lists.stats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php echo $__env->make('admin.cashback.rules.lists.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.target_type')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.paid_amount')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.users')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.start_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.end_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span class="d-block font-16 font-weight-500"><?php echo e($rule->title); ?></span>
                                            </td>

                                            <td>
                                                <span class=""><?php echo e(trans('update.target_types_'.$rule->target_type)); ?></span>
                                            </td>

                                            <td class="text-center">
                                                <?php echo e(($rule->amount_type == 'percent') ? $rule->amount.'%' : handlePrice($rule->amount)); ?>

                                            </td>

                                            <td class="text-center">0</td>

                                            <td class="text-center">0</td>

                                            <td class="text-center"><?php echo e($rule->start_date ? dateTimeFormat($rule->start_date, 'Y M j | H:i') : '-'); ?></td>

                                            <td class="text-center"><?php echo e($rule->end_date ? dateTimeFormat($rule->end_date, 'Y M j | H:i') : trans('update.unlimited')); ?></td>

                                            <td class="text-center">
                                                <?php if($rule->enable): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e(trans('admin/main.inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_rules')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl("/cashback/rules/{$rule->id}/edit")); ?>" class="btn-sm btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_rules')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl('/cashback/rules/'. $rule->id.'/statusToggle'), 'tooltip' => ($rule->enable ? trans('admin/main.inactive') : trans('admin/main.active')), 'btnClass' => 'ml-2', 'btnIcon' => "fa-times-circle"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_cashback_rules')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl('/cashback/rules/'. $rule->id.'/delete'), 'tooltip' => trans('admin/main.delete'), 'btnClass' => 'ml-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\lists\index.blade.php ENDPATH**/ ?>