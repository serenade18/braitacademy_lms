<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_forums')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalForums); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-comment-alt"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_topics')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalTopics); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-comment"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_posts')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($postsCount); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-comments"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.active_members')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($membersCount); ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.icon')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <?php if(empty(request()->get('subForums'))): ?>
                                            <th><?php echo e(trans('update.sub_forums')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(trans('update.topics')); ?></th>
                                        <th><?php echo e(trans('site.posts')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.closed')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <img src="<?php echo e($forum->icon); ?>" width="30" alt="">
                                            </td>
                                            <td class="text-left">
                                                <?php if(!empty($forum->subForums) and count($forum->subForums)): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forums?subForums=<?php echo e($forum->id); ?>"><?php echo e($forum->title); ?></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($forum->id); ?>/topics"><?php echo e($forum->title); ?></a>
                                                <?php endif; ?>
                                            </td>
                                            <?php if(empty(request()->get('subForums'))): ?>
                                                <td>
                                                    <?php if(!empty($forum->subForums)): ?>
                                                        <?php echo e(count($forum->subForums)); ?>

                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo e($forum->topics_count); ?></td>
                                            <td><?php echo e($forum->posts_count); ?></td>
                                            <td>
                                                <?php echo e(trans('admin/main.'.$forum->status)); ?>

                                            </td>
                                            <td>
                                                <?php if($forum->close): ?>
                                                    <?php echo e(trans('admin/main.yes')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.no')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($forum->subForums) and count($forum->subForums)): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forums?subForums=<?php echo e($forum->id); ?>"
                                                       class="btn-transparent btn-sm text-primary mr-1"
                                                       data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.forums')); ?>"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_topics_lists')): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($forum->id); ?>/topics"
                                                           class="btn-transparent btn-sm text-primary mr-1"
                                                           data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('update.topics')); ?>"
                                                        >
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/forums/<?php echo e($forum->id); ?>/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_forum_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/forums/'.$forum->id.'/delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($forums->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forums\lists.blade.php ENDPATH**/ ?>