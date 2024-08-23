<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="section-title"><?php echo e(trans('panel.favorite_live_classes')); ?></h2>
        </div>

        <?php if(!empty($favorites) and !$favorites->isEmpty()): ?>

            <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $favItem = !empty($favorite->upcoming_course_id) ? $favorite->upcomingCourse : ((!empty($favorite->webinar_id)) ? $favorite->webinar : $favorite->bundle);
                ?>

                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($favItem->getImage()); ?>" class="img-cover" alt="">

                                <?php if(!empty($favorite->webinar_id) and $favItem->type == 'webinar'): ?>
                                    <div class="progress">
                                        <span class="progress-bar" style="width: <?php echo e($favItem->getProgress()); ?>%"></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($favItem->getUrl()); ?>" target="_blank">
                                        <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e($favItem->title); ?></h3>
                                    </a>

                                    <div class="btn-group dropdown table-actions">
                                        <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical" height="20"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/panel/webinars/favorites/<?php echo e($favorite->id); ?>/delete" class="webinar-actions d-block delete-action"><?php echo e(trans('public.remove')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php if(empty($favorite->upcoming_course_id)): ?>
                                    <?php echo $__env->make(getTemplate() . '.includes.webinar.rate',['rate' => $favItem->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                                <div class="webinar-price-box mt-15">
                                    <?php if(empty($favorite->upcoming_course_id) and $favItem->bestTicket() < $favItem->price): ?>
                                        <span class="real"><?php echo e(handlePrice($favItem->bestTicket(), true, true, false, null, true)); ?></span>
                                        <span class="off ml-10"><?php echo e(handlePrice($favItem->price, true, true, false, null, true)); ?></span>
                                    <?php else: ?>
                                        <span class="real"><?php echo e(handlePrice($favItem->price, true, true, false, null, true)); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($favItem->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($favItem->category_id) ? $favItem->category->title : ''); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                        <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($favItem->duration)); ?> <?php echo e(trans('home.hours')); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <?php if(!empty($favorite->webinar_id) and $favItem->isWebinar()): ?>
                                            <span class="stat-title"><?php echo e(trans('public.start_date')); ?>:</span>
                                        <?php else: ?>
                                            <span class="stat-title"><?php echo e(trans('public.created_at')); ?>:</span>
                                        <?php endif; ?>

                                        <span class="stat-value"><?php echo e(dateTimeFormat(!empty($favItem->start_date) ? $favItem->start_date : $favItem->created_at,'j M Y')); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.instructor')); ?>:</span>
                                        <span class="stat-value"><?php echo e($favItem->teacher->full_name); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'student.png',
                'title' => trans('panel.no_result_favorites'),
                'hint' =>  trans('panel.no_result_favorites_hint') ,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($favorites->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\favorites.blade.php ENDPATH**/ ?>