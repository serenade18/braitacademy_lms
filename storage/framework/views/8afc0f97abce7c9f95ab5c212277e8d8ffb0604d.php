<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <?php
        $resultCount = 0;

        if (!empty($webinars)) {
            $resultCount += count($webinars);
        }

        if (!empty($bundles)) {
            $resultCount += count($bundles);
        }

        if (!empty($upcomingCourses)) {
            $resultCount += count($upcomingCourses);
        }
    ?>

    <?php if((!empty($webinars) and count($webinars)) or (!empty($bundles) and count($bundles)) or (!empty($upcomingCourses) and count($upcomingCourses))): ?>
        <section class="site-top-banner search-top-banner opacity-04 position-relative">
            <img src="<?php echo e(getPageBackgroundSettings('tags')); ?>" class="img-cover" alt=""/>

            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-12 col-md-9 col-lg-7">
                        <div class="top-search-form">
                            <h1 class="text-white font-30 white-space-pre-wrap"><?php echo e(trans('site.result_find',['count' => $resultCount , 'search' => $tag])); ?></h1>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <?php if(!empty($webinars) and count($webinars)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('product.courses')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mt-30">
                                <?php echo $__env->make('web.default.includes.webinar.grid-card',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if(!empty($bundles) and count($bundles)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('update.bundles')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mt-30">
                                <?php echo $__env->make('web.default.includes.webinar.grid-card',['webinar' => $bundle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if(!empty($upcomingCourses) and count($upcomingCourses)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('update.upcoming_courses')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mt-30">
                                <?php echo $__env->make('web.default.includes.webinar.upcoming_course_grid_card',['upcomingCourse' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

        </div>
    <?php else: ?>

        <div class="no-result status-failed my-50 d-flex align-items-center justify-content-center flex-column">
            <div class="no-result-logo">
                <img src="/assets/default/img/no-results/search.png" alt="">
            </div>
            <div class="container">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-12 col-md-9 col-lg-7">
                        <div class="d-flex align-items-center flex-column mt-30 text-center w-100">
                            <h2><?php echo e(trans('site.no_result_search')); ?></h2>
                            <p class="mt-5 text-center white-space-pre-wrap"><?php echo e(trans('site.no_result_search_hint',['search' => $tag])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\pages\tags.blade.php ENDPATH**/ ?>