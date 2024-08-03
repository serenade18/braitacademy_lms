<?php $__env->startSection('content'); ?>
    <section class="forum-hero-section mt-50 position-relative">
        <div class="container forum-hero-section__container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1 class="font-36 text-secondary">
                        <span><?php echo e(trans('update.need_help?')); ?></span><br/>
                        <span><?php echo e(trans('update.create_a_topic_in_forum')); ?></span>
                    </h1>
                    <p class="font-14 text-gray mt-15"><?php echo e(trans('update.forum_top_section_hint')); ?></p>

                    <div class="search-input bg-white p-10 flex-grow-1 mt-25">
                        <form action="/forums/search" method="get">
                            <div class="form-group d-flex align-items-center m-0">
                                <input type="text" name="search" class="form-control border-0" placeholder="<?php echo e(trans('update.search_discussions')); ?>"/>
                                <button type="submit" class="btn btn-primary rounded-pill"><?php echo e(trans('public.search')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="forum-hero-section__image">
            <img src="/assets/default/img/forum/hero.png" class="img-cover" alt="forum hero">
        </div>
    </section>

    <div class="container mt-40">
        <div class="forum-stat-section rounded-lg bg-white p-20">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <img src="/assets/default/img/forum/1.svg" alt="<?php echo e(trans('update.forums')); ?>" class="forum-stat-icon"/>
                        <span class="font-30 font-weight-bold text-secondary"><?php echo e($forumsCount); ?></span>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.forums')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <img src="/assets/default/img/forum/2.svg" alt="<?php echo e(trans('update.topics')); ?>" class="forum-stat-icon"/>
                        <span class="font-30 font-weight-bold text-secondary"><?php echo e($topicsCount); ?></span>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.topics')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <img src="/assets/default/img/forum/3.svg" alt="<?php echo e(trans('site.posts')); ?>" class="forum-stat-icon"/>
                        <span class="font-30 font-weight-bold text-secondary"><?php echo e($postsCount); ?></span>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('site.posts')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <img src="/assets/default/img/forum/4.svg" alt="<?php echo e(trans('update.members')); ?>" class="forum-stat-icon"/>
                        <span class="font-30 font-weight-bold text-secondary"><?php echo e($membersCount); ?></span>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.members')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!empty($featuredTopics) and count($featuredTopics)): ?>
        <section class="container forums-featured-section mt-30 mt-md-50">

            <div class="text-center mb-30">
                <h2 class="font-30 font-weight-bold text-secondary"><?php echo e(trans('update.featured_topics')); ?></h2>
                <p class="font-14 text-gray"><?php echo e(trans('update.featured_topics_hint')); ?></p>
            </div>

            <?php $__currentLoopData = $featuredTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredTopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="forums-featured-card d-flex align-items-center bg-white p-20 p-md-35 rounded-lg mt-15">
                    <div class="forums-featured-card-icon">
                        <img src="<?php echo e($featuredTopic->icon); ?>" alt="<?php echo e($featuredTopic->topic->title); ?>" class="img-cover">
                    </div>

                    <div class="ml-15">
                        <a href="<?php echo e($featuredTopic->topic->getPostsUrl()); ?>" class="">
                            <h4 class="font-16 font-weight-bold text-dark"><?php echo e($featuredTopic->topic->title); ?></h4>
                        </a>
                        <p class="font-14 text-gray"><?php echo truncate(strip_tags($featuredTopic->topic->description),100); ?></p>
                        <div class="mt-15 d-flex align-items-end">
                            <?php if($featuredTopic->topic->posts_count > 0 or (!empty($featuredTopic->usersAvatars) and count($featuredTopic->usersAvatars))): ?>
                                <div class="forums-featured-card-users-avatar d-flex align-items-center mr-10">
                                    <?php $__currentLoopData = $featuredTopic->usersAvatars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userAvatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="user-avatar-card rounded-circle">
                                            <img src="<?php echo e($userAvatar->getAvatar(32)); ?>" class="img-cover rounded-circle" alt="<?php echo e($userAvatar->full_name); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(($featuredTopic->topic->posts_count - count($featuredTopic->usersAvatars)) > 0): ?>
                                        <span class="topics-count d-flex align-items-center justify-content-center font-12 text-gray rounded-circle">+<?php echo e(($featuredTopic->topic->posts_count - count($featuredTopic->usersAvatars))); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex align-items-center">
                                <div class="text-gray font-12"><?php echo e(trans('public.created_by')); ?> <span class="font-weight-bold"><?php echo e($featuredTopic->topic->creator->full_name); ?></span></div>

                                <div class="text-gray font-12 ml-5 pl-5 border-left"><?php echo e(trans('update.n_posts',['count' => $featuredTopic->topic->posts_count])); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="forums-featured-bg-box"></div>
        </section>
    <?php endif; ?>

    <?php if(!empty($forums) and count($forums)): ?>
        <section class="container forums-categories-section mt-30">
            <div class="text-center">
                <h2 class="font-30 text-secondary font-weight-bold"><?php echo e(trans('update.forums')); ?></h2>
                <p class="font-14 text-gray mt-5"><?php echo e(trans('update.forums_categories_hints')); ?></p>
            </div>

            <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="forums-categories-card mt-30 rounded-lg border bg-white p-15">
                    <h3 class="forums-categories-card__title text-dark font-16 font-weight-bold mb-15"><?php echo e($forum->title); ?></h3>

                    <?php if(!empty($forum->subForums) and count($forum->subForums)): ?>
                        <?php $__currentLoopData = $forum->subForums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subForum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.forum.forum_card',['forum' => $subForum], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('web.default.forum.forum_card',['forum' => $forum], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    <?php endif; ?>

    <?php if(!empty($recommendedTopics) and count($recommendedTopics)): ?>
        <section class="container forum-recommended-topics-section position-relative">
            <div class="text-center">
                <h2 class="font-30 font-weight-bold text-secondary"><?php echo e(trans('update.recommended_topics')); ?></h2>
                <p class="font-14 text-gray"><?php echo e(trans('update.recommended_topics_hint')); ?></p>
            </div>

            <div class="row mt-20 position-relative">
                <?php $__currentLoopData = $recommendedTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendedTopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-3 mt-15">
                        <div class="forum-recommended-topics__card position-relative rounded-lg bg-white px-20 py-30">
                            <div class="forum-recommended-topics__icon">
                                <img src="<?php echo e($recommendedTopic->icon); ?>" alt="<?php echo e($recommendedTopic->title); ?>" class="img-cover">
                            </div>

                            <h4 class="font-16 font-weight-bold text-secondary mt-10"><?php echo e($recommendedTopic->title); ?></h4>

                            <div class="forum-recommended-topics__lists mt-5">
                                <?php $__currentLoopData = $recommendedTopic->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($topic->getPostsUrl()); ?>" class="d-flex align-items-center text-gray font-14 font-weight-500 mt-15">
                                        <i data-feather="chevron-right" class="mr-5 text-primary" width="16" height="16"></i>
                                        <span><?php echo e(truncate($topic->title,25)); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="forums-recommended-topics-bg-box"></div>
        </section>
    <?php endif; ?>

    <section class="container forum-question-section bg-info-light rounded-lg mt-25 mt-md-45">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="px-10 px-md-25 py-25 p-md-50">
                    <h1 class="font-36 font-weight-bold text-secondary">
                        <span class="d-block"><?php echo e(trans('update.have_a_question?')); ?></span>
                        <span class="d-block"><?php echo e(trans('update.ask_it_in_forum_and_get_answer')); ?></span>
                    </h1>

                    <p class="mt-15 text-gray font-14"><?php echo e(trans('update.have_a_question_hint')); ?></p>

                    <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center mt-15">
                        <a href="/forums/create-topic" class="btn btn-primary">
                            <i data-feather="file" class="mr-5 text-white" width="16" height="16"></i>
                            <?php echo e(trans('update.create_a_new_topic')); ?>

                        </a>

                        <a href="" class="btn btn-outline-primary ml-0 ml-md-20 mt-15 mt-md-0">
                            <?php echo e(trans('update.browse_forums')); ?>

                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 d-none d-md-block position-relative">
                <div class="forum-question-section__img">
                    <img src="/assets/default/img/forum/question-section.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/forum/index.blade.php ENDPATH**/ ?>