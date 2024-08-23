<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.installment_plans')); ?>

                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.sales_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.upfront')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.number_of_installments')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.amount_of_installments')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.capacity')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.end_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $installments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <span class="d-block font-16 font-weight-500"><?php echo e($installment->title); ?></span>
                                                    <span class="d-block font-12 mt-1"><?php echo e(trans('update.target_types_'.$installment->target_type)); ?></span>
                                                </div>
                                            </td>

                                            <td class="text-center"><?php echo e($installment->sales_count); ?></td>

                                            <td class="text-center">
                                                <?php echo e(($installment->upfront_type == 'percent') ? $installment->upfront.'%' : handlePrice($installment->upfront)); ?>

                                            </td>

                                            <td class="text-center"><?php echo e($installment->steps_count); ?></td>

                                            <td class="text-center">
                                                <?php
                                                    $stepsFixedAmount = $installment->steps->where('amount_type', 'fixed_amount')->sum('amount');
                                                    $stepsPercents = $installment->steps->where('amount_type', 'percent')->sum('amount');
                                                ?>

                                                <span class=""><?php echo e($stepsFixedAmount ? handlePrice($stepsFixedAmount) : ''); ?></span>

                                                <?php if($stepsPercents): ?>
                                                    <span><?php echo e($stepsFixedAmount ? ' + ' : ''); ?><?php echo e($stepsPercents); ?>%</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center"><?php echo e($installment->capacity ?? ''); ?></td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($installment->created_at, 'Y M j | H:i')); ?></td>

                                            <td class="text-center"><?php echo e($installment->end_date ? dateTimeFormat($installment->end_date, 'Y M j | H:i') : '-'); ?></td>

                                            <td class="text-center">
                                                <?php if($installment->enable): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-danger"><?php echo e(trans('admin/main.inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl("/financial/installments/{$installment->id}/edit")); ?>" class="btn-sm btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_promotion_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl('/financial/installments/'. $installment->id.'/delete'),'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($installments->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\lists\index.blade.php ENDPATH**/ ?>