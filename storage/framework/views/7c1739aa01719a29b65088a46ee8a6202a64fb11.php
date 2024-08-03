<div class="tab-pane fade <?php if(request()->get('tab') == "payment_channels"): ?> active show <?php endif; ?>" id="payment_channels" role="tabpanel" aria-labelledby="payment_channels-tab">
    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                        <th><?php echo e(trans('public.status')); ?></th>
                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $paymentChannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentChannel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-left"><?php echo e($paymentChannel->title); ?></td>
                            <td>
                                <?php if($paymentChannel->status == 'active'): ?>
                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                <?php else: ?>
                                    <span class="text-danger"><?php echo e(trans('admin/main.inactive')); ?></span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payment_channel_edit')): ?>
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/settings/payment_channels/<?php echo e($paymentChannel->id); ?>/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payment_channel_toggle_status')): ?>
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/settings/payment_channels/<?php echo e($paymentChannel->id); ?>/toggleStatus" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.'.(($paymentChannel->status == 'active') ? 'inactive' : 'active'))); ?>">
                                        <?php if($paymentChannel->status == 'inactive'): ?>
                                            <i class="fa fa-arrow-up"></i>
                                        <?php else: ?>
                                            <i class="fa fa-arrow-down"></i>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($paymentChannels->appends(['tab' => "payment_channels"])->links()); ?>

        </div>

    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/settings/financial/payment_channel/lists.blade.php ENDPATH**/ ?>