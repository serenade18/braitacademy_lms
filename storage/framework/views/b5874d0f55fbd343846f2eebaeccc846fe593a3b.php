<div class="installment-card p-15 mt-20">
    <div class="row">
        <div class="col-8">
            <h4 class="font-16 font-weight-bold text-dark-blue"><?php echo e($installment->main_title); ?></h4>

            <div class="">
                <p class="text-gray font-14 text-ellipsis"><?php echo e(nl2br($installment->description)); ?></p>
            </div>

            <?php if(!empty($installment->capacity)): ?>
                <?php
                    $reachedCapacityPercent = $installment->reachedCapacityPercent();
                ?>

                <?php if($reachedCapacityPercent > 0): ?>
                    <div class="mt-20 d-flex align-items-center">
                        <div class="progress card-progress flex-grow-1">
                            <span class="progress-bar rounded-sm <?php echo e($reachedCapacityPercent > 50 ? 'bg-danger' : 'bg-primary'); ?>" style="width: <?php echo e($reachedCapacityPercent); ?>%"></span>
                        </div>
                        <div class="ml-10 font-12 text-danger"><?php echo e(trans('update.percent_capacity_reached',['percent' => $reachedCapacityPercent])); ?></div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(!empty($installment->banner)): ?>
                <div class="mt-20">
                    <img src="<?php echo e($installment->banner); ?>" alt="<?php echo e($installment->main_title); ?>" class="img-fluid">
                </div>
            <?php endif; ?>

            <?php if(!empty($installment->options)): ?>
                <div class="mt-20">
                    <?php
                        $installmentOptions = explode(\App\Models\Installment::$optionsExplodeKey, $installment->options);
                    ?>

                    <?php $__currentLoopData = $installmentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installmentOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex align-items-center mb-1">
                            <i data-feather="check" width="25" height="25" class="text-primary"></i>
                            <span class="ml-10 font-14 text-gray"><?php echo e($installmentOption); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-4 p-0 pr-15">
            <div class="installment-card__payments d-flex flex-column w-100 h-100">

                <?php
                    $totalPayments = $installment->totalPayments($itemPrice ?? 1);
                    $installmentTotalInterest = $installment->totalInterest($itemPrice, $totalPayments);
                ?>

                <div class="d-flex align-items-center justify-content-center flex-column">
                    <span class="font-36 font-weight-bold text-primary"><?php echo e(handlePrice($totalPayments)); ?></span>
                    <span class="mt-10 font-12 text-gray"><?php echo e(trans('update.total_payment')); ?> <?php if($installmentTotalInterest > 0): ?>
                            (<?php echo e(trans('update.percent_interest',['percent' => $installmentTotalInterest])); ?>)
                        <?php endif; ?></span>
                </div>

                <div class="mt-25 mb-15">
                    <div class="installment-step d-flex align-items-center font-12 text-gray"><?php echo e(!empty($installment->upfront) ? (trans('update.amount_upfront',['amount' => handlePrice($installment->getUpfront($itemPrice))]) . ($installment->upfront_type == "percent" ? " ({$installment->upfront}%)" : '')) : trans('update.no_upfront')); ?></div>

                    <?php $__currentLoopData = $installment->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installmentStep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="installment-step d-flex align-items-center font-12 text-gray"><?php echo e($installmentStep->getDeadlineTitle($itemPrice)); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <a href="/installments/<?php echo e($installment->id); ?>?item=<?php echo e($itemId); ?>&item_type=<?php echo e($itemType); ?>&<?php echo e(http_build_query(request()->all())); ?>" target="_blank" class="btn btn-primary btn-block mt-auto"><?php echo e(trans('update.pay_with_installments')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\installment\card.blade.php ENDPATH**/ ?>