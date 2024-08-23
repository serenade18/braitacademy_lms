<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.bookmarks')); ?></h2>
        </div>

        <?php if($topics->count() > 0): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('public.topic')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.forum')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.replies')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.publish_date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left align-middle">
                                            <div class="user-inline-avatar d-flex align-items-center">
                                                <div class="avatar bg-gray200">
                                                    <img src="<?php echo e($topic->creator->getAvatar(48)); ?>" class="img-cover" alt="">
                                                </div>
                                                <a href="<?php echo e($topic->getPostsUrl()); ?>" target="_blank" class="">
                                                    <div class=" ml-5">
                                                        <span class="d-block font-16 font-weight-500 text-dark-blue"><?php echo e($topic->title); ?></span>
                                                        <span class="font-12 text-gray mt-5"><?php echo e(trans('public.by')); ?> <?php echo e($topic->creator->full_name); ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle"><?php echo e($topic->forum->title); ?></td>
                                        <td class="text-center align-middle"><?php echo e($topic->posts_count); ?></td>
                                        <td class="text-center align-middle"><?php echo e(dateTimeFormat($topic->created_at, 'j M Y H:i')); ?></td>
                                        <td class="text-center align-middle">
                                            <a
                                                href="/panel/forums/topics/<?php echo e($topic->id); ?>/removeBookmarks"
                                                data-title="<?php echo e(trans('update.this_topic_will_be_removed_from_your_bookmark')); ?>"
                                                data-confirm="<?php echo e(trans('update.confirm')); ?>"
                                                class="panel-remove-bookmark-btn delete-action d-flex align-items-center justify-content-center p-5 rounded-circle">
                                                <i data-feather="bookmark" width="18" height="18" class="text-danger"></i>
                                            </a>
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
                'title' => trans('update.panel_topics_bookmark_no_result'),
                'hint' => nl2br(trans('update.panel_topics_bookmark_no_result_hint')),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($topics->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\forum\bookmarks.blade.php ENDPATH**/ ?>