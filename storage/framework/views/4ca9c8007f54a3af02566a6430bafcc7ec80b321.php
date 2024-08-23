<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section>
        <h2 class="section-title"><?php echo e(trans('panel.filter_comments')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="" method="get" class="row">
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" value="<?php echo e(request()->get('from')); ?>" class="form-control <?php echo e(!empty(request()->get('from')) ? 'datepicker' : 'datefilter'); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to" autocomplete="off" value="<?php echo e(request()->get('to')); ?>" class="form-control <?php echo e(!empty(request()->get('to')) ? 'datepicker' : 'datefilter'); ?>" aria-describedby="dateInputGroupPrepend"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('panel.webinar')); ?></label>
                        <input type="text" name="webinar" value="<?php echo e(request()->get('webinar')); ?>" class="form-control"/>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-35">
        <h2 class="section-title"><?php echo e(trans('panel.my_comments')); ?></h2>

        <?php if(!empty($comments) and !$comments->isEmpty()): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center ">
                                <thead>
                                <tr>
                                    <th class="text-left text-gray"><?php echo e(trans('panel.webinar')); ?></th>
                                    <th class="text-gray text-center"><?php echo e(trans('panel.comment')); ?></th>
                                    <th class="text-gray text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-gray text-center"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left align-middle" width="35%">
                                            <a class="text-dark-blue font-weight-500" href="<?php echo e($comment->webinar->getUrl()); ?>" target="_blank"><?php echo e($comment->webinar->title); ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" data-comment-id="<?php echo e($comment->id); ?>" class="js-view-comment btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                        </td>

                                        <td class="align-middle">
                                            <?php if($comment->status == 'active'): ?>
                                                <span class="text-primary text-dark-blue font-weight-500"><?php echo e(trans('public.published')); ?></span>
                                            <?php else: ?>
                                                <span class="text-warning text-dark-blue font-weight-500"><?php echo e(trans('public.pending')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-dark-blue font-weight-500 align-middle"><?php echo e(dateTimeFormat($comment->created_at,'j M Y | H:i')); ?></td>
                                        <td class="align-middle text-right">
                                            <input type="hidden" id="commentDescription<?php echo e($comment->id); ?>" value="<?php echo e(nl2br($comment->comment)); ?>">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button type="button" data-comment-id="<?php echo e($comment->id); ?>" class="js-edit-comment btn-transparent"><?php echo e(trans('public.edit')); ?></button>
                                                    <a href="/panel/webinars/comments/<?php echo e($comment->id); ?>/delete" class="delete-action btn-transparent d-block mt-10"><?php echo e(trans('public.delete')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'comment.png',
                'title' => trans('panel.my_comments_no_result'),
                'hint' =>  nl2br(trans('panel.my_comments_no_result_hint')) ,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($comments->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script>
        var commentLang = '<?php echo e(trans('panel.comment')); ?>';
        var replyToCommentLang = '<?php echo e(trans('panel.reply_to_the_comment')); ?>';
        var editCommentLang = '<?php echo e(trans('panel.edit_comment')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var failedLang = '<?php echo e(trans('quiz.failed')); ?>';
    </script>
    <script src="/assets/default/js/panel/comments.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\my_comments.blade.php ENDPATH**/ ?>