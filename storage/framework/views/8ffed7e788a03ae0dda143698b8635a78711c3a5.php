<div class="product-show-seller-tab mt-20">

    <div class="product-show__profile-info-box profile-info-box d-flex align-items-start justify-content-between">
        <div class="user-details d-flex align-items-center">
            <div class="user-profile-avatar">
                <img src="<?php echo e($seller->getAvatar(190)); ?>" class="img-cover" alt="<?php echo e($seller->full_name); ?>"/>

                <?php if($seller->offline): ?>
                    <span class="user-circle-badge unavailable d-flex align-items-center justify-content-center">
                        <i data-feather="slash" width="20" height="20" class="text-white"></i>
                    </span>
                <?php elseif($seller->verified): ?>
                    <span class="user-circle-badge has-verified d-flex align-items-center justify-content-center">
                        <i data-feather="check" width="20" height="20" class="text-white"></i>
                    </span>
                <?php endif; ?>
            </div>
            <div class="ml-20 ml-lg-40">
                <h1 class="font-24 font-weight-bold text-dark-blue"><?php echo e($seller->full_name); ?></h1>
                <span class="text-gray"><?php echo e($seller->headline); ?></span>

                <div class="stars-card d-flex align-items-center mt-5">
                    <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $sellerRates], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="w-100 mt-10 d-flex align-items-center justify-content-center justify-content-lg-start">
                    <div class="d-flex flex-column followers-status">
                        <span class="font-20 font-weight-bold text-dark-blue"><?php echo e($sellerFollowers->count()); ?></span>
                        <span class="font-14 text-gray"><?php echo e(trans('panel.followers')); ?></span>
                    </div>

                    <div class="d-flex flex-column ml-25 pl-5 following-status">
                        <span class="font-20 font-weight-bold text-dark-blue"><?php echo e($sellerFollowing->count()); ?></span>
                        <span class="font-14 text-gray"><?php echo e(trans('panel.following')); ?></span>
                    </div>
                </div>

                <?php if(!empty($sellerBadges)): ?>
                    <div class="user-reward-badges d-flex flex-wrap align-items-center mt-15">
                        <?php $__currentLoopData = $sellerBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellerBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mr-15" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<?php echo (!empty($sellerBadge->badge_id) ? nl2br($sellerBadge->badge->description) : nl2br($sellerBadge->description)); ?>">
                                <img src="<?php echo e(!empty($sellerBadge->badge_id) ? $sellerBadge->badge->image : $sellerBadge->image); ?>" width="32" height="32" alt="<?php echo e(!empty($sellerBadge->badge_id) ? $sellerBadge->badge->title : $sellerBadge->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="user-actions d-flex flex-column">
            <button type="button" id="followToggle" data-user-id="<?php echo e($seller->id); ?>" class="btn btn-<?php echo e((!empty($authUserIsFollower) and $authUserIsFollower) ? 'danger' : 'primary'); ?> btn-sm">
                <?php if(!empty($authUserIsFollower) and $authUserIsFollower): ?>
                    <?php echo e(trans('panel.unfollow')); ?>

                <?php else: ?>
                    <?php echo e(trans('panel.follow')); ?>

                <?php endif; ?>
            </button>

            <?php if($seller->public_message): ?>
                <button type="button" class="js-send-message btn btn-border-white rounded btn-sm mt-15"><?php echo e(trans('site.send_message')); ?></button>
            <?php endif; ?>
        </div>
    </div>

    <?php if($seller->offline): ?>
        <div class="user-offline-alert d-flex mt-40">
            <div class="p-15">
                <h3 class="font-16 text-dark-blue"><?php echo e(trans('public.instructor_is_not_available')); ?></h3>
                <p class="font-14 font-weight-500 text-gray mt-15"><?php echo e($seller->offline_message); ?></p>
            </div>

            <div class="offline-icon offline-icon-right ml-auto d-flex align-items-stretch">
                <div class="d-flex align-items-center">
                    <img src="/assets/default/img/profile/time-icon.png" alt="offline">
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($seller->about)): ?>
        <div class="mt-40">
            <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e(trans('site.about')); ?></h3>

            <div class="mt-15 text-gray">
                <?php echo nl2br($seller->about); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\includes\tabs\seller.blade.php ENDPATH**/ ?>