<?php
    $cardUser = !empty($post) ? $post->user : $topic->creator;
    $cardUserBadges = $cardUser->getBadges();
?>
<div class="topics-post-card py-2 rounded-lg border bg-white mt-2">
    <div class="d-flex flex-wrap">
        <div class="col-12 col-md-3">
            <div class="position-relative bg-info-light d-flex flex-column align-items-center justify-content-start rounded-lg w-100 h-100 p-3">
                <div class="user-avatar rounded-circle <?php echo e(($cardUser->id == $topic->creator_id) ? 'green-ring' : ''); ?>">
                    <img src="<?php echo e($cardUser->getAvatar(72)); ?>" class="img-cover rounded-circle" alt="<?php echo e($cardUser->full_name); ?>">
                </div>
                <a href="<?php echo e($cardUser->getProfileUrl()); ?>">
                    <h4 class="js-post-user-name font-14 text-dark mt-2 font-weight-bold w-100 text-center"><?php echo e($cardUser->full_name); ?></h4>
                </a>

                <span class="px-2 py-1 mt-1 rounded-lg border bg-info-light text-center font-12 text-gray">
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
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <?php $__currentLoopData = $cardUserBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-10 mt-4" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($badge->badge_id) ? nl2br($badge->badge->description) : nl2br($badge->description)); ?>">
                                <img src="<?php echo e(!empty($badge->badge_id) ? $badge->badge->image : $badge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($badge->badge_id) ? $badge->badge->title : $badge->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <div class="mt-3 w-100">
                    <div class="d-flex align-items-center justify-content-between font-12 text-gray">
                        <span class=""><?php echo e(trans('site.posts')); ?>:</span>
                        <span class=""><?php echo e($cardUser->getTopicsPostsCount()); ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-2">
                        <span class=""><?php echo e(trans('update.likes')); ?>:</span>
                        <span class=""><?php echo e($cardUser->getTopicsPostsLikesCount()); ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-2">
                        <span class=""><?php echo e(trans('panel.followers')); ?>:</span>
                        <span class=""><?php echo e(count($cardUser->followers())); ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-2">
                        <span class=""><?php echo e(trans('update.member_since')); ?>:</span>
                        <span class=""><?php echo e(dateTimeFormat($cardUser->created_at,'j M Y')); ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between font-12 text-gray mt-2">
                        <span class=""><?php echo e(trans('update.location')); ?>:</span>
                        <span class=""><?php echo e($cardUser->getCountryAndState()); ?></span>
                    </div>
                </div>

                <?php if(!empty($post) and $post->pin): ?>
                    <span class="pinned-icon d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/learning/un_pin.svg" alt="pin icon" class="">
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12 col-md-9 mt-3 mt-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div class="d-flex flex-column h-100">
                    <?php if(!empty($post) and !empty($post->parent)): ?>
                        <div class="post-quotation p-2 rounded-sm border mb-2">
                            <div class="d-flex align-items-center">
                                <div class="post-quotation-icon rounded-circle">
                                    <img src="/assets/default/img/icons/quote-right.svg" class="img-cover" alt="quote-right">
                                </div>
                                <div class="ml-2">
                                    <span class="d-block"><?php echo e(trans('update.reply_to')); ?></span>
                                    <span class="font-12 font-weight-bold text-gray"><?php echo e($post->parent->user->full_name); ?></span>
                                </div>
                            </div>

                            <div class="topic-post-description mt-2"><?php echo truncate($post->parent->description, 200); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="topic-post-description"><?php echo !empty($post) ? $post->description : $topic->description; ?></div>

                    <?php if(!empty($post) and !empty($post->attach)): ?>
                        <div class="mt-auto d-inline-flex">
                            <a href="<?php echo e($post->getAttachmentUrl($forum->slug,$topic->slug)); ?>" target="_blank" class="d-flex align-items-center text-gray bg-info-light border px-2 py-1 rounded-pill">
                                <i class="fa fa-download"></i>
                                <span class="ml-1"><?php echo e(truncate($post->getAttachmentName(),24)); ?></span>
                            </a>
                        </div>
                    <?php elseif(empty($post) and !empty($topic->attachments) and count($topic->attachments)): ?>
                        <div class="mt-auto d-inline-flex align-items-center">
                            <?php $__currentLoopData = $topic->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($attachment->getDownloadUrl($forum->slug,$topic->slug)); ?>" target="_blank" class="d-flex align-items-center text-gray bg-info-light border px-2 py-1 rounded-pill mr-2">
                                    <i class="fa fa-download"></i>
                                    <span class="ml-1"><?php echo e(truncate($attachment->getName(),24)); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-3 pt-2 border-top">
                    <span class="font-14 font-weight-500 text-gray"><?php echo e(dateTimeFormat(!empty($post) ? $post->created_at : $topic->created_at,'j M Y | H:i')); ?></span>

                    <div class="d-flex align-items-center">
                        <?php if(!empty($post)): ?>
                            <?php echo $__env->make('admin.includes.delete_button', [
                                        'url' => getAdminPanelUrl().'/forums/'.$forum->id.'/topics/'.$topic->id.'/posts/'.$post->id.'/delete',
                                        'btnText' => trans('admin/main.delete'),
                                        'btnClass' => 'mr-3 font-14 font-weight-500 text-danger'
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('admin.includes.delete_button', [
                                        'url' => getAdminPanelUrl().'/forums/'.$forum->id.'/topics/'.$topic->id.'/delete',
                                        'btnText' => trans('admin/main.delete'),
                                        'btnClass' => 'mr-3 font-14 font-weight-500 text-danger'
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <?php if(!$topic->close): ?>
                            <?php if(!empty($post)): ?>
                                <button type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($forum->id); ?>/topics/<?php echo e($topic->id); ?>/posts/<?php echo e($post->id); ?>/edit" class="js-post-edit btn-transparent mr-3 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></button>
                            <?php else: ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($forum->id); ?>/topics/<?php echo e($topic->id); ?>/edit" target="_blank" class="mr-3 font-14 font-weight-500 text-gray"><?php echo e(trans('public.edit')); ?></a>
                            <?php endif; ?>

                            <?php if(!empty($post)): ?>
                                <?php if($post->pin): ?>
                                    <button type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($topic->forum_id); ?>/topics/<?php echo e($topic->id); ?>/posts/<?php echo e($post->id); ?>/un_pin" class="js-btn-post-un-pin btn-transparent font-14 font-weight-500 text-warning mr-3"><?php echo e(trans('update.un_pin')); ?></button>
                                <?php else: ?>
                                    <button type="button" data-action="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($topic->forum_id); ?>/topics/<?php echo e($topic->id); ?>/posts/<?php echo e($post->id); ?>/pin" class="js-btn-post-pin btn-transparent font-14 font-weight-500 text-gray mr-3"><?php echo e(trans('update.pin')); ?></button>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($post)): ?>
                                <button type="button" data-id="<?php echo e($post->id); ?>" class="js-reply-post-btn btn-transparent mr-3 font-14 font-weight-500 text-gray"><?php echo e(trans('panel.reply')); ?></button>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="topic-post-like-btn d-flex align-items-center">
                            <span type="button" class="badge-icon d-flex align-items-center justify-content-center">
                                <i class="fa fa-heart"></i>
                            </span>
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
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forums\topics\post_card.blade.php ENDPATH**/ ?>