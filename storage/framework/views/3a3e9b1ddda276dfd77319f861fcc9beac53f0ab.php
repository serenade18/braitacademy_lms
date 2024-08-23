<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.comments_reports')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.comments_reports')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">

                            <?php if(!empty($comment)): ?>
                                <div class="mt-1 w-100">
                                    <h4><?php echo e(trans('admin/main.reported_comment')); ?></h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped font-14">
                                            <tr>
                                                <th><?php echo e(trans('admin/main.user')); ?></th>
                                                <th><?php echo e(trans('admin/main.comment')); ?></th>
                                                <th><?php echo e(trans('public.date')); ?></th>
                                                <th><?php echo e(trans('admin/main.status')); ?></th>
                                                <th><?php echo e(trans('admin/main.type')); ?></th>
                                                <th><?php echo e(trans('admin/main.action')); ?></th>
                                            </tr>

                                            <tr>
                                                <td><?php echo e($comment->user->id .' - '.$comment->user->full_name); ?></td>
                                                <td width="30%"><?php echo e(nl2br($comment->comment)); ?></td>
                                                <td><?php echo e(dateTimeFormat($comment->created_at, 'j M Y | H:i')); ?></td>
                                                <td>
                                                    <span class="text-<?php echo e(($comment->status == 'pending') ? 'warning' : 'success'); ?>">
                                                        <?php echo e(($comment->status == 'pending') ? trans('admin/main.pending') : trans('admin/main.published')); ?>

                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="text-<?php echo e((empty($comment->reply_id)) ? 'info' : 'warning'); ?>">
                                                        <?php echo e((empty($comment->reply_id)) ? trans('admin/main.main_comment') : trans('admin/main.replied')); ?>

                                                    </span>
                                                </td>

                                                <td>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_status')): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/<?php echo e($page); ?>/comments/<?php echo e($comment->id); ?>/toggle" class="btn btn-<?php echo e((($comment->status == 'pending') ? 'success' : 'primary')); ?> btn-sm"><?php echo e(trans('admin/main.'.(($comment->status == 'pending') ? 'publish' : 'pending'))); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_edit')): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/<?php echo e($page); ?>/comments/<?php echo e($comment->id); ?>/edit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <br>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_reply')): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/<?php echo e($page); ?>/comments/<?php echo e(!empty($comment->reply_id) ? $comment->reply_id : $comment->id); ?>/reply" class="btn btn-warning btn-sm mt-2"><?php echo e(trans('admin/main.reply')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments_delete')): ?>
                                                        <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/'. $page .'/comments/'.$comment->id.'/delete?redirect_to='.getAdminPanelUrl().'/'. $page .'/comments/reports','btnClass' => 'btn-sm mt-2'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body ">
                            <h4><?php echo e(trans('admin/main.report_message')); ?></h4>
                            <p class="mt2"><?php echo e(nl2br($report->message)); ?></p>

                            <h4 class="mt-5"><?php echo e(trans('admin/main.report_detail')); ?></h4>
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th><?php echo e(trans('admin/main.post')); ?></th>
                                        <th><?php echo e(trans('site.message')); ?></th>
                                        <th><?php echo e(trans('public.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>

                                    <tr>
                                        <td><?php echo e($report->user->id .' - '.$report->user->full_name); ?></td>
                                        <td width="20%"><?php echo e($report->$itemRelation->title); ?></td>
                                        <td width="25%"><?php echo e(nl2br($report->message)); ?></td>
                                        <td><?php echo e(dateTimeFormat($report->created_at, 'j M Y | H:i')); ?></td>

                                        <td width="150px" class="text-right">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_'. $itemRelation .'_comments_reports')): ?>
                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/'. $page .'/comments/reports/'.$report->id.'/delete?redirect_to='.getAdminPanelUrl().'/'. $page .'/comments/reports','btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\comments\report_show.blade.php ENDPATH**/ ?>