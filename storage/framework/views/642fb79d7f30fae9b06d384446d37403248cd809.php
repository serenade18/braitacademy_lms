<?php
    $cardUser = !empty($post) ? $post->user : $topic->creator;
    $cardUserBadges = $cardUser->getBadges();
?>
<div class="topics-post-card py-15 rounded-lg border bg-white mt-15">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-3">
            <div class="position-relative bg-info-light d-flex flex-column align-items-center justify-content-start rounded-lg w-100 h-100 p-20">
                <div class="user-avatar rounded-circle <?php echo e(($cardUser->id == $topic->creator_id) ? 'green-ring' : ''); ?>">
                    <img src="<?php echo e($cardUser->getAvatar(72)); ?>" class="img-cover rounded-circle" alt="<?php echo e($cardUser->full_name); ?>">
                </div>
                <a href="<?php echo e($cardUser->getProfileUrl()); ?>" target="_blank">
                    <h4 class="js-post-user-name font-14 text-secondary mt-15 font-weight-bold w-100 text-center"><?php echo e($cardUser->full_name); ?></h4>
                </a>

                <span class="px-10 py-5 mt-5 rounded-lg border bg-info-light text-center font-12 text-gray">
                            <?php if($cardUser->isUser()): ?>
                        <?php echo e(trans('quiz.student')); ?>

                    <?php elseif($cardUser->isTeacher()): ?>
                        <?php echo e(trans('public.instructor')); ?>

                    <?php elseif($cardUser->isOrganization()): ?>
                        <?php echo e(trans('home.organization')); ?>

                    <?php elseif($cardUser->isAdmin()): ?>
                        <?php echo e(trans('panel.staff')); ?>

                    <?php endif; ?>
                        </span>

                <?php if(!empty($cardUserBadges) and count($cardUserBadges)): ?>
                    <div class="d-flex flex-wrap align-items-center justify-content-center mt-20 w-100">
                        <?php $__currentLoopData = $cardUserBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-10 mt-10" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo e((!empty($badge->badge_id) ? $badge->badge->description : $badge->description)); ?>">
                                <img src="<?php echo e(!empty($badge->badge_id) ? $badge->badge->image : $badge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($badge->badge_id) ? $badge->badge->title : $badge->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <div class="mt-20 w-100">
                    <?php if($cardUser->getTopicsPostsCount() > 0): ?>
                        <div class="d-flex align-items-center justify-content-between font-12 text-gray">
                            <span class=""><?php echo e(trans('site.posts')); ?>:</span>
                            <span class=""><?php echo e($cardUser->getTopicsPostsCount()); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if($cardUser->getTopicsPostsLikesCount() > 0): ?>
                        <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-10">
                            <span class=""><?php echo e(trans('update.likes')); ?>:</span>
                            <span class=""><?php echo e($cardUser->getTopicsPostsLikesCount()); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if(count($cardUser->followers())): ?>
                        <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-10">
                            <span class=""><?php echo e(trans('panel.followers')); ?>:</span>
                            <span class=""><?php echo e(count($cardUser->followers())); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-10">
                        <span class=""><?php echo e(trans('update.member_since')); ?>:</span>
                        <span class=""><?php echo e(dateTimeFormat($cardUser->created_at,'j M Y')); ?></span>
                    </div>

                    <?php if(!empty($cardUser->getCountryAndState())): ?>
                        <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-10">
                            <span class=""><?php echo e(trans('update.location')); ?>:</span>
                            <span class=""><?php echo e($cardUser->getCountryAndState()); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if(!empty($post) and $post->pin): ?>
                    <span class="pinned-icon d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/learning/un_pin.svg" alt="pin icon" class="">
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 col-md-9 mt-15 mt-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div class="d-flex flex-column h-100">
                    <?php if(!empty($post) and !empty($post->parent)): ?>
                        <div class="post-quotation p-15 rounded-sm border mb-15">
                            <div class="d-flex align-items-center">
                                <div class="post-quotation-icon rounded-circle">
                                    <img src="/assets/default/img/icons/quote-right.svg" class="img-cover" alt="quote-right">
                                </div>
                                <div class="ml-10">
                                    <span class="d-block font-12 text-gray"><?php echo e(trans('update.reply_to')); ?></span>
                                    <span class="font-12 font-weight-bold text-gray"><?php echo e($post->parent->user->full_name); ?></span>
                                </div>
                            </div>

                            <div class="topic-post-description mt-15"><?php echo truncate($post->parent->description, 200); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="topic-post-description"><?php echo !empty($post) ? $post->description : $topic->description; ?></div>

                    <?php if(!empty($post) and !empty($post->attach)): ?>
                        <div class="mt-auto d-inline-flex">
                            <a href="<?php echo e($post->getAttachmentUrl($forum->slug,$topic->slug)); ?>" target="_blank" class="d-flex align-items-center text-gray bg-info-light border px-10 py-5 rounded-pill">
                                <i data-feather="paperclip" class="text-gray" width="16" height="16"></i>
                                <span class="ml-5"><?php echo e(truncate($post->getAttachmentName(),24)); ?></span>
                            </a>
                        </div>
                    <?php elseif(empty($post) and !empty($topic->attachments) and count($topic->attachments)): ?>
                        <div class="mt-auto d-inline-flex align-items-center">
                            <?php $__currentLoopData = $topic->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($attachment->getDownloadUrl($forum->slug,$topic->slug)); ?>" target="_blank" class="d-flex align-items-center text-gray bg-info-light border px-10 py-5 rounded-pill mr-15">
                                    <i data-feather="paperclip" class="text-gray" width="16" height="16"></i>
                                    <span class="ml-5 text-gray font-12"><?php echo e(truncate($attachment->getName(),24)); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-15 pt-15 border-top">
                    <span class="font-14 font-weight-500 text-gray"><?php echo e(dateTimeFormat(!empty($post) ? $post->created_at : $topic->created_at,'j M Y | H:i')); ?></span>

                    <div class="d-flex align-items-center">
                        <?php if(!empty($authUser) and !$topic->close): ?>
                            <?php if($authUser->id == $cardUser->id): ?>
                                <?php if(!empty($post)): ?>
                                    <button type="button" data-action="<?php echo e($post->getEditUrl($forum->slug,$topic->slug)); ?>" class="js-post-edit btn-transparent mr-25 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></button>
                                <?php else: ?>
                                    <a href="<?php echo e($topic->getEditUrl($forum->slug)); ?>" class="mr-25 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($post) and $authUser->id == $topic->creator_id): ?>
                                <?php if($post->pin): ?>
                                    <button type="button" data-action="<?php echo e($topic->getPostsUrl()); ?>/<?php echo e($post->id); ?>/un_pin" class="js-btn-post-un-pin btn-transparent font-14 font-weight-500 text-warning mr-25"><?php echo e(trans('update.un_pin')); ?></button>
                                <?php else: ?>
                                    <button type="button" data-action="<?php echo e($topic->getPostsUrl()); ?>/<?php echo e($post->id); ?>/pin" class="js-btn-post-pin btn-transparent font-14 font-weight-500 text-gray mr-25"><?php echo e(trans('update.pin')); ?></button>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($post)): ?>
                                <button type="button" data-id="<?php echo e($post->id); ?>" class="js-reply-post-btn btn-transparent mr-25 font-14 font-weight-500 text-gray"><?php echo e(trans('panel.reply')); ?></button>
                            <?php endif; ?>

                            <button type="button" data-id="<?php echo e(!empty($post) ? $post->id : $topic->id); ?>" data-type="<?php echo e(!empty($post) ? 'topic_post' : 'topic'); ?>" class="js-topic-post-report btn-transparent mr-25 font-14 font-weight-500 text-gray"><?php echo e(trans('panel.report')); ?></button>
                        <?php endif; ?>

                        <div class="topic-post-like-btn d-flex align-items-center">
                            <button type="button" class="<?php echo e(!empty($authUser) ? 'js-topic-post-like' : 'login-to-access'); ?> badge-icon d-flex align-items-center justify-content-center <?php echo e(((!empty($post) and in_array($post->id,$likedPostsIds)) or (empty($post) and $topic->liked)) ? 'liked' : ''); ?>" data-action="<?php echo e(!empty($post) ? $post->getLikeUrl($forum->slug,$topic->slug) : $topic->getLikeUrl($forum->slug)); ?>">
                                <i data-feather="heart" width="20" height="20"></i>
                            </button>
                            <div class="font-12 font-weight-normal">
                                <span class="js-like-count"><?php echo e(!empty($post) ? $post->likes->count() : $topic->likes->count()); ?></span>
                                <?php echo e(trans('update.likes')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forum\post_card.blade.php ENDPATH**/ ?>