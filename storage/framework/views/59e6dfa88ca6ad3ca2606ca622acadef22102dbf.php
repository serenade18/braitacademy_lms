<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <?php echo e(trans('update.verification_request_details')); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-comment"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.open_installments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($openInstallments['count']); ?>

                            <span class="d-block font-12 text-muted mt-1"><?php echo e(handlePrice($openInstallments['amount'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-eye"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.pending_verification')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($pendingVerifications); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-hourglass-start"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.finished_installments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($finishedInstallments['count']); ?>

                            <span class="d-block font-12 text-muted mt-1"><?php echo e(handlePrice($finishedInstallments['amount'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-flag"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.overdue_installments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($overdueInstallmentsCount); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.installment_overview')); ?></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.amount')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.due_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.payment_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    </tr>


                                    <?php if(!empty($installment->upfront)): ?>
                                        <?php
                                            $upfrontPayment = $payments->where('type', 'upfront')->first();
                                        ?>
                                        <tr>

                                            <td class="text-left">
                                                <?php echo e(trans('update.upfront')); ?>

                                                <?php if($installment->upfront_type == 'percent'): ?>
                                                    <span class="ml-1">(<?php echo e($installment->upfront); ?>%)</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center"><?php echo e(handlePrice($installment->getUpfront($itemPrice))); ?></td>

                                            <td class="text-center">-</td>

                                            <td class="text-center"><?php echo e(!empty($upfrontPayment) ? dateTimeFormat($upfrontPayment->created_at, 'j M Y H:i') : '-'); ?></td>

                                            <td class="text-center">
                                                <?php if(!empty($upfrontPayment)): ?>
                                                    <span class="text-primary"><?php echo e(trans('public.paid')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-dark-blue"><?php echo e(trans('update.unpaid')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $installment->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $stepPayment = $payments->where('selected_installment_step_id', $step->id)->where('status', 'paid')->first();
                                            $dueAt = ($step->deadline * 86400) + $order->created_at;
                                            $isOverdue = ($dueAt < time() and empty($stepPayment));
                                        ?>

                                        <tr>
                                            <td class="text-left">
                                                <div class="d-block font-16 font-weight-500 text-dark-blue">
                                                    <?php echo e($step->title); ?>


                                                    <?php if($step->amount_type == 'percent'): ?>
                                                        <span class="ml-1 font-12 text-gray">(<?php echo e($step->amount); ?>%)</span>
                                                    <?php endif; ?>
                                                </div>

                                                <span class="d-block font-12 text-gray"><?php echo e(trans('update.n_days_after_purchase', ['days' => $step->deadline])); ?></span>
                                            </td>

                                            <td class="text-center"><?php echo e(handlePrice($step->getPrice($itemPrice))); ?></td>

                                            <td class="text-center">
                                                <span class="<?php echo e($isOverdue ? 'text-danger' : ''); ?>"><?php echo e(dateTimeFormat($dueAt, 'j M Y')); ?></span>
                                            </td>

                                            <td class="text-center"><?php echo e(!empty($stepPayment) ? dateTimeFormat($stepPayment->created_at, 'j M Y H:i') : '-'); ?></td>

                                            <td class="text-center">
                                                <?php if(!empty($stepPayment)): ?>
                                                    <span class="text-primary"><?php echo e(trans('public.paid')); ?></span>
                                                <?php else: ?>
                                                    <span class="<?php echo e($isOverdue ? 'text-danger' : 'text-dark-blue'); ?>"><?php echo e(trans('update.unpaid')); ?> <?php echo e($isOverdue ? "(". trans('update.overdue') .")" : ''); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.user_uploaded_files')); ?></h4>
                        </div>

                        <div class="card-body">
                            <?php if(!empty($attachments) and count($attachments)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped font-14">
                                        <tr>
                                            <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                            <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                                        </tr>

                                        <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td class="text-left">
                                                    <?php echo e($attachment->title); ?>

                                                </td>

                                                <td class="text-right">
                                                    <a href="<?php echo e(getAdminPanelUrl("/financial/installments/orders/{$order->id}/attachments/{$attachment->id}/download")); ?>" class="" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('home.download')); ?>">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </table>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('admin.includes.no-result',[
                                    'file_name' => 'faq.png',
                                    'title' => trans('update.no_uploaded_files'),
                                    'hint' => trans('update.no_uploaded_files_hint'),
                                    'noResultSmLogo' => true
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-end my-3">

            <?php if($order->status == "pending_verification"): ?>
                <?php echo $__env->make('admin.includes.delete_button',[
                        'url' => getAdminPanelUrl("/financial/installments/orders/{$order->id}/approve"),
                        'btnClass' => 'btn btn-success text-white',
                        'btnText' => '<i class="fa fa-check"></i><span class="ml-2">'. trans("admin/main.approve") .'</span>',
                        'noBtnTransparent' => true,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if($order->status == "open"): ?>
                <?php echo $__env->make('admin.includes.delete_button',[
                        'url' => getAdminPanelUrl("/financial/installments/orders/{$order->id}/reject"),
                        'btnClass' => 'btn btn-danger text-white ml-1',
                        'btnText' => '<i class="fa fa-check"></i><span class="ml-2">'. trans("admin/main.reject") .'</span>',
                        'noBtnTransparent' => true,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\verification_request_details.blade.php ENDPATH**/ ?>