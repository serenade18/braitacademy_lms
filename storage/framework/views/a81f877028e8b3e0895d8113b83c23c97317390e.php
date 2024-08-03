<div class="tab-pane mt-3 fade" id="topics" role="tabpanel" aria-labelledby="topics-tab">
    <div class="row">

        <div class="col-12">
            <h5 class="section-title after-line"><?php echo e(trans('update.forum_topics')); ?></h5>

            <div class="table-responsive mt-5">
                <table class="table table-striped table-md">
                    <tr>
                        <th><?php echo e(trans('public.topic')); ?></th>
                        <th><?php echo e(trans('admin/main.category')); ?></th>
                        <th><?php echo e(trans('site.posts')); ?></th>
                        <th><?php echo e(trans('admin/main.created_at')); ?></th>
                        <th><?php echo e(trans('admin/main.updated_at')); ?></th>
                        <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php if(!empty($topics)): ?>
                        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td width="25%">
                                    <a href="<?php echo e($topic->getPostsUrl()); ?>" target="_blank" class=""><?php echo e($topic->title); ?></a>
                                </td>

                                <td>
                                    <?php echo e($topic->forum->title); ?>

                                </td>
                                <td><?php echo e($topic->posts_count); ?></td>
                                <td class="text-center"><?php echo e(dateTimeFormat($topic->created_at,'j M Y | H:i')); ?></td>
                                <td class="text-center"><?php echo e((!empty($topic->posts) and count($topic->posts)) ? dateTimeFormat($topic->posts->first()->created_at,'j M Y | H:i') : '-'); ?></td>
                                <td class="text-right">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_topics_lists')): ?>
                                        <?php if(!$topic->close): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => "/admin/forums/{$topic->forum_id}/topics/{$topic->id}/close",
                                                'tooltip' => trans('public.close'),
                                                'btnClass' => 'mr-1',
                                                'btnIcon' => 'fa-lock'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => "/admin/forums/{$topic->forum_id}/topics/{$topic->id}/open",
                                                'tooltip' => trans('public.open'),
                                                'btnClass' => 'mr-1',
                                                'btnIcon' => 'fa-unlock'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_topics_posts')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($topic->forum_id); ?>/topics/<?php echo e($topic->id); ?>/posts"
                                           class="btn-transparent btn-sm text-primary mr-1"
                                           data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('site.posts')); ?>"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_block_access')): ?>
                                        <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => "/admin/forums/{$topic->forum_id}/topics/{$topic->id}/delete?no_redirect=true",
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/users/editTabs/topics.blade.php ENDPATH**/ ?>