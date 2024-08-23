<?php $__env->startSection('content'); ?>
    <?php if($activeSubscribe): ?>
        <section>
            <h2 class="section-title"><?php echo e(trans('financial.my_active_plan')); ?></h2>

            <div class="activities-container mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold mt-5"><?php echo e($activeSubscribe->title); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.active_plan')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/53.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5">
                                <?php if($activeSubscribe->infinite_use): ?>
                                    <?php echo e(trans('update.unlimited')); ?>

                                <?php else: ?>
                                    <?php echo e($activeSubscribe->usable_count - $activeSubscribe->used_count); ?>

                                <?php endif; ?>
                            </strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.remained_downloads')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/54.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue text-dark-blue font-weight-bold mt-5"><?php echo e($activeSubscribe->days - $dayOfUse); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.days_remained')); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php else: ?>
        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
           'file_name' => 'subcribe.png',
           'title' => trans('financial.subcribe_no_result'),
           'hint' => nl2br(trans('financial.subcribe_no_result_hint')),
       ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <section class="mt-30">
        <h2 class="section-title"><?php echo e(trans('financial.select_a_subscribe_plan')); ?></h2>

        <div class="row mt-15">

            <?php $__currentLoopData = $subscribes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscribe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $subscribeSpecialOffer = $subscribe->activeSpecialOffer();
                ?>

                <div class="col-12 col-sm-6 col-lg-3 mt-15">
                    <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-50 pb-20 px-20">
                        <?php if($subscribe->is_popular): ?>
                            <span class="badge badge-primary badge-popular px-15 py-5"><?php echo e(trans('panel.popular')); ?></span>
                        <?php elseif(!empty($subscribeSpecialOffer)): ?>
                            <span class="badge badge-danger badge-popular px-15 py-5"><?php echo e(trans('update.percent_off', ['percent' => $subscribeSpecialOffer->percent])); ?></span>
                        <?php endif; ?>

                        <div class="plan-icon">
                            <img src="<?php echo e($subscribe->icon); ?>" class="img-cover" alt="">
                        </div>

                        <h3 class="mt-20 font-30 text-secondary"><?php echo e($subscribe->title); ?></h3>
                        <p class="font-weight-500 font-14 text-gray mt-10"><?php echo e($subscribe->description); ?></p>

                        <div class="d-flex align-items-start mt-30">
                            <?php if(!empty($subscribe->price) and $subscribe->price > 0): ?>
                                <?php if(!empty($subscribeSpecialOffer)): ?>
                                    <div class="d-flex align-items-end line-height-1">
                                        <span class="font-36 text-primary"><?php echo e(handlePrice($subscribe->getPrice(), true, true, false, null, true)); ?></span>
                                        <span class="font-14 text-gray ml-5 text-decoration-line-through"><?php echo e(handlePrice($subscribe->price, true, true, false, null, true)); ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="font-36 text-primary line-height-1"><?php echo e(handlePrice($subscribe->price, true, true, false, null, true)); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="font-36 text-primary line-height-1"><?php echo e(trans('public.free')); ?></span>
                            <?php endif; ?>
                        </div>

                        <ul class="mt-20 plan-feature">
                            <li class="mt-10"><?php echo e($subscribe->days); ?> <?php echo e(trans('financial.days_of_subscription')); ?></li>
                            <li class="mt-10">
                                <?php if($subscribe->infinite_use): ?>
                                    <?php echo e(trans('update.unlimited')); ?>

                                <?php else: ?>
                                    <?php echo e($subscribe->usable_count); ?>

                                <?php endif; ?>
                                <span class="ml-5"><?php echo e(trans('update.subscribes')); ?></span>
                            </li>
                        </ul>
                        <form action="/panel/financial/pay-subscribes" method="post" class="btn-block">
                            <?php echo e(csrf_field()); ?>

                            <input name="amount" value="<?php echo e($subscribe->price); ?>" type="hidden">
                            <input name="id" value="<?php echo e($subscribe->id); ?>" type="hidden">

                            <div class="d-flex align-items-center mt-50 w-100">
                                <button type="submit" class="btn btn-primary <?php echo e(!empty($subscribe->has_installment) ? '' : 'btn-block'); ?>"><?php echo e(trans('update.purchase')); ?></button>

                                <?php if(!empty($subscribe->has_installment)): ?>
                                    <a href="/panel/financial/subscribes/<?php echo e($subscribe->id); ?>/installments" class="btn btn-outline-primary flex-grow-1 ml-10"><?php echo e(trans('update.installments')); ?></a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/panel/financial/subscribes.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\financial\subscribes.blade.php ENDPATH**/ ?>