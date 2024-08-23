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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.post_or_webinar')); ?></th>
                                        <th><?php echo e(trans('site.message')); ?></th>
                                        <th><?php echo e(trans('public.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($report->user->id .' - '.$report->user->full_name); ?></td>
                                            <td class="text-left" width="20%">
                                                <a href="<?php echo e($report->$itemRelation->getUrl()); ?>" target="_blank">
                                                    <?php echo e($report->$itemRelation->title); ?>

                                                </a>
                                            </td>
                                            <td width="25%"><?php echo e(nl2br($report->message)); ?></td>
                                            <td><?php echo e(dateTimeFormat($report->created_at, 'Y M j | H:i')); ?></td>

                                            <td width="150px">


                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/comments/<?php echo e($page); ?>/<?php echo e($report->comment_id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.show')); ?>">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/comments/'. $page .'/reports/'.$report->id.'/delete','btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($reports->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\comments\reports.blade.php ENDPATH**/ ?>