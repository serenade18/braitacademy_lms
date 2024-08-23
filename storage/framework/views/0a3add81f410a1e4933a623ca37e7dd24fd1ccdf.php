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
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.type')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.message')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if(!empty($report->user)): ?>
                                                <td><?php echo e($report->user->id .' - '.$report->user->full_name); ?></td>
                                            <?php else: ?>
                                                <td class="text-danger">Deleted User</td>
                                            <?php endif; ?>

                                            <td class="text-left" width="30%">
                                                <?php if(!empty($report->topic_id)): ?>
                                                    <?php echo e(trans('public.topic')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.post')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                                <input type="hidden" class="report-description" value="<?php echo e(nl2br($report->message)); ?>">
                                            </td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($report->created_at, 'j M Y | H:i')); ?></td>

                                            <td width="150px" class="text-center">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_reports_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/reports/forum-topics/'.$report->id.'/delete','btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
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

    <!-- Modal -->
    <div class="modal fade" id="reportMessage" tabindex="-1" aria-labelledby="reportMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportMessageLabel"><?php echo e(trans('panel.report')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="mt-2 js-description">
                            <h5 class="font-weight-bold js-reason"><?php echo e(trans('site.message')); ?> :</h5>
                            <p class="mt-2">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/webinar_reports.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forums\topics\reports.blade.php ENDPATH**/ ?>