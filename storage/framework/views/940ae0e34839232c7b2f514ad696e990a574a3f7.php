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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-address-book"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_appointments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalAppointments); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-clock"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.open_appointments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($openAppointments); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.finished_appointments')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($finishedAppointments); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-users"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_reservatores')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalConsultants); ?>

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
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <option value="<?php echo e(\App\Models\ReserveMeeting::$open); ?>" <?php if(request()->get('status') == \App\Models\ReserveMeeting::$open): ?> selected <?php endif; ?>>Open</option>
                                        <option value="<?php echo e(\App\Models\ReserveMeeting::$finished); ?>" <?php if(request()->get('status') == \App\Models\ReserveMeeting::$finished): ?> selected <?php endif; ?>>Finished</option>
                                        <option value="<?php echo e(\App\Models\ReserveMeeting::$canceled); ?>" <?php if(request()->get('status') == \App\Models\ReserveMeeting::$canceled): ?> selected <?php endif; ?>>Canceled</option>
                                        <option value="<?php echo e(\App\Models\ReserveMeeting::$pending); ?>" <?php if(request()->get('status') == \App\Models\ReserveMeeting::$pending): ?> selected <?php endif; ?>>Pending</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.filters')); ?></label>
                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.filter_type')); ?></option>
                                        <option value="has_discount" <?php if(request()->get('sort') == 'has_discount'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.discounted_appointments')); ?></option>
                                        <option value="free" <?php if(request()->get('sort') == 'free'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.free_appointments')); ?></option>
                                        <option value="amount_asc" <?php if(request()->get('sort') == 'amount_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.cost_ascending')); ?></option>
                                        <option value="amount_desc" <?php if(request()->get('sort') == 'amount_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.cost_descending')); ?></option>
                                        <option value="date_asc" <?php if(request()->get('sort') == 'date_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.date_ascending')); ?></option>
                                        <option value="date_desc" <?php if(request()->get('sort') == 'date_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.date_descending')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.consultant')); ?></label>

                                    <select name="consultant_ids[]" multiple="multiple" data-search-option="consultants" class="form-control search-user-select2"
                                            data-placeholder="Search Consultants">

                                        <?php if(!empty($consultants) and $consultants->count() > 0): ?>
                                            <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>" selected><?php echo e($teacher->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.reservatore')); ?></label>

                                    <select name="user_ids[]" multiple="multiple" class="form-control search-user-select2"
                                            data-placeholder="Search Reservatores">

                                        <?php if(!empty($users) and $users->count() > 0): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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

            <section class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center font-14">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.consultant')); ?></th>
                                <th class="text-left"><?php echo e(trans('admin/main.reservatore')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.meeting_type')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.cost')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.date')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.time')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.students_count')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                <th class="text-center"><?php echo e(trans('admin/main.actions')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left">
                                        <a href="<?php echo e($appointment->meeting->creator->getProfileUrl()); ?>" target="_blank"><?php echo e($appointment->meeting->creator->full_name); ?></a>
                                    </td>

                                    <td class="text-left">
                                        <a href="<?php echo e($appointment->user->getProfileUrl()); ?>" target="_blank"><?php echo e($appointment->user->full_name); ?></a>
                                    </td>

                                    <td class="text-center">
                                        <span class=""><?php echo e(trans('update.'.$appointment->meeting_type)); ?></span>
                                    </td>

                                    <td>
                                        <div class="media-body">
                                            <div class=" mt-0 mb-1 font-weight-bold"><?php echo e(handlePrice($appointment->paid_amount)); ?></div>
                                        </div>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($appointment->start_at, 'j M Y')); ?></td>

                                    <td class="text-center">
                                        <div class="d-inline-flex align-items-center">
                                            <span class=""><?php echo e(dateTimeFormat($appointment->start_at, 'H:i')); ?></span>
                                            <span class="mx-1">-</span>
                                            <span class=""><?php echo e(dateTimeFormat($appointment->end_at, 'H:i')); ?></span>
                                        </div>
                                    </td>

                                    <td class="align-middle font-weight-500">
                                        <?php echo e($appointment->student_count ?? 1); ?>

                                    </td>

                                    <td class="text-center">
                                        <?php switch($appointment->status):
                                            case (\App\Models\ReserveMeeting::$pending): ?>
                                                <span class="text-primary"><?php echo e(trans('public.pending')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\ReserveMeeting::$open): ?>
                                                <span class="text-warning"><?php echo e(trans('public.open')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\ReserveMeeting::$finished): ?>
                                                <span class="text-success"><?php echo e(trans('public.finished')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\ReserveMeeting::$canceled): ?>
                                                <span class="text-danger"><?php echo e(trans('public.canceled')); ?></span>
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    </td>

                                    <td class="text-center" width="50">
                                        <input type="hidden" class="js-meeting-password" value="<?php echo e($appointment->password); ?>">
                                        <input type="hidden" class="js-meeting-link" value="<?php echo e($appointment->link); ?>">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_appointments_join')): ?>
                                            <?php if(!empty($appointment->link) and $appointment->status == \App\Models\ReserveMeeting::$open): ?>
                                                <button type="button" data-reserve-id="<?php echo e($appointment->id); ?>" class="js-show-join-modal btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.join_link')); ?>"><i class="fa fa-link" aria-hidden="true"></i></button>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_appointments_send_reminder')): ?>
                                            <button type="button" data-reserve-id="<?php echo e($appointment->id); ?>" class="js-send-reminder btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.send_appointment_reminder')); ?>"><i class="fa fa-bell" aria-hidden="true"></i></button>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_appointments_cancel')): ?>
                                            <?php if($appointment->status != \App\Models\ReserveMeeting::$canceled): ?>
                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                        'url' => getAdminPanelUrl("/appointments/{$appointment->id}/cancel"),
                                                        'tooltip' => trans("admin/main.cancel")
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($appointments->appends(request()->input())->links()); ?>

                </div>
            </section>
        </div>
    </section>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.appointments_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.appointments_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.appointments_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.appointments_hint_description_2')); ?></div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.appointments_hint_title_3')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('admin/main.appointments_hint_description_3')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.join_appointment')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.url')); ?></label>
                                <input type="text" name="link" class="form-control" disabled/>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.password')); ?></label>
                                <input type="text" name="password" class="form-control" disabled/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="" target="_blank" class="js-join-btn btn btn-primary"><?php echo e(trans('admin/main.join')); ?></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendReminderModal" tabindex="-1" aria-labelledby="contactMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactMessageLabel"><?php echo e(trans('admin/main.send_reminder')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <strong><?php echo e(trans('admin/main.consultant')); ?>:</strong>
                        <span class="js-consultant"></span>
                    </div>

                    <div class="mt-2">
                        <strong><?php echo e(trans('admin/main.reservatore')); ?>:</strong>
                        <span class="js-reservatore"></span>
                    </div>

                    <div class="mt-2">
                        <strong><?php echo e(trans('admin/main.remind_title')); ?>:</strong>
                        <span class="js-title"></span>
                    </div>

                    <div class="mt-2">
                        <strong><?php echo e(trans('admin/main.remind_message')); ?>:</strong>
                        <span class="js-message"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="" class="js-send-reminder-btn btn btn-primary"><?php echo e(trans('admin/main.send')); ?></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/appointments.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\appointments\lists.blade.php ENDPATH**/ ?>