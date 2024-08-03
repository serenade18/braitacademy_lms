<?php $__env->startSection('content'); ?>
    <section>
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="section-title"><?php echo e(trans('panel.notifications')); ?></h2>

            <a href="/panel/notifications/mark-all-as-read" class="delete-action d-flex align-items-center cursor-pointer text-hover-primary" data-title="<?php echo e(trans('update.convert_unread_messages_to_read')); ?>" data-confirm="<?php echo e(trans('update.yes_convert')); ?>">
                <i data-feather="check" width="20" height="20"></i>
                <span class="ml-5 font-16"><?php echo e(trans('update.mark_all_notifications_as_read')); ?></span>
            </a>
        </div>

        <?php if(!empty($notifications) and !$notifications->isEmpty()): ?>
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="notification-card rounded-sm panel-shadow bg-white py-15 py-lg-20 px-15 px-lg-40 mt-20">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-3 mt-10 mt-lg-0 d-flex align-items-start">
                            <?php if(empty($notification->notificationStatus)): ?>
                                <span class="notification-badge badge badge-circle-danger mr-5 mt-5 d-flex align-items-center justify-content-center"></span>
                            <?php endif; ?>

                            <div class="">
                                <h3 class="notification-title font-16 font-weight-bold text-dark-blue"><?php echo e($notification->title); ?></h3>
                                <span class="notification-time d-block font-12 text-gray mt-5"><?php echo e(dateTimeFormat($notification->created_at,'j M Y | H:i')); ?></span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5 mt-10 mt-lg-0">
                            <span class="font-weight-500 text-gray font-14"><?php echo truncate($notification->message, 150, true); ?></span>
                        </div>

                        <div class="col-12 col-lg-4 mt-10 mt-lg-0 text-right">
                            <button type="button" data-id="<?php echo e($notification->id); ?>" id="showNotificationMessage<?php echo e($notification->id); ?>" class="js-show-message btn btn-border-white <?php if(!empty($notification->notificationStatus)): ?> seen-at <?php endif; ?>"><?php echo e(trans('public.view')); ?></button>
                            <input type="hidden" class="notification-message" value="<?php echo $notification->message; ?>">
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="my-30">
                <?php echo e($notifications->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>
        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
               'file_name' => 'webinar.png',
               'title' => trans('panel.notification_no_result'),
               'hint' => nl2br(trans('panel.notification_no_result_hint')),
           ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="mt-5 d-none" id="messageModal">
        <div class="text-center">
            <h3 class="modal-title font-16 font-weight-bold text-dark-blue"></h3>
            <span class="modal-time d-block font-12 text-gray mt-5"></span>
            <span class="modal-message text-gray mt-20"></span>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        (function ($) {
            "use strict";

            <?php if(!empty(request()->get('notification'))): ?>
            setTimeout(() => {
                $('body #showNotificationMessage<?php echo e(request()->get('notification')); ?>').trigger('click');

                let url = window.location.href;
                url = url.split('?')[0];
                window.history.pushState("object or string", "Title", url);
            }, 400);
            <?php endif; ?>
        })(jQuery)
    </script>

    <script src="/assets/default/js/panel/notifications.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/notifications/index.blade.php ENDPATH**/ ?>