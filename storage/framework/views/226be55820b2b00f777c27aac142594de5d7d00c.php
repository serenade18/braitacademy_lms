<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/agora/agora.css"/>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="agora-page">
        <div class="agora-navbar d-flex align-items-center justify-content-between shoa px-35 py-10">
            <div class="d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center justify-content-center mr-0" href="/">
                    <?php if(!empty($generalSettings['logo'])): ?>
                        <img src="<?php echo e($generalSettings['logo']); ?>" class="img-cover" alt="site logo">
                    <?php endif; ?>
                </a>

                <span class="font-weight-bold border-left border-gray200 ml-10 pl-10"><?php echo e(!empty($session->webinar) ? $session->webinar->title : $session->title); ?></span>
            </div>

            <button id="collapseBtn" type="button" class="btn-transparent d-none d-lg-flex">
                <i data-feather="menu" width="20" height="20" class=""></i>
            </button>
        </div>

        <div class="d-flex flex-column flex-lg-row">
            <div class="agora-stream flex-grow-1 bg-info-light p-15">
                <?php echo $__env->make('web.default.course.agora.stream', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="agora-tabs show">
                <ul class="nav nav-tabs pb-15 d-flex align-items-center justify-content-start px-15" id="tabs-tab" role="tablist">
                    <li class="nav-item">
                        <a class="position-relative font-14 d-flex align-items-center active" id="chat-tab"
                           data-toggle="tab" href="#chat" role="tab" aria-controls="chat"
                           aria-selected="true">
                            <i data-feather="message-circle" width="16" height="16" class="agora-tabs-icons mr-1"></i>
                            <span class="agora-tabs-link-text"><?php echo e(trans('update.chat')); ?></span>
                        </a>
                    </li>

                    
                </ul>

                <div class="tab-content h-100" id="nav-tabContent">
                    <div class="pb-20 tab-pane fade show active h-100" id="chat" role="tabpanel"
                         aria-labelledby="chat-tab">
                        <?php echo $__env->make('web.default.course.agora.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_top'); ?>
    <script>
        var userDefaultAvatar = '<?php echo e(getPageBackgroundSettings('user_avatar')); ?>';
        var joinedToChannel = '<?php echo e(trans('update.joined_the_live')); ?>';
        var appId = '<?php echo e($appId); ?>';
        var accountName = '<?php echo e($accountName); ?>';
        var userName = '<?php echo e($userName); ?>';
        var channelName = '<?php echo e($channelName); ?>';
        var streamRole = '<?php echo e($streamRole); ?>';
        var redirectAfterLeave = '<?php echo e(url('/panel')); ?>';
        var liveEndedLang = '<?php echo e(trans('update.this_live_has_been_ended')); ?>';
        var redirectToPanelInAFewMomentLang = '<?php echo e(trans('update.a_few_moments_redirect_to_panel')); ?>';
        var streamStartAt = Number(<?php echo e($streamStartAt); ?>);
        var sessionId = Number(<?php echo e($session->id); ?>);
        var sessionStreamType = '<?php echo e($sessionStreamType); ?>';
        var authUserId = Number(<?php echo e($authUserId); ?>);
        var hostUserId = Number(<?php echo e($hostUserId); ?>);
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app',['appFooter' => false, 'appHeader' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\agora\index.blade.php ENDPATH**/ ?>