<?php $__env->startSection('content'); ?>

    <?php if(!empty($overdueInstallments) and count($overdueInstallments)): ?>
        <div class="d-flex align-items-center mb-20 p-15 danger-transparent-alert">
            <div class="danger-transparent-alert__icon d-flex align-items-center justify-content-center">
                <i data-feather="credit-card" width="18" height="18" class=""></i>
            </div>
            <div class="ml-10">
                <div class="font-14 font-weight-bold "><?php echo e(trans('update.overdue_installments')); ?></div>
                <div class="font-12 "><?php echo e(trans('update.you_have_count_overdue_installments_please_pay_them_to_avoid_restrictions_and_negative_effects_on_your_account',['count' => count($overdueInstallments)])); ?></div>
            </div>
        </div>
    <?php endif; ?>

    
    <section>
        <h2 class="section-title"><?php echo e(trans('update.installments_overview')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/127.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalParts); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.total_parts')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/38.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($remainedParts); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.remained_parts')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/33.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($remainedAmount)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.remained_amount')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/128.png" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($overdueAmount)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.overdue_amount')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.installments_list')); ?></h2>
        </div>

        <div class="panel-section-card py-20 px-25 mt-20">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table class="table text-center custom-table">
                            <thead>
                            <tr>
                                <th><?php echo e(trans('public.title')); ?></th>
                                <th class="text-center"><?php echo e(trans('panel.amount')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.due_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.payment_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                <th class=""></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if(!empty($installment->upfront)): ?>
                                <?php
                                    $upfrontPayment = $payments->where('type','upfront')->first();
                                ?>
                                <tr>
                                    <td class="text-left">
                                        <?php echo e(trans('update.upfront')); ?>

                                        <?php if($installment->upfront_type == 'percent'): ?>
                                            <span class="ml-5">(<?php echo e($installment->upfront); ?>%)</span>
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
                                    <td class="text-right">

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
                                            <span class="ml-5 font-12 text-gray">(<?php echo e($step->amount); ?>%)</span>
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
                                    <td class="text-right">
                                        <?php if(empty($stepPayment)): ?>
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu menu-lg">

                                                    <a href="/panel/financial/installments/<?php echo e($order->id); ?>/steps/<?php echo e($step->id); ?>/pay" target="_blank"
                                                       class="webinar-actions d-block mt-10 font-weight-normal"><?php echo e(trans('panel.pay')); ?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\financial\installments\details.blade.php ENDPATH**/ ?>