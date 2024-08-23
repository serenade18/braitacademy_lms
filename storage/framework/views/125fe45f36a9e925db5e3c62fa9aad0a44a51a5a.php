<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.consultants_list_title')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.consultants')); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_consultants')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalConsultants); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.available_consultants')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($availableConsultants); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-times"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.unavailable_consultants')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($unavailableConsultants); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users-slash"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.consultants_without_appointment')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($consultantsWithoutAppointment); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="search" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                        <option value="appointments_asc" <?php if(request()->get('sort') == 'appointments_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_appointments_ascending')); ?></option>
                                        <option value="appointments_desc" <?php if(request()->get('sort') == 'appointments_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.sales_appointments_descending')); ?></option>
                                        <option value="appointments_income_asc" <?php if(request()->get('sort') == 'appointments_income_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.appointments_income_ascending')); ?></option>
                                        <option value="appointments_income_desc" <?php if(request()->get('sort') == 'appointments_income_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.appointments_income_descending')); ?></option>
                                        <option value="pending_appointments_asc" <?php if(request()->get('sort') == 'pending_appointments_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending_appointments_ascending')); ?></option>
                                        <option value="pending_appointments_desc" <?php if(request()->get('sort') == 'pending_appointments_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.pending_appointments_descending')); ?></option>
                                        <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.register_date_ascending')); ?></option>
                                        <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.register_date_descending')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.organization')); ?></label>
                                    <select name="organization_id" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.select_organization')); ?></option>
                                        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>" <?php if(request()->get('organization_id') == $organization->id): ?> selected <?php endif; ?>><?php echo e($organization->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.users_group')); ?></label>
                                    <select name="group_id" class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.select_users_group')); ?></option>
                                        <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($userGroup->id); ?>" <?php if(request()->get('group_id') == $userGroup->id): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="disabled" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="0" <?php if(request()->get('disabled') == '0'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.available')); ?></option>
                                        <option value="1" <?php if(request()->get('disabled') == '1'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.unavailable')); ?></option>
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_consultants_export_excel')): ?>
                        <a href="<?php echo e(getAdminPanelUrl()); ?>/consultants/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                    <?php endif; ?>

                    <div class="h-10"></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-striped font-14">
                            <tr>
                                <th><?php echo e(trans('admin/main.id')); ?></th>
                                <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                <th><?php echo e(trans('admin/main.appointments_sales')); ?></th>
                                <th><?php echo e(trans('admin/main.pending_appointments')); ?></th>
                                <th><?php echo e(trans('admin/main.wallet_charge')); ?></th>
                                <th><?php echo e(trans('admin/main.user_group')); ?></th>
                                <th><?php echo e(trans('admin/main.register_date')); ?></th>
                                <th><?php echo e(trans('admin/main.status')); ?></th>
                                <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>

                            </tr>

                            <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($consultant->id); ?></td>

                                    <td class="text-left">
                                        <div class="d-flex align-items-center">
                                            <figure class="avatar mr-2">
                                                <img src="<?php echo e($consultant->getAvatar()); ?>" alt="...">
                                            </figure>
                                            <div class="media-body ml-1">
                                                <div class="mt-0 mb-1 font-weight-bold"><?php echo e($consultant->full_name); ?></div>
                                                <div class="text-primary text-small font-600-bold"><?php echo e($consultant->mobile); ?></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="media-body">
                                            <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e($consultant->meetingsSalesCount); ?></div>

                                            <?php if($consultant->meetingsSalesSum > 0): ?>
                                                <div class="text-small font-600-bold"><?php echo e(handlePrice($consultant->meetingsSalesSum)); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <?php echo e($consultant->pendingAppointments); ?>

                                    </td>

                                    <td>
                                        <?php echo e(handlePrice($consultant->getAccountingBalance())); ?>

                                    </td>

                                    <td><?php echo e(!empty($consultant->userGroup) ? $consultant->userGroup->group->name : '-'); ?></td>

                                    <td><?php echo e(dateTimeFormat($consultant->created_at, 'j M Y | H:i')); ?></td>

                                    <td>
                                        <?php if($consultant->disabled): ?>
                                            <div class="text-danger mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.unavailable')); ?></div>
                                        <?php else: ?>
                                            <div class="text-success mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.available')); ?></div>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center mb-2" width="120">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_impersonate')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($consultant->id); ?>/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.login')); ?>">
                                                <i class="fa fa-user-shield"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_edit')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($consultant->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_delete')): ?>
                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/users/'.$consultant->id.'/delete' , 'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($consultants->appends(request()->input())->links()); ?>

                </div>
            </div>

            <section class="card">
                <div class="card-body">
                    <div class="section-title ml-0 mt-0 mb-3"><h4><?php echo e(trans('admin/main.hints')); ?></h4></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="media-body">
                                <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.consultants_hint_title_1')); ?></div>
                                <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.consultants_hint_description_1')); ?></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="media-body">
                                <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.consultants_hint_title_2')); ?></div>
                                <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.consultants_hint_description_2')); ?></div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="media-body">
                                <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.consultants_hint_title_3')); ?></div>
                                <div class="text-small font-600-bold"><?php echo e(trans('admin/main.consultants_hint_description_3')); ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\consultants\lists.blade.php ENDPATH**/ ?>