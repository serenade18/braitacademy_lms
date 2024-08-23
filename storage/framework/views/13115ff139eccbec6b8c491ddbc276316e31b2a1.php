<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-35 mt-md-50">
        <section class="d-flex align-items-center justify-content-between px-15 px-md-30 py-15 py-md-25 border rounded-lg">
            <div class="flex-grow-1">
                <h2 class="font-20 font-weight-bold text-secondary"><?php echo e($topic->title); ?></h2>

                <span class="d-block font-14 font-weight-500 text-gray mt-5"><?php echo e(trans('public.by')); ?> <span class="font-weight-bold"><?php echo e($topic->creator->full_name); ?></span> <?php echo e(trans('public.in')); ?> <?php echo e(dateTimeFormat($topic->created_at, 'j M Y | H:i')); ?></span>

                <div class="mt-15 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item font-12 text-gray"><a href="/"><?php echo e(getGeneralSettings('site_name')); ?></a></li>
                            <li class="breadcrumb-item font-12 text-gray"><a href="/forums"><?php echo e(trans('update.forum')); ?></a></li>
                            <li class="breadcrumb-item font-12 text-gray"><a href="<?php echo e($topic->forum->getUrl()); ?>"><?php echo e($topic->forum->title); ?></a></li>
                            <li class="breadcrumb-item font-12 text-gray font-weight-bold" aria-current="page"><?php echo e($topic->title); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <button type="button" data-action="<?php echo e($topic->getBookmarkUrl()); ?>" class="<?php echo e(!empty($authUser) ? 'js-topic-bookmark' : 'login-to-access'); ?> d-flex align-items-center flex-column btn-transparent <?php echo e($topic->bookmarked ? 'text-warning' : ''); ?>">
                <i data-feather="bookmark" class="text-gray" width="22" height="22"></i>
                <span class="font-12 mt-5 text-gray"><?php echo e(trans('update.bookmark')); ?></span>
            </button>
        </section>

        <?php echo $__env->make('web.default.forum.post_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php if(!empty($topic->posts) and count($topic->posts)): ?>
            <?php $__currentLoopData = $topic->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.forum.post_card',['post' => $postRow], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        
        <?php if(!auth()->check()): ?>
            <div class="reply-login-close-card d-flex flex-column align-items-center w-100 p-15 rounded-lg border bg-white mt-15 p-40">
                <div class="icon-card">
                    <img src="/assets/default/img/topics/login.svg" alt="login icon" class="img-cover">
                </div>

                <h4 class="font-20 font-weight-bold text-secondary"><?php echo e(trans('update.login_to_reply')); ?></h4>
                <p class="font-14 font-weight-500 text-gray mt-5"><?php echo e(trans('update.login_to_reply_hint')); ?></p>
            </div>
        <?php elseif($topic->close or $forum->close): ?>
            <div class="reply-login-close-card d-flex flex-column align-items-center w-100 p-15 rounded-lg border bg-white mt-15 p-40">
                <div class="icon-card">
                    <img src="/assets/default/img/topics/closed.svg" alt="closed icon" class="img-cover">
                </div>

                <h4 class="font-20 font-weight-bold text-secondary"><?php echo e(trans('update.topic_closed')); ?></h4>
                <p class="font-14 font-weight-500 text-gray mt-5"><?php echo e(trans('update.topic_closed_hint')); ?></p>
            </div>
        <?php else: ?>
            <div class="mt-30">
                <h3 class="font-16 font-weight-bold text-secondary"><?php echo e(trans('update.reply_to_the_topic')); ?></h3>

                <div class="p-15 rounded-lg border bg-white mt-15">
                    <form action="<?php echo e($topic->getPostsUrl()); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="topic-posts-reply-card d-none position-relative px-20 py-15 rounded-sm bg-info-light mb-15">
                            <input type="hidden" name="reply_post_id" class="js-reply-post-id">
                            <div class="js-reply-post-title font-14 font-weight-500 text-gray"><?php echo trans('update.you_are_replying_to_the_message'); ?></div>
                            <div class="js-reply-post-description mt-5 font-14 text-gray"></div>

                            <button type="button" class="js-close-reply-post btn-transparent">
                                <i data-feather="x" width="22" height="22"></i>
                            </button>
                        </div>


                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.description')); ?></label>
                            <textarea id="summernote" name="description" class="form-control"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.attach_a_file')); ?> (<?php echo e(trans('public.optional')); ?>)</label>

                                    <div class="d-flex align-items-center">
                                        <div class="input-group mr-10">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text panel-file-manager" data-input="postAttachmentInput" data-preview="holder">
                                                    <i data-feather="upload" width="18" height="18" class="text-white"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="attach" id="postAttachmentInput" value="" class="form-control" placeholder="<?php echo e(trans('update.assignment_attachments_placeholder')); ?>"/>
                                        </div>

                                        <button type="button" class="js-save-post btn btn-primary btn-sm"><?php echo e(trans('update.send')); ?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div id="topicReportModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue"><?php echo e(trans('panel.report')); ?></h3>

        <form action="<?php echo e($topic->getPostsUrl()); ?>/report" method="post" class="mt-25">
            <input type="hidden" name="item_id" class="js-item-id-input"/>
            <input type="hidden" name="item_type" class="js-item-type-input"/>

            <div class="form-group">
                <label class="text-dark-blue font-14" for="message_to_reviewer"><?php echo e(trans('public.message_to_reviewer')); ?></label>
                <textarea name="message" id="message_to_reviewer" class="form-control" rows="10"></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <p class="text-gray font-16"><?php echo e(trans('product.report_modal_hint')); ?></p>

            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-topic-report-submit btn btn-sm btn-primary"><?php echo e(trans('panel.report')); ?></button>
                <button type="button" class="btn btn-sm btn-danger ml-10 close-swl"><?php echo e(trans('public.close')); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var replyToTopicSuccessfullySubmittedLang = '<?php echo e(trans('update.reply_to_topic_successfully_submitted')); ?>'
        var reportSuccessfullySubmittedLang = '<?php echo e(trans('update.report_successfully_submitted')); ?>';
        var changesSavedSuccessfullyLang = '<?php echo e(trans('update.changes_saved_successfully')); ?>';
        var oopsLang = '<?php echo e(trans('update.oops')); ?>';
        var somethingWentWrongLang = '<?php echo e(trans('update.something_went_wrong')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var descriptionLang = '<?php echo e(trans('public.description')); ?>';
        var editAttachmentLabelLang = '<?php echo e(trans('update.attach_a_file')); ?> (<?php echo e(trans('public.optional')); ?>)';
        var sendLang = '<?php echo e(trans('update.send')); ?>';
        var notLoginToastTitleLang = '<?php echo e(trans('public.not_login_toast_lang')); ?>';
        var notLoginToastMsgLang = '<?php echo e(trans('public.not_login_toast_msg_lang')); ?>';
        var topicBookmarkedSuccessfullyLang = '<?php echo e(trans('update.topic_bookmarked_successfully')); ?>';
        var topicUnBookmarkedSuccessfullyLang = '<?php echo e(trans('update.topic_un_bookmarked_successfully')); ?>';
        var editPostLang = '<?php echo e(trans('update.edit_post')); ?>';
    </script>

    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/assets/default/js/parts/topic_posts.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\forum\posts.blade.php ENDPATH**/ ?>