<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.classes')); ?></div>

                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="row">


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-question"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.question_count')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalQuestions); ?>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.resolved')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($resolvedCount); ?>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-hourglass"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.not_resolved')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($notResolvedCount); ?>

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
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" name="title" value="<?php echo e(request()->get('title')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="date" value="<?php echo e(request()->get('date')); ?>" placeholder="Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.user')); ?></label>

                                    <select name="user_id" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                                        <?php if(!empty($user)): ?>
                                            <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->full_name); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="resolved" <?php if(request()->get('status') == 'resolved'): ?> selected <?php endif; ?>><?php echo e(trans('update.resolved')); ?></option>
                                        <option value="not_resolved" <?php if(request()->get('status') == 'not_resolved'): ?> selected <?php endif; ?>><?php echo e(trans('update.not_resolved')); ?></option>
                                        <option value="pined" <?php if(request()->get('status') == 'pined'): ?> selected <?php endif; ?>><?php echo e(trans('update.pined')); ?></option>
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

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('update.question_title')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.updated_at')); ?></th>
                                        <th class=""><?php echo e(trans('admin/main.creator')); ?></th>
                                        <th><?php echo e(trans('public.answers')); ?></th>
                                        <th><?php echo e(trans('update.pined')); ?></th>
                                        <th><?php echo e(trans('update.resolved')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td width="18%" class="text-left">
                                                <span class="font-weight-bold"><?php echo e($forum->title); ?></span>
                                            </td>

                                            <td class=""><?php echo e(dateTimeFormat($forum->created_at, 'j M Y | H:i')); ?></td>

                                            <td class="">
                                                <?php if(!empty($forum->last_answer)): ?>
                                                    <?php echo e(dateTimeFormat($forum->last_answer->created_at, 'j M Y | H:i')); ?>

                                                <?php else: ?>
                                                    --
                                                <?php endif; ?>
                                            </td>

                                            <td class=""><?php echo e($forum->user->full_name); ?></td>

                                            <td class=""><?php echo e($forum->answers_count); ?></td>

                                            <td class="">
                                                <?php if($forum->pin): ?>
                                                    <?php echo e(trans('admin/main.yes')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.no')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="">
                                                <?php if(!empty($forum->resolved)): ?>
                                                    <?php echo e(trans('admin/main.yes')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('admin/main.no')); ?>

                                                <?php endif; ?>
                                            </td>


                                            <td width="200" class="btn-sm">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_question_forum_answers')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($forum->webinar_id); ?>/forums/<?php echo e($forum->id); ?>/answers" target="_blank" class="btn-transparent btn-sm text-primary mt-1 mr-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('public.answers')); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\forum\question_lists.blade.php ENDPATH**/ ?>