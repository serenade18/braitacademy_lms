<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <?php if((!empty($webinars) and count($webinars)) or (!empty($products) and count($products)) or (!empty($teachers) and count($teachers)) or (!empty($organizations) and count($organizations))): ?>
        <section class="site-top-banner search-top-banner opacity-04 position-relative">
            <img src="<?php echo e(getPageBackgroundSettings('search')); ?>" class="img-cover" alt=""/>

            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-12 col-md-9 col-lg-7">
                        <div class="top-search-form">
                            <h1 class="text-white font-30 white-space-pre-wrap"><?php echo e(trans('site.result_find',['count' => $resultCount , 'search' => request()->get('search')])); ?></h1>

                            <div class="search-input bg-white p-10 flex-grow-1">
                                <form action="/search" method="get">
                                    <div class="form-group d-flex align-items-center m-0">
                                        <input type="text" name="search" class="form-control border-0" value="<?php echo e(request()->get('search','')); ?>" placeholder="<?php echo e(trans('home.slider_search_placeholder')); ?>"/>
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
            <?php if(!empty($webinars) and count($webinars)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('webinars.webinars')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mt-30">
                                <?php echo $__env->make(getTemplate().'.includes.webinar.grid-card',['webinar' => $webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if(!empty($products) and count($products)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('update.products')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 mt-30">
                                <?php echo $__env->make('web.default.products.includes.card',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if(!empty($teachers) and count($teachers)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('panel.users')); ?></h2>

                    <div class="row">
                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-3 col-lg-2 mt-30">
                                <div class="user-search-card text-center d-flex flex-column align-items-center justify-content-center">
                                    <div class="user-avatar">
                                        <img src="<?php echo e($teacher->getAvatar()); ?>" class="img-cover rounded-circle" alt="<?php echo e($teacher->full_name); ?>">
                                    </div>
                                    <a href="<?php echo e($teacher->getProfileUrl()); ?>">
                                        <h4 class="font-16 font-weight-bold text-dark-blue mt-10"><?php echo e($teacher->full_name); ?></h4>
                                        <span class="d-block font-14 text-gray mt-5"><?php echo e($teacher->bio); ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if(!empty($organizations) and count($organizations)): ?>
                <section class="mt-50">
                    <h2 class="font-24 font-weight-bold text-secondary"><?php echo e(trans('home.organizations')); ?></h2>

                    <div class="row">

                        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-3 mt-30">
                                <a href="<?php echo e($organization->getProfileUrl()); ?>" class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="<?php echo e($organization->getAvatar()); ?>" class="img-cover rounded-circle" alt="<?php echo e($organization->full_name); ?>">
                                    </div>
                                    <div class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title"><?php echo e($organization->full_name); ?></h3>
                                        <p class="home-organizations-desc mt-10"><?php echo e($organization->bio); ?></p>
                                        <span class="home-organizations-badge badge mt-15"><?php echo e($organization->getActiveWebinars(true)); ?> <?php echo e(trans('product.courses')); ?></span>
                                    </div>
                                </a>
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
                            <p class="mt-5 text-center white-space-pre-wrap"><?php echo e(trans('site.no_result_search_hint',['search' => request()->get('search')])); ?></p>

                            <div class="search-input bg-white p-10 mt-20 flex-grow-1 shadow-sm rounded-pill w-100">
                                <form action="/search" method="get">
                                    <div class="form-group d-flex align-items-center m-0">
                                        <input type="text" name="search" class="form-control border-0" value="<?php echo e(request()->get('search','')); ?>" placeholder="<?php echo e(trans('home.slider_search_placeholder')); ?>"/>
                                        <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('home.find')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/pages/search.blade.php ENDPATH**/ ?>