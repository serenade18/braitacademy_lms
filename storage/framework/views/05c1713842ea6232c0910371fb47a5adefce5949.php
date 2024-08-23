<div class="row align-items-center my-15">
    <div class="col-12 col-md-6">
        <div class="d-flex align-items-center">
            <div class="forums-categories-card__icon p-5">
                <img src="<?php echo e($forum->icon); ?>" alt="<?php echo e($forum->title); ?>" class="img-cover">
            </div>
            <div class="ml-10">
                <a href="<?php echo e($forum->getUrl()); ?>" class="d-block">
                    <div class="font-14 text-secondary font-weight-bold"><?php echo e($forum->title); ?></div>
                </a>
                <p class="font-12 text-gray mt-5"><?php echo e($forum->description); ?></p>
            </div>
        </div>
    </div>

    <div class="col-4 col-md-2 mt-10 mt-md-0 d-flex align-items-center justify-content-around">
        <div class="text-center">
            <span class="d-block font-14 text-gray font-weight-bold"><?php echo e($forum->topics_count); ?></span>
            <div class="d-block font-12 text-gray"><?php echo e(trans('update.topics')); ?></div>
        </div>

        <div class="text-center">
            <span class="d-block font-14 text-gray font-weight-bold"><?php echo e($forum->posts_count); ?></span>
            <div class="d-block font-12 text-gray"><?php echo e(trans('site.posts')); ?></div>
        </div>
    </div>

    <div class="col-8 col-md-4 mt-10 mt-md-0 forums-categories-card__last-post d-flex align-items-center">
        <?php if(!empty($forum->lastTopic)): ?>
            <div class="user-avatar rounded-circle">
                <img src="<?php echo e($forum->lastTopic->creator->getAvatar(39)); ?>" class="img-cover rounded-circle" alt="<?php echo e($forum->lastTopic->creator->full_name); ?>">
            </div>

            <div class="ml-5">
                <a href="<?php echo e($forum->lastTopic->getPostsUrl()); ?>" class="d-block">
                    <span class="font-12 font-weight-500 text-gray text-ellipsis"><?php echo e(truncate($forum->lastTopic->title,30)); ?></span>
                </a>
                <div class="text-gray font-12"><span class="font-weight-bold"><?php echo e($forum->lastTopic->creator->full_name); ?></span> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($forum->lastTopic->created_at,'j M Y | H:i')); ?></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forum\forum_card.blade.php ENDPATH**/ ?>