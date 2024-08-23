<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('product.courses')); ?></h2>
        </div>

        <?php if(!empty($bundle->bundleWebinars) and !$bundle->bundleWebinars->isEmpty()): ?>
            <?php $__currentLoopData = $bundle->bundleWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundleWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $webinar = $bundleWebinar->webinar;
                    $lastSession = $webinar->lastSession();
                    $nextSession = $webinar->nextSession();
                    $isProgressing = false;

                    if($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                        $isProgressing=true;
                    }
                ?>

                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($webinar->getImage()); ?>" class="img-cover" alt="">

                                <div class="badges-lists">
                                    <?php switch($webinar->status):
                                        case (\App\Models\Webinar::$active): ?>
                                            <?php if($webinar->isWebinar()): ?>
                                                <?php if($webinar->start_date > time()): ?>
                                                    <span class="badge badge-primary"><?php echo e(trans('panel.not_conducted')); ?></span>
                                                <?php elseif($webinar->isProgressing()): ?>
                                                    <span class="badge badge-secondary"><?php echo e(trans('webinars.in_progress')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary"><?php echo e(trans('public.finished')); ?></span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="badge badge-secondary"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
                                            <?php endif; ?>
                                            <?php break; ?>
                                        <?php case (\App\Models\Webinar::$isDraft): ?>
                                            <span class="badge badge-danger"><?php echo e(trans('public.draft')); ?></span>
                                            <?php break; ?>
                                        <?php case (\App\Models\Webinar::$pending): ?>
                                            <span class="badge badge-warning"><?php echo e(trans('public.waiting')); ?></span>
                                            <?php break; ?>
                                        <?php case (\App\Models\Webinar::$inactive): ?>
                                            <span class="badge badge-danger"><?php echo e(trans('public.rejected')); ?></span>
                                            <?php break; ?>
                                    <?php endswitch; ?>
                                </div>

                                <?php if($webinar->isWebinar()): ?>
                                    <div class="progress">
                                        <span class="progress-bar" style="width: <?php echo e($webinar->getProgress()); ?>%"></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($webinar->getUrl()); ?>" target="_blank">
                                        <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e($webinar->title); ?>

                                            <span class="badge badge-dark ml-10 status-badge-dark"><?php echo e(trans('webinars.'.$webinar->type)); ?></span>
                                        </h3>
                                    </a>

                                    <?php if($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id): ?>
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu ">
                                                <?php if(!empty($webinar->start_date) and ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)): ?>
                                                    <button type="button" data-webinar-id="<?php echo e($webinar->id); ?>" class="js-webinar-next-session webinar-actions btn-transparent d-block"><?php echo e(trans('public.create_join_link')); ?></button>
                                                <?php endif; ?>

                                                <a href="<?php echo e($webinar->getLearningPageUrl()); ?>" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('update.learning_page')); ?></a>

                                                <a href="/panel/webinars/<?php echo e($webinar->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>

                                                <?php if($webinar->isWebinar()): ?>
                                                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/step/4" class="webinar-actions d-block mt-10"><?php echo e(trans('public.sessions')); ?></a>
                                                <?php endif; ?>

                                                <a href="/panel/webinars/<?php echo e($webinar->id); ?>/step/4" class="webinar-actions d-block mt-10"><?php echo e(trans('public.files')); ?></a>


                                                <?php if($webinar->isOwner($authUser->id)): ?>
                                                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/export-students-list" class="webinar-actions d-block mt-10"><?php echo e(trans('public.export_list')); ?></a>
                                                <?php endif; ?>

                                                <?php if($authUser->id == $webinar->creator_id): ?>
                                                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/duplicate" class="webinar-actions d-block mt-10"><?php echo e(trans('public.duplicate')); ?></a>
                                                <?php endif; ?>

                                                <?php if($webinar->isOwner($authUser->id)): ?>
                                                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/statistics" class="webinar-actions d-block mt-10"><?php echo e(trans('update.statistics')); ?></a>
                                                <?php endif; ?>

                                                <?php if($webinar->creator_id == $authUser->id): ?>
                                                    <a href="/panel/webinars/<?php echo e($webinar->id); ?>/delete" class="webinar-actions d-block mt-10 text-danger delete-action"><?php echo e(trans('public.delete')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $webinar->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="webinar-price-box mt-15">
                                    <?php if($webinar->price > 0): ?>
                                        <?php if($webinar->bestTicket() < $webinar->price): ?>
                                            <span class="real"><?php echo e(handlePrice($webinar->bestTicket())); ?></span>
                                            <span class="off ml-10"><?php echo e(handlePrice($webinar->price)); ?></span>
                                        <?php else: ?>
                                            <span class="real"><?php echo e(handlePrice($webinar->price)); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="real"><?php echo e(trans('public.free')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($webinar->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($webinar->category_id) ? $webinar->category->title : ''); ?></span>
                                    </div>

                                    <?php if($webinar->isProgressing() and !empty($nextSession)): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('webinars.next_session_duration')); ?>:</span>
                                            <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($nextSession->duration)); ?> Hrs</span>
                                        </div>

                                        <?php if($webinar->isWebinar()): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('webinars.next_session_start_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e(dateTimeFormat($nextSession->date,'j M Y')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                            <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($webinar->duration)); ?> Hrs</span>
                                        </div>

                                        <?php if($webinar->isWebinar()): ?>
                                            <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                                <span class="stat-title"><?php echo e(trans('public.start_date')); ?>:</span>
                                                <span class="stat-value"><?php echo e(dateTimeFormat($webinar->start_date,'j M Y')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($webinar->isTextCourse() or $webinar->isCourse()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('public.files')); ?>:</span>
                                            <span class="stat-value"><?php echo e($webinar->files->count()); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($webinar->isTextCourse()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('webinars.text_lessons')); ?>:</span>
                                            <span class="stat-value"><?php echo e($webinar->textLessons->count()); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($webinar->isCourse()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('home.downloadable')); ?>:</span>
                                            <span class="stat-value"><?php echo e(($webinar->downloadable) ? trans('public.yes') : trans('public.no')); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('panel.sales')); ?>:</span>
                                        <span class="stat-value"><?php echo e(count($webinar->sales)); ?> (<?php echo e((!empty($webinar->sales) and count($webinar->sales)) ? handlePrice($webinar->sales->sum('amount')) : 0); ?>)</span>
                                    </div>

                                    <?php if(!empty($webinar->partner_instructor) and $webinar->partner_instructor and $authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('panel.invited_by')); ?>:</span>
                                            <span class="stat-value"><?php echo e($webinar->teacher->full_name); ?></span>
                                        </div>
                                    <?php elseif($authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('webinars.teacher_name')); ?>:</span>
                                            <span class="stat-value"><?php echo e($webinar->teacher->full_name); ?></span>
                                        </div>
                                    <?php elseif($authUser->id == $webinar->teacher_id and $authUser->id != $webinar->creator_id and $webinar->creator->isOrganization()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('webinars.organization_name')); ?>:</span>
                                            <span class="stat-value"><?php echo e($webinar->creator->full_name); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'webinar.png',
                'title' => trans('panel.you_not_have_any_webinar'),
                'hint' =>  trans('panel.no_result_hint') ,
                'btn' => ['url' => '/panel/webinars/new','text' => trans('panel.create_a_webinar') ]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </section>

    <?php echo $__env->make('web.default.panel.webinar.make_next_session_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script>
        var undefinedActiveSessionLang = '<?php echo e(trans('webinars.undefined_active_session')); ?>';
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var selectChapterLang = '<?php echo e(trans('update.select_chapter')); ?>';
    </script>

    <script src="/assets/default/js/panel/make_next_session.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\courses.blade.php ENDPATH**/ ?>