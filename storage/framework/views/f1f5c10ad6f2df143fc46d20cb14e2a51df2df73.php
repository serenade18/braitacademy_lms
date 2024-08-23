<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="section-title"><?php echo e(trans('update.following_courses')); ?></h2>
        </div>

        <?php if(!empty($upcomingCourses) and $upcomingCourses->isNotEmpty()): ?>

            <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($upcomingCourse->getImage()); ?>" class="img-cover" alt="">

                                

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
                                            <span class="stat-title"><?php echo e(trans('webinars.next_session_duration')); ?>:</span>
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
                                        <span class="stat-value"><?php echo e((!empty($upcomingCourse->price) and $upcomingCourse->price > 0) ? handlePrice($upcomingCourse->price) : trans('free')); ?></span>
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
                'file_name' => 'student.png',
                'title' => trans('update.no_result_following_course'),
                'hint' =>  trans('update.no_result_following_course_hint') ,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\upcoming_courses\followings.blade.php ENDPATH**/ ?>