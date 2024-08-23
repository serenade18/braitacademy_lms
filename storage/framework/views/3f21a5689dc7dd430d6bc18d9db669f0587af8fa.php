<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.supports')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.supports')); ?></div>
            </div>
        </div>

        <div class="row">


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-envelope"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_conversations')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalConversations); ?>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-hourglass-start"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.pending_reply')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($pendingReplySupports); ?>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.open_conversations')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($openConversationsCount); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-envelope"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.closed_conversations')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($closeConversationsCount); ?>

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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="date" value="<?php echo e(request()->get('date')); ?>" placeholder="Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.department')); ?></label>
                                    <select name="department_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_departments')); ?></option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>" <?php if(request()->get('department_id') == $department->id): ?> selected <?php endif; ?>><?php echo e($department->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.role')); ?></label>
                                    <select name="role_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_user_roles')); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>" <?php if(request()->get('role_id') == $role->id): ?> selected <?php endif; ?>><?php echo e($role->caption); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="open" <?php if(request()->get('status') == 'open'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.open')); ?></option>
                                        <option value="replied" <?php if(request()->get('status') == 'replied'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending_reply')); ?></option>
                                        <option value="supporter_replied" <?php if(request()->get('status') == 'supporter_replied'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.replied')); ?></option>
                                        <option value="close" <?php if(request()->get('status') == 'close'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.closed')); ?></option>
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
                    <div class="table-responsive text-center">
                        <table class="table table-striped font-14">

                            <tr>
                                <th><?php echo e(trans('admin/main.title')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.created_date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.last_update')); ?></th>
                                <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.role')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.department')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.actions')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/<?php echo e($support->id); ?>/conversation">
                                            <?php echo e($support->title); ?>

                                        </a>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($support->created_at,'j M Y | H:i')); ?></td>

                                    <td class="text-center"><?php echo e((!empty($support->updated_at)) ? dateTimeFormat($support->updated_at,'j M Y | H:i') : '-'); ?></td>

                                    <td class="text-left">
                                        <a title="<?php echo e($support->user->full_name); ?>" href="<?php echo e($support->user->getProfileUrl()); ?>" target="_blank"><?php echo e($support->user->full_name); ?></a>
                                    </td>

                                    <td class="text-center">
                                        <?php if($support->user->isUser()): ?>
                                            Student
                                        <?php elseif($support->user->isTeacher()): ?>
                                            Teacher
                                        <?php elseif($support->user->isOrganization()): ?>
                                            Organization
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e($support->department->title); ?></td>

                                    <td class="text-center">
                                        <?php if($support->status == 'close'): ?>
                                            <span class="text-danger"><?php echo e(trans('admin/main.close')); ?></span>
                                        <?php elseif($support->status == 'replied' or $support->status == 'open'): ?>
                                            <span class="text-warning"><?php echo e(trans('admin/main.pending_reply')); ?></span>
                                        <?php else: ?>
                                            <span class="text-primary"><?php echo e(trans('admin/main.replied')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center" width="50">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_reply')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/supports/<?php echo e($support->id); ?>/conversation" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.reply')); ?>">
                                                <i class="fa fa-reply" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_delete')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/supports/'.$support->id.'/delete' , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($supports->appends(request()->input())->links()); ?>

                </div>
            </section>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/supports/lists.blade.php ENDPATH**/ ?>