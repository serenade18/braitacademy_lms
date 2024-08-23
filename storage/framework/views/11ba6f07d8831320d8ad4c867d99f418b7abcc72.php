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
            <section class="card">
                <div class="card-header">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_agora_history_export')): ?>
                        <div class="text-right">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/agora_history/excel" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center font-14">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.course')); ?></th>
                                <th class="text-left"><?php echo e(trans('admin/main.session')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.session_duration')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.start_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.end_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.meeting_duration')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $agoraHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agoraHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $meetingDuration = ($agoraHistory->end_at - $agoraHistory->start_at) / 60;
                                ?>

                                <tr>
                                    <td class="text-left"><?php echo e(!empty($agoraHistory->session) ? $agoraHistory->session->webinar->title : trans('update.deleted_session')); ?></td>
                                    <td class="text-left"><?php echo e(!empty($agoraHistory->session) ? $agoraHistory->session->title : trans('update.deleted_session')); ?></td>
                                    <td><?php echo e(!empty($agoraHistory->session) ? convertMinutesToHourAndMinute($agoraHistory->session->duration) : '-'); ?></td>
                                    <td><?php echo e(dateTimeFormat($agoraHistory->start_at, 'j M Y | H:i')); ?></td>
                                    <td><?php echo e(dateTimeFormat($agoraHistory->end_at, 'j M Y | H:i')); ?></td>
                                    <td class="<?php echo e(!empty($agoraHistory->session) ? (($meetingDuration > $agoraHistory->session->duration) ? 'text-danger' : 'text-success') : ''); ?>">
                                        <?php echo e(convertMinutesToHourAndMinute($meetingDuration)); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($agoraHistories->links()); ?>

                </div>
            </section>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\agora_history\index.blade.php ENDPATH**/ ?>