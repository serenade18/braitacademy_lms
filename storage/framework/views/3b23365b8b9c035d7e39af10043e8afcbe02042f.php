<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        <img src="<?php echo e(getPageBackgroundSettings('upcoming_courses_lists')); ?>" class="img-cover" alt=""/>

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        <h1 class="text-white font-30 mb-15"><?php echo e(trans('update.upcoming_courses')); ?></h1>
                        <span class="course-count-badge py-5 px-10 text-white rounded"><?php echo e($upcomingCoursesCount); ?> <?php echo e(trans('product.courses')); ?></span>

                        <div class="search-input bg-white p-10 flex-grow-1">
                            <form action="/upcoming_courses" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0" placeholder="<?php echo e(trans('home.slider_search_placeholder')); ?>"/>
                                    <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('home.find')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-30">

        <section class="mt-lg-50 pt-lg-20 mt-md-40 pt-md-40">
            <form action="/upcoming_courses" method="get" id="filtersForm">

                <?php echo $__env->make('web.default.upcoming_courses.includes.top_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row mt-20">
                    <div class="col-12 col-lg-8">

                        <?php if(empty(request()->get('card')) or request()->get('card') == 'grid'): ?>
                            <div class="row">
                                <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-lg-6 mt-20">
                                        <?php echo $__env->make('web.default.includes.webinar.upcoming_course_grid_card',['upcomingCourse' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        <?php elseif(!empty(request()->get('card')) and request()->get('card') == 'list'): ?>

                            <?php $__currentLoopData = $upcomingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('web.default.includes.webinar.upcoming_course_list_card',['upcomingCourse' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>


                    <div class="col-12 col-lg-4">
                        <?php echo $__env->make('web.default.upcoming_courses.includes.right_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </form>
            <div class="mt-50 pt-30">
                <?php echo e($upcomingCourses->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>

    <script src="/assets/default/js/parts/categories.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/upcoming_courses/lists.blade.php ENDPATH**/ ?>