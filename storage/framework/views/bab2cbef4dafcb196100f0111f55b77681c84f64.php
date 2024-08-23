<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">

    <style>
        .select2-container {
            z-index: 1212 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($webinar->title); ?> - <?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a><?php echo e($pageTitle); ?></a></div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.total_students')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totalStudents); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-briefcase"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(trans('update.active_students')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totalActiveStudents); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-info-circle"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(trans('update.expire_students')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totalExpireStudents); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-ban"></i></div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(trans('update.average_learning')); ?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($averageLearning); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="card">
        <div class="card-body">
            <form method="get" class="mb-0">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                            <input name="full_name" type="text" class="form-control" value="<?php echo e(request()->get('full_name')); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                            <div class="input-group">
                                <input type="date" id="from" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                            <div class="input-group">
                                <input type="date" id="to" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                            <select name="sort" data-plugin-selectTwo class="form-control populate">
                                <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                <option value="rate_asc" <?php if(request()->get('sort') == 'rate_asc'): ?> selected <?php endif; ?>><?php echo e(trans('update.rate_ascending')); ?></option>
                                <option value="rate_desc" <?php if(request()->get('sort') == 'rate_desc'): ?> selected <?php endif; ?>><?php echo e(trans('update.rate_descending')); ?></option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.users_group')); ?></label>
                            <select name="group_id" data-plugin-selectTwo class="form-control populate">
                                <option value=""><?php echo e(trans('admin/main.select_users_group')); ?></option>
                                <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($userGroup->id); ?>" <?php if(request()->get('group_id') == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.role')); ?></label>
                            <select name="role_id" class="form-control">
                                <option value=""><?php echo e(trans('admin/main.all_roles')); ?></option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php if($role->id == request()->get('role_id')): ?> selected <?php endif; ?>><?php echo e($role->caption); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                            <select name="status" data-plugin-selectTwo class="form-control populate">
                                <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.active')); ?></option>
                                <option value="expire" <?php if(request()->get('status') == 'expire'): ?> selected <?php endif; ?>><?php echo e(trans('panel.expired')); ?></option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group mt-1">
                            <label class="input-label mb-4"> </label>
                            <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_notification_to_students')): ?>
                <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($webinar->id); ?>/sendNotification" class="btn btn-primary mr-2"><?php echo e(trans('notification.send_notification')); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_enrollment_add_student_to_items')): ?>
                <button type="button" id="addStudentToCourse" class="btn btn-primary mr-2"><?php echo e(trans('update.add_student_to_course')); ?></button>
            <?php endif; ?>
            <div class="h-10"></div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th class="text-left">ID</th>
                        <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                        <th><?php echo e(trans('admin/main.rate')); ?>(5)</th>
                        <th><?php echo e(trans('update.learning')); ?></th>
                        <th><?php echo e(trans('admin/main.user_group')); ?></th>
                        <th><?php echo e(trans('panel.purchase_date')); ?></th>
                        <th><?php echo e(trans('admin/main.status')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="text-left"><?php echo e($student->id ?? '-'); ?></td>
                            <td class="text-left">
                                <div class="d-flex align-items-center">
                                    <figure class="avatar mr-2">
                                        <img src="<?php echo e($student->getAvatar()); ?>" alt="<?php echo e($student->full_name); ?>">
                                    </figure>
                                    <div class="media-body ml-1">
                                        <div class="mt-0 mb-1 font-weight-bold"><?php echo e($student->full_name); ?></div>

                                        <?php if($student->mobile): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($student->mobile); ?></div>
                                        <?php endif; ?>

                                        <?php if($student->email): ?>
                                            <div class="text-primary text-small font-600-bold"><?php echo e($student->email); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span><?php echo e($student->rates ?? '-'); ?></span>
                            </td>

                            <td>
                                <span><?php echo e($student->learning); ?>%</span>
                            </td>

                            <td>
                                <?php if(!empty($student->getUserGroup())): ?>
                                    <span><?php echo e($student->getUserGroup()->name); ?></span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <td><?php echo e(dateTimeFormat($student->purchase_date, 'j M Y | H:i')); ?></td>

                            <td>
                                <?php if(empty($student->id)): ?>
                                    
                                    <div class="mt-0 mb-1 font-weight-bold text-warning"><?php echo e(trans('update.unregistered')); ?></div>
                                <?php elseif(!empty($webinar->access_days) and !$webinar->checkHasExpiredAccessDays($student->purchase_date, $student->gift_id)): ?>
                                    <div class="mt-0 mb-1 font-weight-bold text-warning"><?php echo e(trans('panel.expired')); ?></div>
                                <?php elseif(!$student->access_to_purchased_item): ?>
                                    <div class="mt-0 mb-1 font-weight-bold text-danger"><?php echo e(trans('update.access_blocked')); ?></div>
                                <?php else: ?>
                                    <div class="mt-0 mb-1 font-weight-bold text-success"><?php echo e(trans('admin/main.active')); ?></div>
                                <?php endif; ?>
                            </td>

                            <td class="text-center mb-2" width="120">
                                <?php if(!empty($student->id)): ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($student->id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                            <i class="fa fa-user-shield"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($student->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_students_delete')): ?>
                                        <?php if(!$student->access_to_purchased_item): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                'url' => getAdminPanelUrl().'/enrollments/'. $student->sale_id .'/enable-access',
                                                'tooltip' => trans('update.enable-student-access'),
                                                'btnIcon' => 'fa-check'
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                        'url' => getAdminPanelUrl().'/enrollments/'. $student->sale_id .'/block-access',
                                                        'tooltip' => trans('update.block_access'),
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($students->appends(request()->input())->links()); ?>

        </div>

    </div>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_2')); ?></div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.students_hint_title_3')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('admin/main.students_hint_description_3')); ?></div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <div id="addStudentToCourseModal" class="d-none">
        <h3 class="section-title after-line"><?php echo e(trans('update.add_student_to_course')); ?></h3>
        <div class="mt-25">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/enrollments/store" method="post">
                <input type="hidden" name="webinar_id" value="<?php echo e($webinar->id); ?>">

                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('admin/main.user')); ?></label>
                    <select name="user_id" class="form-control user-search" data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                    </select>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="d-flex align-items-center justify-content-end mt-3">
                    <button type="button" class="js-save-manual-add btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                    <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>


    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
    </script>

    <script src="/assets/default/js/admin/webinar_students.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\students.blade.php ENDPATH**/ ?>