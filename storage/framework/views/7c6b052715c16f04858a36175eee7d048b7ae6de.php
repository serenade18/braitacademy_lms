<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('update.blog_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/46.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($postsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.articles')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/47.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($commentsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.comments')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($pendingPublishCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.pending_publish')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.articles')); ?></h2>
        </div>

        <?php if($posts->count() > 0): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('public.title')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.category')); ?></th>
                                    <th class="text-center"><?php echo e(trans('panel.comments')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.visit_count')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date_created')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <a href="<?php echo e($post->getUrl()); ?>" target="_blank"><?php echo e($post->title); ?></a>
                                        </td>
                                        <td class="text-center align-middle"><?php echo e($post->category->title); ?></td>
                                        <td class="text-center align-middle"><?php echo e($post->comments_count); ?></td>
                                        <td class="text-center align-middle"><?php echo e($post->visit_count); ?></td>

                                        <td class="text-center align-middle">
                                            <?php if($post->status == 'publish'): ?>
                                                <span class="text-primary"><?php echo e(trans('public.published')); ?></span>
                                            <?php else: ?>
                                                <span class="text-warning"><?php echo e(trans('public.pending')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center align-middle"><?php echo e(dateTimeFormat($post->created_at, 'j M Y H:i')); ?></td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu font-weight-normal">
                                                    <a href="/panel/blog/posts/<?php echo e($post->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_blog_delete_article')): ?>
                                                        <?php echo $__env->make('web.default.panel.includes.content_delete_btn', [
                                                            'deleteContentUrl' => "/panel/blog/posts/{$post->id}/delete",
                                                            'deleteContentClassName' => 'webinar-actions d-block mt-10',
                                                            'deleteContentItem' => $post,
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>

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
                'file_name' => 'quiz.png',
                'title' => trans('update.blog_post_no_result'),
                'hint' => nl2br(trans('update.blog_post_no_result_hint')),
                'btn' => ['url' => '/panel/blog/posts/new','text' => trans('update.create_a_post')]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($posts->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\blog\posts\lists.blade.php ENDPATH**/ ?>