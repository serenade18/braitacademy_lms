<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.reply_comment')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.reply_comment')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">
                            <h4><?php echo e(trans('admin/main.main_comment')); ?></h4>
                            <p class="mt-2"><?php echo e(nl2br($review->description)); ?></p>

                            <hr class="divider my-2 w-100 border border-gray">

                            <?php if(!empty($review->comments) and $review->comments->count() > 0): ?>
                                <div class="mt-1 w-100">
                                    <h4><?php echo e(trans('admin/main.reply_list')); ?></h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped font-14">
                                            <tr>
                                                <th><?php echo e(trans('admin/main.user')); ?></th>
                                                <th><?php echo e(trans('admin/main.comment')); ?></th>
                                                <th><?php echo e(trans('public.date')); ?></th>
                                                <th><?php echo e(trans('admin/main.status')); ?></th>
                                                <th><?php echo e(trans('admin/main.action')); ?></th>
                                            </tr>
                                            <?php $__currentLoopData = $review->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($reply->user->id .' - '.$reply->user->full_name); ?></td>

                                                    <td>
                                                        <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                                        <input type="hidden" value="<?php echo e(nl2br($reply->comment)); ?>">
                                                    </td>

                                                    <td><?php echo e(dateTimeFormat($reply->created_at, 'Y M j | H:i')); ?></td>

                                                    <td>
                                                        <span class="text-<?php echo e(($reply->status == 'pending') ? 'warning' : 'success'); ?>">
                                                            <?php echo e(($reply->status == 'pending') ? trans('admin/main.pending') : trans('admin/main.published')); ?>

                                                        </span>
                                                    </td>

                                                    <td>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin_comments_status")): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl("/comments/reviews/{$reply->id}/toggle")); ?>" class="btn-transparent text-primary">
                                                                <?php if($reply->status == 'pending'): ?>
                                                                    <i class="fa fa-arrow-up"></i>
                                                                <?php else: ?>
                                                                    <i class="fa fa-arrow-down"></i>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin_comments_edit")): ?>
                                                            <a href="<?php echo e(getAdminPanelUrl("/comments/reviews/{$reply->id}/edit")); ?>" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin_comments_delete")): ?>
                                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/comments/reviews/{$reply->id}/delete"), 'btnClass' => 'btn-sm mt-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_reply')): ?>
                            <div class="card-body ">
                                <form action="<?php echo e(getAdminPanelUrl("/comments/reviews/{$review->id}/reply")); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group mt-15">
                                        <label class="input-label"><?php echo e(trans('admin/main.reply_comment')); ?></label>
                                        <textarea id="summernote" name="comment" class="summernote form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo old('comment'); ?></textarea>

                                        <?php $__errorArgs = ['comment'];
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

                                    <button type="submit" class="mt-3 btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="contactMessage" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.comment')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/js/admin/comments.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\reviews\comment_reply.blade.php ENDPATH**/ ?>