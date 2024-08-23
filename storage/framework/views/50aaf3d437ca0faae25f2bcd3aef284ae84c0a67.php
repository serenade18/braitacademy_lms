<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(getAdminPanelUrl()); ?>/assignments"><?php echo e(trans('update.assignments')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(getAdminPanelUrl()); ?>/assignments/<?php echo e($assignment->id); ?>/students"><?php echo e(trans('public.students')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.conversation')); ?></div>
            </div>
        </div>


        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card chat-box" id="mychatbox2">

                        <div class="card-body chat-content">

                            <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="chat-item chat-<?php echo e(!empty($conversation->sender_id == $assignment->creator_id) ? 'right' : 'left'); ?>">
                                    <img src="<?php echo e($conversation->sender->getAvatar(50)); ?>">

                                    <div class="chat-details">

                                        <div class="chat-time"><?php echo e($conversation->sender->full_name); ?></div>

                                        <div class="chat-text"><?php echo $conversation->message; ?></div>
                                        <div class="chat-time">
                                            <span class="mr-2"><?php echo e(dateTimeFormat($conversation->created_at,'Y M j | H:i')); ?></span>

                                            <?php if(!empty($conversation->file_path)): ?>
                                                <a href="<?php echo e($conversation->getDownloadUrl($assignment->id)); ?>" target="_blank" class="text-success">
                                                    <i class="fa fa-paperclip"></i>
                                                    <?php echo e(trans('admin/main.open_attach')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\assignments\conversation.blade.php ENDPATH**/ ?>