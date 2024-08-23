<?php $__env->startSection('content'); ?>

    <?php if(!empty($activePackage)): ?>
        <section>
            <h2 class="section-title"><?php echo e(trans('financial.my_active_plan')); ?></h2>

            <div class="activities-container mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($activePackage->title); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.active_plan')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/53.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(dateTimeFormat($activePackage->activation_date, 'j M Y')); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.activation_date')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/54.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue text-dark-blue font-weight-bold mt-5"><?php echo e($activePackage->days_remained ?? trans('update.unlimited')); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('financial.days_remained')); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="mt-30">
        <h2 class="section-title"><?php echo e(trans('update.account_statistics')); ?></h2>

        <div class="d-flex align-items-center justify-content-around bg-white rounded-sm shadow mt-15 p-15">

            <div class="registration-package-statistics d-flex flex-column align-items-center">
                <div class="registration-package-statistics-icon">
                    <img src="/assets/default/img/icons/play.svg" alt="">
                </div>
                <span class="font-14 text-dark-blue font-weight-bold mt-5">
                    <?php if(!empty($activePackage) and isset($activePackage->courses_count)): ?>
                        <?php echo e($accountStatistics['myCoursesCount']); ?>/<?php echo e($activePackage->courses_count); ?>

                    <?php else: ?>
                        <?php echo e(trans('update.unlimited')); ?>

                    <?php endif; ?>
                </span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('product.courses')); ?></span>
            </div>

            <div class="registration-package-statistics d-flex flex-column align-items-center">
                <div class="registration-package-statistics-icon">
                    <img src="/assets/default/img/icons/video-2.svg" alt="">
                </div>
                <span class="font-14 text-dark-blue font-weight-bold mt-5">
                    <?php if(!empty($activePackage) and isset($activePackage->courses_capacity)): ?>
                        <?php echo e($activePackage->courses_capacity); ?>

                    <?php else: ?>
                        <?php echo e(trans('update.unlimited')); ?>

                    <?php endif; ?>
                </span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.live_students')); ?></span>
            </div>

            <div class="registration-package-statistics d-flex flex-column align-items-center">
                <div class="registration-package-statistics-icon">
                    <img src="/assets/default/img/icons/clock.svg" alt="">
                </div>
                <span class="font-14 text-dark-blue font-weight-bold mt-5">
                    <?php if(!empty($activePackage) and isset($activePackage->meeting_count)): ?>
                        <?php echo e($accountStatistics['myMeetingCount']); ?>/<?php echo e($activePackage->meeting_count); ?>

                    <?php else: ?>
                        <?php echo e(trans('update.unlimited')); ?>

                    <?php endif; ?>
                </span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.meeting_hours')); ?></span>
            </div>

            <div class="registration-package-statistics d-flex flex-column align-items-center">
                <div class="registration-package-statistics-icon">
                    <img src="/assets/default/img/activity/products.svg" alt="">
                </div>
                <span class="font-14 text-dark-blue font-weight-bold mt-5">
                    <?php if(!empty($activePackage) and isset($activePackage->product_count)): ?>
                        <?php echo e($accountStatistics['myProductCount']); ?>/<?php echo e($activePackage->product_count); ?>

                    <?php else: ?>
                        <?php echo e(trans('update.unlimited')); ?>

                    <?php endif; ?>
                </span>
                <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('update.products')); ?></span>
            </div>

            <?php if($authUser->isOrganization()): ?>
                <div class="registration-package-statistics d-flex flex-column align-items-center">
                    <div class="registration-package-statistics-icon">
                        <img src="/assets/default/img/icons/users.svg" alt="">
                    </div>
                    <span class="font-14 text-dark-blue font-weight-bold mt-5">
                        <?php if(!empty($activePackage) and isset($activePackage->instructors_count)): ?>
                            <?php echo e($accountStatistics['myInstructorsCount']); ?>/<?php echo e($activePackage->instructors_count); ?>

                        <?php else: ?>
                            <?php echo e(trans('update.unlimited')); ?>

                        <?php endif; ?>
                    </span>
                    <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('home.instructors')); ?></span>
                </div>

                <div class="registration-package-statistics d-flex flex-column align-items-center">
                    <div class="registration-package-statistics-icon">
                        <img src="/assets/default/img/icons/user.svg" alt="">
                    </div>
                    <span class="font-14 text-dark-blue font-weight-bold mt-5">
                        <?php if(!empty($activePackage) and isset($activePackage->students_count)): ?>
                            <?php echo e($accountStatistics['myStudentsCount']); ?>/<?php echo e($activePackage->students_count); ?>

                        <?php else: ?>
                            <?php echo e(trans('update.unlimited')); ?>

                        <?php endif; ?>
                    </span>
                    <span class="font-14 font-weight-500 text-gray"><?php echo e(trans('public.students')); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="mt-30">
        <h2 class="section-title"><?php echo e(trans('update.upgrade_your_account')); ?></h2>

        <div class="row mt-15">

            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $specialOffer = $package->activeSpecialOffer();
                ?>

                <div class="col-12 col-sm-6 col-lg-3 mt-15">
                    <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-50 pb-20 px-20">

                        <?php if(!empty($activePackage) and $activePackage->package_id == $package->id): ?>
                            <span class="badge badge-primary badge-popular px-15 py-5"><?php echo e(trans('update.activated')); ?></span>
                        <?php elseif(!empty($specialOffer)): ?>
                            <span class="badge badge-danger badge-popular px-15 py-5"><?php echo e(trans('update.percent_off', ['percent' => $specialOffer->percent])); ?></span>
                        <?php endif; ?>


                        <div class="plan-icon">
                            <img src="<?php echo e($package->icon); ?>" class="img-cover" alt="">
                        </div>

                        <h3 class="mt-20 font-30 text-secondary"><?php echo e($package->title); ?></h3>
                        <p class="font-weight-500 font-14 text-gray mt-10"><?php echo e($package->description); ?></p>

                        <div class="d-flex align-items-start mt-30">
                            <?php if(!empty($package->price) and $package->price > 0): ?>
                                <?php if(!empty($specialOffer)): ?>
                                    <div class="d-flex align-items-end line-height-1">
                                        <span class="font-36 text-primary"><?php echo e(handlePrice($package->getPrice(), true, true, false, null, true)); ?></span>
                                        <span class="font-14 text-gray ml-5 text-decoration-line-through"><?php echo e(handlePrice($package->price, true, true, false, null, true)); ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="font-36 text-primary line-height-1"><?php echo e(handlePrice($package->price, true, true, false, null, true)); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="font-36 text-primary line-height-1"><?php echo e(trans('public.free')); ?></span>
                            <?php endif; ?>
                        </div>

                        <ul class="mt-20 plan-feature">
                            <li class="mt-10"><?php echo e(!isset($package->days) ? trans('update.unlimited'): $package->days); ?> <?php echo e(trans('public.days')); ?></li>
                            <li class="mt-10"><?php echo e(!isset($package->courses_count) ? trans('update.unlimited') : $package->courses_count); ?> <?php echo e(trans('product.courses')); ?></li>
                            <li class="mt-10"><?php echo e(!isset($package->courses_capacity) ? trans('update.unlimited') : $package->courses_capacity); ?> <?php echo e(trans('update.live_students')); ?></li>
                            <li class="mt-10"><?php echo e(!isset($package->meeting_count) ? trans('update.unlimited') : $package->meeting_count); ?> <?php echo e(trans('update.meeting_hours')); ?></li>
                            <li class="mt-10"><?php echo e(!isset($package->product_count) ? trans('update.unlimited') : $package->product_count); ?> <?php echo e(trans('update.products')); ?></li>

                            <?php if($authUser->isOrganization()): ?>
                                <li class="mt-10"><?php echo e($package->instructors_count ?? trans('update.unlimited')); ?> <?php echo e(trans('home.instructors')); ?></li>
                                <li class="mt-10"><?php echo e($package->students_count ?? trans('update.unlimited')); ?> <?php echo e(trans('public.students')); ?></li>
                            <?php endif; ?>
                        </ul>

                        <form action="<?php echo e(route('payRegistrationPackage')); ?>" method="post" class="btn-block">
                            <?php echo e(csrf_field()); ?>

                            <input name="id" value="<?php echo e($package->id); ?>" type="hidden">

                            <div class="d-flex align-items-center mt-50 w-100">
                                <button type="submit" class="btn btn-sm btn-primary flex-grow-1 <?php echo e(!empty($package->has_installment) ? '' : 'btn-block'); ?>"><?php echo e(trans('update.upgrade')); ?></button>

                                <?php if(!empty($package->has_installment)): ?>
                                    <a href="/panel/financial/registration-packages/<?php echo e($package->id); ?>/installments" class="btn btn-sm btn-outline-primary flex-grow-1 ml-10"><?php echo e(trans('update.installments')); ?></a>
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

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\financial\registration_packages.blade.php ENDPATH**/ ?>