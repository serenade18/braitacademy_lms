<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/vendors/leaflet/leaflet.css">
    <link rel="stylesheet" href="/assets/vendors/leaflet/leaflet.markercluster/markerCluster.css">
    <link rel="stylesheet" href="/assets/vendors/leaflet/leaflet.markercluster/markerCluster.Default.css">
    <link rel="stylesheet" href="/assets/vendors/wrunner-html-range-slider-with-2-handles/css/wrunner-default-theme.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="instructor-finder">

        <?php if((!empty($mapCenter) and is_array($mapCenter))): ?>
            <section id="instructorFinderMap"
                     class="instructor-finder-map"
                     data-latitude="<?php echo e($mapCenter[0]); ?>"
                     data-longitude="<?php echo e($mapCenter[1]); ?>"
                     data-zoom="<?php echo e($mapZoom); ?>"
            >

            </section>
        <?php endif; ?>

        <div class="container">

            <form id="filtersForm" action="/instructor-finder?<?php echo e(http_build_query(request()->all())); ?>" method="get">

                <?php echo $__env->make('web.default.instructorFinder.components.top_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row flex-lg-row-reverse">
                    <div class="col-12 col-lg-8">

                        <div id="instructorsList">
                            <?php if($instructors->isNotEmpty()): ?>
                                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('web.default.instructorFinder.components.instructor_card', ['instructor' => $instructor], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('web.default.includes.no-result',[
                                           'file_name' => 'support.png',
                                           'title' => trans('update.instructor_finder_no_result'),
                                           'hint' => nl2br(trans('update.instructor_finder_no_result_hint')),
                                       ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="text-center">
                            <button type="button" id="loadMoreInstructors" data-url="/instructor-finder" class="btn btn-border-white mt-50 <?php echo e(($instructors->lastPage() <= $instructors->currentPage()) ? ' d-none' : ''); ?>"><?php echo e(trans('site.load_more_instructors')); ?></button>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">

                        <?php echo $__env->make('web.default.instructorFinder.components.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('web.default.instructorFinder.components.time_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('web.default.instructorFinder.components.location_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/wrunner-html-range-slider-with-2-handles/js/wrunner-jquery.js"></script>
    <script src="/assets/vendors/leaflet/leaflet.min.js"></script>
    <script src="/assets/vendors/leaflet/leaflet.markercluster/leaflet.markercluster-src.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>

    <script>
        var currency = '<?php echo e($currency); ?>';
        var profileLang = '<?php echo e(trans('public.profile')); ?>';
        var hourLang = '<?php echo e(trans('update.hour')); ?>';
        var freeLang = '<?php echo e(trans('public.free')); ?>';
        var mapUsers = JSON.parse(<?php echo json_encode($mapUsers->toJson(), 15, 512) ?>);
        var selectProvinceLang = '<?php echo e(trans('update.select_province')); ?>';
        var selectCityLang = '<?php echo e(trans('update.select_city')); ?>';
        var selectDistrictLang = '<?php echo e(trans('update.select_district')); ?>';
        var leafletApiPath = '<?php echo e(getLeafletApiPath()); ?>';
    </script>

    <script src="/assets/default/js/parts/get-regions.min.js"></script>
    <script src="/assets/default/js/parts/instructor-finder-wizard.min.js"></script>
    <script src="/assets/default/js/parts/instructors.min.js"></script>

    <script src="/assets/default/js/parts/instructor-finder.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\index.blade.php ENDPATH**/ ?>