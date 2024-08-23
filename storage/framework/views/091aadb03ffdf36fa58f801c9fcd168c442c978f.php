<?php $__env->startPush('styles_top'); ?>

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

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-eye"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.pending_review')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($pendingReviewCount); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-calculator"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('quiz.passed')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($passedCount); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-comment-slash"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('quiz.failed')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($failedCount); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.student')); ?></label>
                                    <select name="student_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search students">

                                        <?php if(!empty($students) and $students->count() > 0): ?>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($student->id); ?>" selected><?php echo e($student->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" class="form-control populate">
                                        <option value=""><?php echo e(trans('public.all')); ?></option>
                                        <?php $__currentLoopData = \App\Models\WebinarAssignmentHistory::$assignmentHistoryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status); ?>" <?php echo e((request()->get('status') == $status) ? 'selected' : ''); ?>><?php echo e(trans('update.assignment_history_status_'.$status)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </section>

            <section class="card">
                <div class="card-body">
                    <table class="table table-striped font-14" id="datatable-details">

                        <tr>
                            <th><?php echo e(trans('quiz.student')); ?></th>
                            <th class="text-center"><?php echo e(trans('panel.purchase_date')); ?></th>
                            <th class="text-center"><?php echo e(trans('update.first_submission')); ?></th>
                            <th class="text-center"><?php echo e(trans('update.last_submission')); ?></th>
                            <th class="text-center"><?php echo e(trans('update.attempts')); ?></th>
                            <th class="text-center"><?php echo e(trans('quiz.grade')); ?></th>
                            <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                            <th class="text-right"><?php echo e(trans('admin/main.action')); ?></th>
                        </tr>

                        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left">
                                    <div class="user-inline-avatar d-flex align-items-center">
                                        <div class="avatar bg-gray200">
                                            <img src="<?php echo e($history->student->getAvatar()); ?>" class="img-cover" alt="">
                                        </div>
                                        <div class="ml-1">
                                            <span class="d-block font-weight-500"><?php echo e($history->student->full_name); ?></span>
                                            <span class="mt-1 font-12 text-gray d-block"><?php echo e($history->student->email); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <span class="font-weight-500"><?php echo e(!empty($history->purchase_date) ? dateTimeFormat($history->purchase_date, 'j M Y') : '-'); ?></span>
                                </td>

                                <td class="align-middle">
                                    <span class="font-weight-500"><?php echo e(!empty($history->first_submission) ? dateTimeFormat($history->first_submission, 'j M Y | H:i') : '-'); ?></span>
                                </td>

                                <td class="align-middle">
                                    <span class="font-weight-500"><?php echo e(!empty($history->last_submission) ? dateTimeFormat($history->last_submission, 'j M Y | H:i') : '-'); ?></span>
                                </td>

                                <td class="align-middle">
                                    <span class="font-weight-500"><?php echo e(!empty($assignment->attempts) ? "{$history->usedAttemptsCount}/{$assignment->attempts}" : '-'); ?></span>
                                </td>

                                <td class="align-middle">
                                    <span><?php echo e((!empty($history->grade)) ? $history->grade : '-'); ?></span>
                                </td>

                                <td class="align-middle">
                                    <?php if(empty($history) or ($history->status == \App\Models\WebinarAssignmentHistory::$notSubmitted)): ?>
                                        <span class="text-danger font-weight-500"><?php echo e(trans('update.assignment_history_status_not_submitted')); ?></span>
                                    <?php else: ?>
                                        <?php switch($history->status):
                                            case (\App\Models\WebinarAssignmentHistory::$passed): ?>
                                            <span class="text-primary font-weight-500"><?php echo e(trans('quiz.passed')); ?></span>
                                            <?php break; ?>
                                            <?php case (\App\Models\WebinarAssignmentHistory::$pending): ?>
                                            <span class="text-warning font-weight-500"><?php echo e(trans('public.pending')); ?></span>
                                            <?php break; ?>
                                            <?php case (\App\Models\WebinarAssignmentHistory::$notPassed): ?>
                                            <span class="font-weight-500 text-danger"><?php echo e(trans('quiz.failed')); ?></span>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    <?php endif; ?>
                                </td>

                                <td class="align-middle text-right">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_assignments_conversations')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/assignments/<?php echo e($assignment->id); ?>/history/<?php echo e($history->id); ?>/conversations" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.conversations')); ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                </div>
            </section>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\assignments\students.blade.php ENDPATH**/ ?>