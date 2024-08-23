<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('update.overview')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/upcoming.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalCourses); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.total_courses')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($releasedCourses); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.released_courses')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($notReleased); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.not_released')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/49.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($followers); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.followers')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.my_upcoming_courses')); ?></h2>

            <form action="" method="get">
                <div class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="cursor-pointer mb-0 mr-10 font-weight-500 font-14 text-gray" for="onlyReleasedSwitch"><?php echo e(trans('update.only_not_released_courses')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="only_not_released_courses" <?php if(request()->get('only_not_released_courses','') == 'on'): ?> checked <?php endif; ?> class="custom-control-input" id="onlyReleasedSwitch">
                        <label class="custom-control-label" for="onlyReleasedSwitch"></label>
                    </div>
                </div>
            </form>
        </div>

        <?php if(!empty($upcomingCourses) and !$upcomingCourses->isEmpty()): ?>
            <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($upcomingCourse->getImage()); ?>" class="img-cover" alt="">

                                <div class="badges-lists">
                                    <?php if(!empty($upcomingCourse->webinar_id)): ?>
                                        <span class="badge badge-secondary"><?php echo e(trans('update.released')); ?></span>
                                    <?php else: ?>
                                        <?php switch($upcomingCourse->status):
                                            case (\App\Models\UpcomingCourse::$active): ?>
                                                <span class="badge badge-primary"><?php echo e(trans('public.published')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\UpcomingCourse::$isDraft): ?>
                                                <span class="badge badge-danger"><?php echo e(trans('public.draft')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\UpcomingCourse::$pending): ?>
                                                <span class="badge badge-warning"><?php echo e(trans('public.waiting')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\UpcomingCourse::$inactive): ?>
                                                <span class="badge badge-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if(!empty($upcomingCourse->course_progress)): ?>
                                    <div class="progress">
                                        <span class="progress-bar <?php echo e(($upcomingCourse->course_progress < 50) ? 'bg-warning' : ''); ?>" style="width: <?php echo e($upcomingCourse->course_progress); ?>%"></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($upcomingCourse->getUrl()); ?>" target="_blank">
                                        <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e($upcomingCourse->title); ?>

                                            <span class="badge badge-dark ml-10 status-badge-dark"><?php echo e(trans('webinars.'.$upcomingCourse->type)); ?></span>
                                        </h3>
                                    </a>

                                    <?php if($upcomingCourse->canAccess($authUser)): ?>
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu ">
                                                <?php if(!empty($upcomingCourse->webinar_id)): ?>
                                                    <a href="<?php echo e($upcomingCourse->webinar->getUrl()); ?>" class="webinar-actions d-block text-primary"><?php echo e(trans('update.view_course')); ?></a>
                                                <?php else: ?>
                                                    <?php if($upcomingCourse->status == \App\Models\UpcomingCourse::$isDraft): ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_create')): ?>
                                                            <a href="/panel/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/step/4" class="js-send-for-reviewer webinar-actions btn-transparent d-block text-primary"><?php echo e(trans('update.send_for_reviewer')); ?></a>
                                                        <?php endif; ?>
                                                    <?php elseif($upcomingCourse->status == \App\Models\UpcomingCourse::$active): ?>
                                                        <button type="button" data-id="<?php echo e($upcomingCourse->id); ?>" class="js-mark-as-released webinar-actions btn-transparent d-block text-primary"><?php echo e(trans('update.mark_as_released')); ?></button>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_create')): ?>
                                                        <a href="/panel/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($upcomingCourse->status == \App\Models\UpcomingCourse::$active): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_followers')): ?>
                                                        <a href="/panel/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/followers" class="webinar-actions d-block mt-10"><?php echo e(trans('update.view_followers')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($upcomingCourse->creator_id == $authUser->id): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_upcoming_courses_delete')): ?>
                                                        <a href="/panel/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/delete" class="webinar-actions d-block mt-10 text-danger delete-action"><?php echo e(trans('public.delete')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($upcomingCourse->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($upcomingCourse->category_id) ? $upcomingCourse->category->title : ''); ?></span>
                                    </div>

                                    <?php if(!empty($upcomingCourse->duration)): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('public.duration')); ?>:</span>
                                            <span class="stat-value"><?php echo e(convertMinutesToHourAndMinute($upcomingCourse->duration)); ?> Hrs</span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($upcomingCourse->publish_date)): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('update.estimated_publish_date')); ?>:</span>
                                            <span class="stat-value"><?php echo e(dateTimeFormat($upcomingCourse->publish_date, 'j M Y H:i')); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.price')); ?>:</span>
                                        <span class="stat-value"><?php echo e((!empty($upcomingCourse->price)) ? handlePrice($upcomingCourse->price) : trans('public.free')); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('update.followers')); ?>:</span>
                                        <span class="stat-value"><?php echo e($upcomingCourse->followers_count ?? 0); ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="my-30">
                <?php echo e($upcomingCourses->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>

        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'webinar.png',
                'title' => trans('update.you_not_have_any_upcoming_courses'),
                'hint' =>  trans('update.you_not_have_any_upcoming_courses_hint') ,
                'btn' => ['url' => '/panel/upcoming_courses/new','text' => trans('update.create_a_upcoming_course') ]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

    <script src="/assets/default/js/panel/upcoming_course.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\upcoming_courses\lists.blade.php ENDPATH**/ ?>