<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.comments_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/39.svg" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5"><?php echo e($comments->count()); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.comments')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/41.svg" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5"><?php echo e($repliedCommentsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.replied')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/40.svg" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5"><?php echo e(($comments->count() - $repliedCommentsCount)); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.not_replied')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('panel.filter_comments')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/store/products/comments" method="get" class="row">
                <div class="col-12 col-lg-4">
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
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('panel.user')); ?></label>
                                <input type="text" name="user" value="<?php echo e(request()->get('user')); ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.product')); ?></label>
                                <input type="text" name="product" value="<?php echo e(request()->get('product')); ?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.product_comments_list')); ?></h2>
        </div>

        <?php if(!empty($comments) and !$comments->isEmpty()): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center ">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('panel.user')); ?></th>
                                    <th class="text-left"><?php echo e(trans('update.product')); ?></th>
                                    <th class="text-center"><?php echo e(trans('panel.comment')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th class="text-left">
                                            <div class="user-inline-avatar d-flex align-items-center">
                                                <div class="avatar bg-gray200">
                                                    <img src="<?php echo e($comment->user->getAvatar()); ?>" class="img-cover" alt="">
                                                </div>
                                                <span class="user-name ml-5 text-dark-blue font-weight-500"><?php echo e($comment->user->full_name); ?></span>
                                            </div>
                                        </th>
                                        <td class=" text-left align-middle" width="35%">
                                            <a href="<?php echo e($comment->product->getUrl()); ?>" target="_blank" class="text-dark-blue font-weight-500"><?php echo e($comment->product->title); ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" data-comment-id="<?php echo e($comment->id); ?>" class="js-view-comment btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                        </td>
                                        <td class="align-middle">
                                            <?php if(empty($comment->reply_id)): ?>
                                                <span class="text-primary font-weight-500"><?php echo e(trans('public.open')); ?></span>
                                            <?php else: ?>
                                                <span class="text-dark-blue font-weight-500"><?php echo e(trans('panel.replied')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle"><?php echo e(dateTimeFormat($comment->created_at,'j M Y | H:i')); ?></td>
                                        <td class="align-middle text-right">
                                            <input type="hidden" id="commentDescription<?php echo e($comment->id); ?>" value="<?php echo e(nl2br($comment->comment)); ?>">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button type="button" data-comment-id="<?php echo e($comment->id); ?>" class="js-reply-comment btn-transparent"><?php echo e(trans('panel.reply')); ?></button>
                                                    <button type="button" data-item-id="<?php echo e($comment->product_id); ?>" data-comment-id="<?php echo e($comment->id); ?>" class="btn-transparent webinar-actions d-block mt-10 text-hover-primary report-comment"><?php echo e(trans('panel.report')); ?></button>
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
                'title' => trans('panel.comments_no_result'),
                'hint' =>  nl2br(trans('panel.comments_no_result_hint')) ,
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
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var reportSuccessLang = '<?php echo e(trans('panel.report_success')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('public.message_to_reviewer')); ?>';
    </script>
    <script src="/assets/default/js/panel/comments.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\store\comments.blade.php ENDPATH**/ ?>