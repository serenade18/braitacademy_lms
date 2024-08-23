<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="topics-title-section mt-30 mt-md-50 px-20 px-md-30 py-25 py-md-35 rounded-lg">
            <h1 class="font-30 font-weight-bold text-white"><?php echo e($forum->title); ?></h1>
            <p class="font-14 text-white"><?php echo e($forum->description); ?></p>

            <div class="mt-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item font-12 text-white"><a href="/" class="text-white"><?php echo e(getGeneralSettings('site_name')); ?></a></li>
                        <li class="breadcrumb-item font-12 text-white"><a href="/forums" class="text-white"><?php echo e(trans('update.forum')); ?></a></li>
                        <li class="breadcrumb-item font-12 text-white font-weight-bold" aria-current="page"><?php echo e($forum->title); ?></li>
                    </ol>
                </nav>
            </div>
        </section>

        <div class="topics-filters-section bg-white rounded-lg px-20 py-25 mt-40">
            <div class="row">
                <div class="col-12 col-md-5">
                    <h3 class="font-16 font-weight-bold text-secondary"><?php echo e(trans('update.topics_in_this_forum',['count' => $topics->count()])); ?></h3>

                    <div class="d-flex align-items-center mt-5">
                        <a href="<?php echo e(request()->url()); ?>?sort=newest" class="font-14 font-weight-500 mr-20 <?php echo e((empty(request()->get('sort')) or request()->get('sort') == 'newest') ? 'text-primary' : 'text-gray'); ?>"><?php echo e(trans('public.newest')); ?></a>
                        <a href="<?php echo e(request()->url()); ?>?sort=popular_topics" class="font-14 font-weight-500 mr-20 <?php echo e((request()->get('sort') == 'popular_topics') ? 'text-primary' : 'text-gray'); ?>"><?php echo e(trans('update.popular_topics')); ?></a>
                        <a href="<?php echo e(request()->url()); ?>?sort=not_answered" class="font-14 font-weight-500 <?php echo e((request()->get('sort') == 'not_answered') ? 'text-primary' : 'text-gray'); ?>"><?php echo e(trans('update.not_answered')); ?></a>
                    </div>
                </div>

                <div class="col-12 col-md-7  mt-15 mt-lg-0">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <form action="" method="get">
                                <div class="d-flex align-items-center">
                                    <input type="text" name="search" value="<?php echo e(request()->get('search')); ?>" class="form-control flex-grow-1 input-search-topic" placeholder="<?php echo e(trans('update.search_in_this_forum')); ?>">
                                    <button type="submit" class="btn btn-sm btn-primary btn-search-topic ml-10">
                                        <i data-feather="search" class="text-white" width="20" height="20"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-5 mt-15 mt-lg-0 text-right">
                            <?php if($forum->close): ?>
                                <button type="button" class="btn btn-primary btn-create-topic disabled btn-block" disabled>
                                    <i data-feather="file" class="text-white" width="16" height="16"></i>
                                    <span class="ml-1"><?php echo e(trans('update.forum_closed')); ?></span>
                                </button>
                            <?php else: ?>
                                <a href="/forums/create-topic<?php echo e($forum->checkUserCanCreateTopic() ? '?forum_id='.$forum->id : ''); ?>" class="btn btn-primary btn-create-topic btn-block">
                                    <i data-feather="file" class="text-white" width="16" height="16"></i>
                                    <span class="ml-1"><?php echo e(trans('update.create_a_new_topic')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20">
            <div class="row">
                <div class="col-12 col-md-9">
                    <?php if($forum->checkUserCanCreateTopic()): ?>
                        <?php if(!empty($topics) and count($topics)): ?>
                            <div class="rounded-lg px-15 py-20 border bg-white">

                                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="topics-lists-card row align-items-center py-10">
                                        <div class="col-12 col-md-6">
                                            <div class="d-flex align-items-center">
                                                <div class="topic-user-avatar rounded-circle">
                                                    <img src="<?php echo e($topic->creator->getAvatar()); ?>" class="img-cover rounded-circle" alt="<?php echo e($topic->creator->full_name); ?>">
                                                </div>
                                                <div class="ml-10 mw-100">
                                                    <a href="<?php echo e($topic->getPostsUrl()); ?>" class="">
                                                        <h4 class="font-14 font-weight-bold text-secondary text-ellipsis"><?php echo e($topic->title); ?></h4>
                                                    </a>
                                                    <span class="d-block font-12 mt-5 text-gray"><?php echo e(trans('public.by')); ?> <?php echo e($topic->creator->full_name); ?> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($topic->created_at,'j M Y | H:i')); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 d-none d-md-block">
                                            <div class="row">
                                                <div class="col-3 text-center">
                                                    <span class="d-block font-14 text-gray font-weight-bold"><?php echo e($topic->posts_count); ?></span>
                                                    <span class="d-block font-12 text-gray"><?php echo e(trans('site.posts')); ?></span>
                                                </div>
                                                <div class="col-3 d-flex align-items-center">
                                                    <?php if($topic->pin): ?>
                                                        <div class="topics-lists-card__icons rounded-circle mr-10">
                                                            <img src="/assets/default/img/learning/un_pin.svg" alt="" class="img-cover rounded-circle">
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($topic->close): ?>
                                                        <div class="topics-lists-card__icons rounded-circle">
                                                            <img src="/assets/default/img/learning/lock.svg" alt="" class="img-cover rounded-circle">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <?php if(!empty($topic->lastPost)): ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="topic-last-post-user-avatar rounded-circle">
                                                                <img src="<?php echo e($topic->lastPost->user->getAvatar(30)); ?>" class="img-cover rounded-circle" alt="<?php echo e($topic->lastPost->user->full_name); ?>">
                                                            </div>
                                                            <div class="ml-10">
                                                                <h4 class="font-12 font-weight-500 text-gray"><?php echo e($topic->lastPost->user->full_name); ?></h4>
                                                                <span class="d-block font-12 font-weight-500 text-gray"><?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($topic->lastPost->created_at,'j M Y | H:i')); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <div class="mt-20">
                                <?php echo e($topics->appends(request()->input())->links('vendor.pagination.panel')); ?>

                            </div>
                        <?php else: ?>
                            <div class="topics-not-result d-flex align-items-center justify-content-center flex-column">
                                <div class="topics-not-result-icon d-flex align-items-center justify-content-center">
                                    <img src="/assets/default/img/learning/forum-empty.svg" class="img-fluid" alt="">
                                </div>

                                <div class="d-flex align-items-center flex-column mt-10 text-center">
                                    <h3 class="font-20 font-weight-bold text-dark-blue text-center"><?php echo e(trans('update.result_not_found')); ?></h3>
                                    <p class="font-14 font-weight-500 text-gray mt-5 text-center"><?php echo e(trans('update.try_another_word_to_reach_results')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="topics-not-result d-flex align-items-center justify-content-center flex-column">
                            <div class="topics-not-result-icon d-flex align-items-center justify-content-center">
                                <img src="/assets/default/img/learning/forum-empty.svg" class="img-fluid" alt="">
                            </div>

                            <div class="d-flex align-items-center flex-column mt-10 text-center">
                                <h3 class="font-20 font-weight-bold text-dark-blue text-center"><?php echo e(trans('update.result_not_found')); ?></h3>
                                <p class="font-14 font-weight-500 text-gray mt-5 text-center"><?php echo e(trans('update.you_not_access_to_this_forum')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-md-3">
                    <?php if(!empty($topUsers) and count($topUsers)): ?>
                        <div class="rounded-lg p-15 border bg-white">
                            <h3 class="topics-right-side-title position-relative font-16 text-dark font-weight-bold mb-25"><?php echo e(trans('update.top_users')); ?></h3>

                            <?php $__currentLoopData = $topUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($topUser->all_posts)): ?>
                                    <div class="d-flex align-items-center mt-15">
                                        <div class="topics-right-side-user-avatar rounded-circle">
                                            <img src="<?php echo e($topUser->getAvatar(48)); ?>" class="img-cover rounded-circle" alt="<?php echo e($topUser->full_name); ?>">
                                        </div>
                                        <div class="ml-10">
                                            <a href="<?php echo e($topUser->getProfileUrl()); ?>" class="d-block">
                                                <span class="font-14 font-weight-500 text-secondary"><?php echo e($topUser->full_name); ?></span>
                                            </a>
                                            <span class="d-block font-12 font-weight-500 text-gray"><?php echo e(trans('update.n_posts',['count' => $topUser->posts])); ?> | <?php echo e(trans('update.n_topics',['count' => $topUser->topics])); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($popularTopics) and count($popularTopics)): ?>
                        <div class="rounded-lg p-15 border bg-white mt-20">
                            <h3 class="topics-right-side-title position-relative font-16 text-dark font-weight-bold mb-25"><?php echo e(trans('update.popular_topics')); ?></h3>

                            <?php $__currentLoopData = $popularTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularTopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex align-items-center mt-15">
                                    <div class="topics-right-side-user-avatar rounded-circle">
                                        <img src="<?php echo e(!empty($popularTopic->creator) ? $popularTopic->creator->getAvatar(48) : ''); ?>" class="img-cover rounded-circle" alt="<?php echo e(!empty($popularTopic->creator) ? $popularTopic->creator->full_name : ''); ?>">
                                    </div>
                                    <div class="ml-10">
                                        <a href="<?php echo e($popularTopic->getPostsUrl()); ?>" class="d-block pb-5">
                                            <span class="font-14 font-weight-500 text-secondary"><?php echo e($popularTopic->title); ?></span>
                                        </a>
                                        <span class="d-block font-12 font-weight-500 text-gray"><?php echo e(trans('public.by')); ?> <?php echo e($popularTopic->creator->full_name); ?> | <?php echo e(trans('update.n_posts',['count' => $popularTopic->posts_count])); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forum\topics.blade.php ENDPATH**/ ?>