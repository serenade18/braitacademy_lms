<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <div class="tickets-list">
                <a class="ticket-item">
                    <div class="ticket-title">
                        <h4 class="text-primary"><?php echo e($support->title); ?></h4>
                    </div>
                    <div class="ticket-info">
                        <div class="font-weight-bold"><?php echo e($support->user->full_name); ?></div>
                        <div class="bullet"></div>
                        <div class="font-weight-bold">
                            <?php if($support->status == 'open'): ?>
                                <span class="text-success"><?php echo e(trans('admin/main.open')); ?></span>
                            <?php elseif($support->status == 'close'): ?>
                                <span class="text-danger"><?php echo e(trans('admin/main.close')); ?></span>
                            <?php elseif($support->status == 'replied'): ?>
                                <span class="text-warning"><?php echo e(trans('admin/main.pending_reply')); ?></span>
                            <?php else: ?>
                                <span class="text-primary"><?php echo e(trans('admin/main.replied')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.conversation')); ?></div>
            </div>
        </div>


        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card chat-box" id="mychatbox2">

                        <div class="card-body chat-content">

                            <?php $__currentLoopData = $support->conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="chat-item chat-<?php echo e(!empty($conversations->sender_id) ? 'right' : 'left'); ?>">
                                    <img src="<?php echo e(!empty($conversations->sender_id) ? $conversations->sender->getAvatar() : $conversations->supporter->getAvatar()); ?>">

                                    <div class="chat-details">

                                        <div class="chat-time"><?php echo e(!empty($conversations->sender_id) ? $conversations->sender->full_name : $conversations->supporter->full_name); ?></div>

                                        <div class="chat-text white-space-pre-wrap"><?php echo e($conversations->message); ?></div>
                                        <div class="chat-time">
                                            <span class="mr-2"><?php echo e(dateTimeFormat($conversations->created_at,'Y M j | H:i')); ?></span>

                                            <?php if(!empty($conversations->attach)): ?>
                                                <a href="<?php echo e(url($conversations->attach)); ?>" target="_blank" class="text-success"><i class="fa fa-paperclip"></i> <?php echo e(trans('admin/main.open_attach')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="card">

                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/supports/<?php echo e($support->id); ?>/conversation" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group mt-15">
                                    <label class="input-label"><?php echo e(trans('site.message')); ?></label>
                                    <textarea name="message" rows="6" class=" form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo old('message'); ?></textarea>
                                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.attach')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text admin-file-manager" data-input="attach" data-preview="holder">
                                                        Browse
                                                    </button>
                                                </div>
                                                <input type="text" name="attach" id="attach" value="<?php echo e(old('image_cover')); ?>" class="form-control"/>
                                                <div class="input-group-append">
                                                    <button type="button" class="input-group-text admin-file-view" data-input="attach">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 text-right mt-4">
                                        <button type="submit" class="btn btn-primary"><?php echo e(trans('site.send_message')); ?></button>

                                        <?php if($support->status != 'close'): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/<?php echo e($support->id); ?>/close" class="btn btn-danger ml-1"><?php echo e(trans('admin/main.close_conversation')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\supports\conversation.blade.php ENDPATH**/ ?>