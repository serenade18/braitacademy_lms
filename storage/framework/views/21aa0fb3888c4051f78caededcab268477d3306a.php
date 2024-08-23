<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        <img src="<?php echo e(getPageBackgroundSettings($page)); ?>" class="img-cover" alt=""/>

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        <h1 class="text-white font-30 mb-15"><?php echo e($title); ?></h1>
                        <span class="course-count-badge py-5 px-10 text-white rounded"><?php echo e($instructorsCount); ?> <?php echo e($title); ?></span>

                        <div class="search-input bg-white p-10 flex-grow-1">
                            <form action="/<?php echo e($page); ?>" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0" value="<?php echo e(request()->get('search')); ?>" placeholder="<?php echo e(trans('public.search')); ?> <?php echo e($title); ?>"/>
                                    <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('home.find')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <form id="filtersForm" action="/<?php echo e($page); ?>" method="get">

            <div id="topFilters" class="mt-25 shadow-lg border border-gray300 rounded-sm p-10 p-md-20">
                <div class="row align-items-center">
                    <div class="col-lg-9 d-block d-md-flex align-items-center justify-content-start my-25 my-lg-0">
                        <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                            <label class="mb-0 mr-10 cursor-pointer" for="available_for_meetings"><?php echo e(trans('public.available_for_meetings')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="available_for_meetings" class="custom-control-input" id="available_for_meetings" <?php if(request()->get('available_for_meetings',null) == 'on'): ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label" for="available_for_meetings"></label>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between justify-content-md-center mx-0 mx-md-20 my-20 my-md-0">
                            <label class="mb-0 mr-10 cursor-pointer" for="free_meetings"><?php echo e(trans('public.free_meetings')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="free_meetings" class="custom-control-input" id="free_meetings" <?php if(request()->get('free_meetings',null) == 'on'): ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label" for="free_meetings"></label>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                            <label class="mb-0 mr-10 cursor-pointer" for="discount"><?php echo e(trans('public.discount')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="discount" class="custom-control-input" id="discount" <?php if(request()->get('discount',null) == 'on'): ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label" for="discount"></label>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 d-flex align-items-center">
                        <select name="sort" class="form-control">
                            <option disabled selected><?php echo e(trans('public.sort_by')); ?></option>
                            <option value=""><?php echo e(trans('public.all')); ?></option>
                            <option value="top_rate" <?php if(request()->get('sort',null) == 'top_rate'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('site.top_rate')); ?></option>
                            <option value="top_sale" <?php if(request()->get('sort',null) == 'top_sale'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('site.top_sellers')); ?></option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="mt-30 px-20 py-15 rounded-sm shadow-lg border border-gray300">
                <h3 class="category-filter-title font-20 font-weight-bold"><?php echo e(trans('categories.categories')); ?></h3>

                <div class="p-10 mt-20 d-flex  flex-wrap">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox-button bordered-200 mt-5 mr-15">
                                    <input type="checkbox" name="categories[]" id="checkbox<?php echo e($subCategory->id); ?>" value="<?php echo e($subCategory->id); ?>" <?php if(in_array($subCategory->id,request()->get('categories',[]))): ?> checked="checked" <?php endif; ?>>
                                    <label for="checkbox<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->title); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="checkbox-button bordered-200 mr-20">
                                <input type="checkbox" name="categories[]" id="checkbox<?php echo e($category->id); ?>" value="<?php echo e($category->id); ?>" <?php if(in_array($category->id,request()->get('categories',[]))): ?> checked="checked" <?php endif; ?>>
                                <label for="checkbox<?php echo e($category->id); ?>"><?php echo e($category->title); ?></label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </form>

        <section>
            <div id="instructorsList" class="row mt-20">

                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <?php echo $__env->make('web.default.pages.instructor_card',['instructor' => $instructor], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="text-center">
                <button type="button" id="loadMoreInstructors" data-page="<?php echo e(($page == 'instructors') ? \App\Models\Role::$teacher : \App\Models\Role::$organization); ?>" class="btn btn-border-white mt-50 <?php echo e(($instructors->lastPage() <= $instructors->currentPage()) ? ' d-none' : ''); ?>"><?php echo e(trans('site.load_more_instructors')); ?></button>
            </div>
        </section>


        <?php if(!empty($bestRateInstructors) and !$bestRateInstructors->isEmpty() and (empty(request()->get('sort')) or !in_array(request()->get('sort'),['top_rate','top_sale']))): ?>
            <section class="mt-30 pt-30">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 class="font-24 text-dark-blue"><?php echo e(trans('site.best_rated_instructors')); ?></h2>
                        <span class="font-14 text-gray"><?php echo e(trans('site.best_rated_instructors_subtitle')); ?></span>
                    </div>

                    <a href="/<?php echo e($page); ?>?sort=top_rate" class="btn btn-border-white"><?php echo e(trans('home.view_all')); ?></a>
                </div>

                <div class="position-relative mt-20">
                    <div id="bestRateInstructorsSwiper" class="swiper-container px-12">
                        <div class="swiper-wrapper pb-20">

                            <?php $__currentLoopData = $bestRateInstructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bestRateInstructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <?php echo $__env->make('web.default.pages.instructor_card',['instructor' => $bestRateInstructor], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="swiper-pagination best-rate-swiper-pagination"></div>
                    </div>
                </div>

            </section>
        <?php endif; ?>

        <?php if(!empty($bestSalesInstructors) and !$bestSalesInstructors->isEmpty() and (empty(request()->get('sort')) or !in_array(request()->get('sort'),['top_rate','top_sale']))): ?>
            <section class="mt-50 pt-50">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2 class="font-24 text-dark-blue"><?php echo e(trans('site.top_sellers')); ?></h2>
                        <span class="font-14 text-gray"><?php echo e(trans('site.top_sellers_subtitle')); ?></span>
                    </div>

                    <a href="/<?php echo e($page); ?>?sort=top_sale" class="btn btn-border-white"><?php echo e(trans('home.view_all')); ?></a>
                </div>

                <div class="position-relative mt-20">
                    <div id="topSaleInstructorsSwiper" class="swiper-container px-12">
                        <div class="swiper-wrapper pb-20">

                            <?php $__currentLoopData = $bestSalesInstructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bestSalesInstructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <?php echo $__env->make('web.default.pages.instructor_card',['instructor' => $bestSalesInstructor], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="swiper-pagination best-sale-swiper-pagination"></div>
                    </div>
                </div>

            </section>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>

    <script src="/assets/default/js/parts/instructors.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\pages\instructors.blade.php ENDPATH**/ ?>