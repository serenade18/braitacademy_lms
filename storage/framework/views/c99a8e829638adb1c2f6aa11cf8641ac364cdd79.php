<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.my_activity')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($purchasedCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.purchased')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(convertMinutesToHourAndMinute($hours)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('home.hours')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/upcoming.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($upComing); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.upcoming')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('panel.my_purchases')); ?></h2>
        </div>

        <?php if(!empty($sales) and !$sales->isEmpty()): ?>
            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $item = !empty($sale->webinar) ? $sale->webinar : $sale->bundle;

                    $lastSession = !empty($sale->webinar) ? $sale->webinar->lastSession() : null;
                    $nextSession = !empty($sale->webinar) ? $sale->webinar->nextSession() : null;
                    $isProgressing = false;

                    if(!empty($sale->webinar) and $sale->webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                        $isProgressing = true;
                    }
                ?>

                <?php if(!empty($item)): ?>
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="webinar-card webinar-list d-flex">
                                <div class="image-box">
                                    <img src="<?php echo e($item->getImage()); ?>" class="img-cover" alt="">

                                    <?php if(!empty($sale->webinar)): ?>
                                        <div class="badges-lists">
                                            <?php if($item->type == 'webinar'): ?>
                                                <?php if($item->start_date > time()): ?>
                                                    <span class="badge badge-primary"><?php echo e(trans('panel.not_conducted')); ?></span>
                                                <?php elseif($item->isProgressing()): ?>
                                                    <span class="badge badge-secondary"><?php echo e(trans('webinars.in_progress')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary"><?php echo e(trans('public.finished')); ?></span>
                                                <?php endif; ?>
                                            <?php elseif(!empty($item->downloadable)): ?>
                                                <span class="badge badge-secondary"><?php echo e(trans('home.downloadable')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary"><?php echo e(trans('webinars.'.$item->type)); ?></span>
                                            <?php endif; ?>
                                        </div>

                                        <?php
                                            $percent = $item->getProgress();

                                            if($item->isWebinar()){
                                                if($item->isProgressing()) {
                                                    $progressTitle = trans('public.course_learning_passed',['percent' => $percent]);
                                                } else {
                                                    $progressTitle = $item->sales_count .'/'. $item->capacity .' '. trans('quiz.students');
                                                }
                                            } else {
                                                   $progressTitle = trans('public.course_learning_passed',['percent' => $percent]);
                                            }
                                        ?>

                                        <?php if(!empty($sale->gift_id) and $sale->buyer_id == $authUser->id): ?>
                                            
                                        <?php else: ?>
                                            <div class="progress cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e($progressTitle); ?>">
                                                <span class="progress-bar" style="width: <?php echo e($percent); ?>%"></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="badges-lists">
                                            <span class="badge badge-secondary"><?php echo e(trans('update.bundle')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="webinar-card-body w-100 d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="<?php echo e($item->getUrl()); ?>">
                                            <h3 class="webinar-title font-weight-bold font-16 text-dark-blue">
                                                <?php echo e($item->title); ?>


                                                <?php if(!empty($item->access_days)): ?>
                                                    <?php if(!$item->checkHasExpiredAccessDays($sale->created_at, $sale->gift_id)): ?>
                                                        <span class="badge badge-outlined-danger ml-10"><?php echo e(trans('update.access_days_expired')); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-outlined-warning ml-10"><?php echo e(trans('update.expired_on_date',['date' => dateTimeFormat($item->getExpiredAccessDays($sale->created_at, $sale->gift_id),'j M Y')])); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($sale->payment_method == \App\Models\Sale::$subscribe and $sale->checkExpiredPurchaseWithSubscribe($sale->buyer_id, $item->id, !empty($sale->webinar) ? 'webinar_id' : 'bundle_id')): ?>
                                                    <span class="badge badge-outlined-danger ml-10"><?php echo e(trans('update.subscribe_expired')); ?></span>
                                                <?php endif; ?>

                                                <?php if(!empty($sale->webinar)): ?>
                                                    <span class="badge badge-dark ml-10 status-badge-dark"><?php echo e(trans('webinars.'.$item->type)); ?></span>
                                                <?php endif; ?>

                                                <?php if(!empty($sale->gift_id)): ?>
                                                    <span class="badge badge-primary ml-10"><?php echo e(trans('update.gift')); ?></span>
                                                <?php endif; ?>
                                            </h3>
                                        </a>

                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>

                                            <div class="dropdown-menu">
                                                <?php if(!empty($sale->gift_id) and $sale->buyer_id == $authUser->id): ?>
                                                    <a href="/panel/webinars/<?php echo e($item->id); ?>/sale/<?php echo e($sale->id); ?>/invoice" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.invoice')); ?></a>
                                                <?php else: ?>
                                                    <?php if(!empty($item->access_days) and !$item->checkHasExpiredAccessDays($sale->created_at, $sale->gift_id)): ?>
                                                        <a href="<?php echo e($item->getUrl()); ?>" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('update.enroll_on_course')); ?></a>
                                                    <?php elseif(!empty($sale->webinar)): ?>
                                                        <a href="<?php echo e($item->getLearningPageUrl()); ?>" target="_blank" class="webinar-actions d-block"><?php echo e(trans('update.learning_page')); ?></a>

                                                        <?php if(!empty($item->start_date) and ($item->start_date > time() or ($item->isProgressing() and !empty($nextSession)))): ?>
                                                            <button type="button" data-webinar-id="<?php echo e($item->id); ?>" class="join-purchase-webinar webinar-actions btn-transparent d-block mt-10"><?php echo e(trans('footer.join')); ?></button>
                                                        <?php endif; ?>

                                                        <?php if(!empty($item->downloadable) or (!empty($item->files) and count($item->files))): ?>
                                                            <a href="<?php echo e($item->getUrl()); ?>?tab=content" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('home.download')); ?></a>
                                                        <?php endif; ?>

                                                        <?php if($item->price > 0): ?>
                                                            <a href="/panel/webinars/<?php echo e($item->id); ?>/sale/<?php echo e($sale->id); ?>/invoice" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.invoice')); ?></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <a href="<?php echo e($item->getUrl()); ?>?tab=reviews" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.feedback')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $item->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="webinar-price-box mt-15">
                                        <?php if($item->price > 0): ?>
                                            <?php if($item->bestTicket() < $item->price): ?>
                                                <span class="real"><?php echo e(handlePrice($item->bestTicket(), true, true, false, null, true)); ?></span>
                                                <span class="off ml-10"><?php echo e(handlePrice($item->price, true, true, false, null, true)); ?></span>
                                            <?php else: ?>
                                                <span class="real"><?php echo e(handlePrice($item->price, true, true, false, null, true)); ?></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="real"><?php echo e(trans('public.free')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">

                                        <?php if(!empty($sale->gift_id) and $sale->buyer_id == $authUser->id): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('update.gift_status')); ?>:</span>

                                                <?php if(!empty($sale->gift_date) and $sale->gift_date > time()): ?>
                                                    <span class="stat-value text-warning"><?php echo e(trans('public.pending')); ?></span>
                                                <?php else: ?>
                                                    <span class="stat-value text-primary"><?php echo e(trans('update.sent')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                                <span class="stat-value"><?php echo e($item->id); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($sale->gift_id)): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('update.gift_receive_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e((!empty($sale->gift_date)) ? dateTimeFormat($sale->gift_date, 'j M Y H:i') : trans('update.instantly')); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                                <span class="stat-value"><?php echo e(!empty($item->category_id) ? $item->category->title : ''); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($sale->webinar) and $item->type == 'webinar'): ?>
                                            <?php if($item->isProgressing() and !empty($nextSession)): ?>
                                                <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                    <span class="stat-title"><?php echo e(trans('webinars.next_session_duration')); ?>:</span>
                                                    <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($nextSession->duration)); ?> Hrs</span>
                                                </div>

                                                <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                    <span class="stat-title"><?php echo e(trans('webinars.next_session_start_date')); ?>:</span>
                                                    <span class="stat-value"><?php echo e(dateTimeFormat($nextSession->date,'j M Y')); ?></span>
                                                </div>
                                            <?php else: ?>
                                                <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                    <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                                    <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($item->duration)); ?> Hrs</span>
                                                </div>

                                                <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                    <span class="stat-title"><?php echo e(trans('public.start_date')); ?>:</span>
                                                    <span class="stat-value"><?php echo e(dateTimeFormat($item->start_date,'j M Y')); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif(!empty($sale->bundle)): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                                <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($item->getBundleDuration())); ?> Hrs</span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($sale->gift_id) and $sale->buyer_id == $authUser->id): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('update.receipt')); ?>:</span>
                                                <span class="stat-value"><?php echo e($sale->gift_recipient); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.instructor')); ?>:</span>
                                                <span class="stat-value"><?php echo e($item->teacher->full_name); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($sale->gift_id) and $sale->buyer_id != $authUser->id): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('update.gift_sender')); ?>:</span>
                                                <span class="stat-value"><?php echo e($sale->gift_sender); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('panel.purchase_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e(dateTimeFormat($sale->created_at,'j M Y')); ?></span>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
            'file_name' => 'student.png',
            'title' => trans('panel.no_result_purchases') ,
            'hint' => trans('panel.no_result_purchases_hint') ,
            'btn' => ['url' => '/classes?sort=newest','text' => trans('panel.start_learning')]
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($sales->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>

    <?php echo $__env->make('web.default.panel.webinar.join_webinar_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var undefinedActiveSessionLang = '<?php echo e(trans('webinars.undefined_active_session')); ?>';
    </script>

    <script src="/assets/default/js/panel/join_webinar.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/panel/webinar/purchases.blade.php ENDPATH**/ ?>