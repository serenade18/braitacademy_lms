<?php $__env->startSection('content'); ?>
    <section class="site-top-banner search-top-banner opacity-04 position-relative">
        <img src="<?php echo e(getPageBackgroundSettings('blog')); ?>" class="img-cover" alt=""/>

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <div class="top-search-categories-form">
                        <h1 class="text-white font-30 mb-15"><?php echo e($pageTitle); ?></h1>
                        <span class="course-count-badge py-5 px-10 text-white rounded"><?php echo e($blogCount); ?> <?php echo e(trans('site.posts')); ?></span>

                        <div class="search-input bg-white p-10 flex-grow-1">
                            <form action="/blog" method="get">
                                <div class="form-group d-flex align-items-center m-0">
                                    <input type="text" name="search" class="form-control border-0" value="<?php echo e(request()->get('search')); ?>" placeholder="<?php echo e(trans('home.blog_search_placeholder')); ?>"/>
                                    <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('home.find')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-10 mt-md-40">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="mt-30">
                                <?php echo $__env->make('web.default.blog.grid-list',['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="col-12 col-lg-4">

                <div class="p-20 mt-30 rounded-sm shadow-lg border border-gray300">
                    <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('categories.categories')); ?></h3>

                    <div class="pt-15">
                        <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($blogCategory->getUrl()); ?>" class="font-14 text-dark-blue d-block mt-15"><?php echo e($blogCategory->title); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="p-20 mt-30 rounded-sm shadow-lg border border-gray300">
                    <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('site.popular_posts')); ?></h3>

                    <div class="pt-15">

                        <?php $__currentLoopData = $popularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="popular-post d-flex align-items-start mt-20">
                                <div class="popular-post-image rounded">
                                    <img src="<?php echo e($popularPost->image); ?>" class="img-cover rounded" alt="<?php echo e($popularPost->title); ?>">
                                </div>
                                <div class="popular-post-content d-flex flex-column ml-10">
                                    <a href="<?php echo e($popularPost->getUrl()); ?>">
                                        <h3 class="text-dark-blue font-14"><?php echo e(truncate($popularPost->title,50)); ?></h3>
                                    </a>
                                    <span class="mt-auto font-12 text-gray"><?php echo e(dateTimeFormat($popularPost->created_at, 'j M Y')); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <a href="/blog" class="btn btn-sm btn-primary btn-block mt-30"><?php echo e(trans('home.view_all')); ?> <?php echo e(trans('site.posts')); ?></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-20 mt-md-50 pt-30">
            <?php echo e($blog->appends(request()->input())->links('vendor.pagination.panel')); ?>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/blog/index.blade.php ENDPATH**/ ?>