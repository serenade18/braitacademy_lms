<?php $__env->startSection('content'); ?>
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        <img src="<?php echo e(getPageBackgroundSettings('products_lists')); ?>" class="img-cover" alt=""/>

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        <h1 class="text-white font-30 mb-15"><?php echo e(trans('update.products')); ?></h1>
                        <span class="course-count-badge py-5 px-10 text-white rounded"><?php echo e($productsCount); ?> <?php echo e(trans('update.products')); ?></span>

                        <div class="search-input bg-white p-10 flex-grow-1">
                            <form action="<?php echo e((!empty($isRewardProducts) and $isRewardProducts) ? '/reward-products' : '/products'); ?>" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0" value="<?php echo e(request()->get('search')); ?>" placeholder="<?php echo e(trans('update.products_search_placeholder')); ?>"/>
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
            <form action="<?php echo e((!empty($isRewardProducts) and $isRewardProducts) ? '/reward-products' : '/products'); ?>" method="get" id="filtersForm">

                <?php echo $__env->make('web.default.products.includes.top_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-md-6 col-lg-4 mt-20">
                                    <?php echo $__env->make('web.default.products.includes.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>


                    <div class="col-12 col-md-3">
                        <?php echo $__env->make('web.default.products.includes.right_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </form>

            <div class="mt-50 pt-30">
                <?php echo e($products->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/parts/products_lists.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\search.blade.php ENDPATH**/ ?>