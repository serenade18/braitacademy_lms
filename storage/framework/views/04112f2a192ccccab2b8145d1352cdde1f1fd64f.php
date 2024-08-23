<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.my_activity')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(!empty($bundles) ? $bundlesCount : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bundles')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(convertMinutesToHourAndMinute($bundlesHours)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('home.hours')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(handlePrice($bundleSalesAmount)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bundle_sales')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/download-sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($bundleSalesCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.bundle_sales_count')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.my_bundles')); ?></h2>
        </div>

        <?php if(!empty($bundles) and !$bundles->isEmpty()): ?>
            <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($bundle->getImage()); ?>" class="img-cover" alt="">

                                <div class="badges-lists">
                                    <?php switch($bundle->status):
                                        case (\App\Models\Bundle::$active): ?>
                                            <span class="badge badge-primary"><?php echo e(trans('panel.active')); ?></span>
                                            <?php break; ?>
                                        <?php case (\App\Models\Bundle::$isDraft): ?>
                                            <span class="badge badge-danger"><?php echo e(trans('public.draft')); ?></span>
                                            <?php break; ?>
                                        <?php case (\App\Models\Bundle::$pending): ?>
                                            <span class="badge badge-warning"><?php echo e(trans('public.waiting')); ?></span>
                                            <?php break; ?>
                                        <?php case (\App\Models\Bundle::$inactive): ?>
                                            <span class="badge badge-danger"><?php echo e(trans('public.rejected')); ?></span>
                                            <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($bundle->getUrl()); ?>" target="_blank">
                                        <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e($bundle->title); ?></h3>
                                    </a>

                                    <?php if($authUser->id == $bundle->creator_id or $authUser->id == $bundle->teacher_id): ?>
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu ">

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_create')): ?>
                                                    <a href="/panel/bundles/<?php echo e($bundle->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_courses')): ?>
                                                    <a href="/panel/bundles/<?php echo e($bundle->id); ?>/courses" class="webinar-actions d-block mt-10"><?php echo e(trans('product.courses')); ?></a>
                                                <?php endif; ?>

                                                <?php if($authUser->id == $bundle->teacher_id or $authUser->id == $bundle->creator_id): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_export_students_list')): ?>
                                                        <a href="/panel/bundles/<?php echo e($bundle->id); ?>/export-students-list" class="webinar-actions d-block mt-10"><?php echo e(trans('public.export_list')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($bundle->creator_id == $authUser->id): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_bundles_delete')): ?>
                                                        <?php echo $__env->make('web.default.panel.includes.content_delete_btn', [
                                                            'deleteContentUrl' => "/panel/bundles/{$bundle->id}/delete",
                                                            'deleteContentClassName' => 'webinar-actions d-block mt-10 text-danger',
                                                            'deleteContentItem' => $bundle,
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $bundle->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="webinar-price-box mt-15">
                                    <?php if($bundle->price > 0): ?>
                                        <?php if($bundle->bestTicket() < $bundle->price): ?>
                                            <span class="real"><?php echo e(handlePrice($bundle->bestTicket(), true, true, false, null, true)); ?></span>
                                            <span class="off ml-10"><?php echo e(handlePrice($bundle->price, true, true, false, null, true)); ?></span>
                                        <?php else: ?>
                                            <span class="real"><?php echo e(handlePrice($bundle->price, true, true, false, null, true)); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="real"><?php echo e(trans('public.free')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($bundle->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($bundle->category_id) ? $bundle->category->title : ''); ?></span>
                                    </div>


                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                        <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($bundle->getBundleDuration())); ?> Hrs</span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('product.courses')); ?>:</span>
                                        <span class="stat-value"><?php echo e($bundle->bundleWebinars->count()); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('panel.sales')); ?>:</span>
                                        <span class="stat-value"><?php echo e(count($bundle->sales)); ?> (<?php echo e((!empty($bundle->sales) and count($bundle->sales)) ? handlePrice($bundle->sales->sum('amount')) : 0); ?>)</span>
                                    </div>

                                    <?php if($authUser->id == $bundle->teacher_id and $authUser->id != $bundle->creator_id and $bundle->creator->isOrganization()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('webinars.organization_name')); ?>:</span>
                                            <span class="stat-value"><?php echo e($bundle->creator->full_name); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="my-30">
                <?php echo e($bundles->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>

        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'webinar.png',
                'title' => trans('update.you_not_have_any_bundle'),
                'hint' =>  trans('update.no_result_bundle_hint') ,
                'btn' => ['url' => '/panel/bundles/new','text' => trans('update.create_a_bundle') ]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\index.blade.php ENDPATH**/ ?>