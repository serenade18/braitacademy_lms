<?php $__env->startPush('libraries_top'); ?>

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


        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form class="mb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="search" value="<?php echo e(request()->get('search')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.sender')); ?></label>

                                        <select name="sender_id" data-search-option="just_organization_and_teacher_role" class="form-control search-user-select2"
                                                data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                                            <?php if(!empty($sender)): ?>
                                                <option value="<?php echo e($sender->id); ?>" selected><?php echo e($sender->full_name); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('update.color')); ?></label>
                                        <select name="color" data-plugin-selectTwo class="form-control populate">
                                            <option value=""><?php echo e(trans('admin/main.all')); ?></option>

                                            <?php $__currentLoopData = \App\Models\CourseNoticeboard::$colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($color); ?>" <?php if(request()->get('color') == $color): ?> selected <?php endif; ?>><?php echo e(trans('update.course_noticeboard_color_'.$color)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.sender')); ?></label>
                                        <select name="sender" data-plugin-selectTwo class="form-control populate">
                                            <option value="">Select Sender</option>
                                            <option value="admin" <?php if(request()->get('sender') == 'admin'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.admin_role')); ?></option>
                                            <option value="organizations" <?php if(request()->get('sender') == 'organizations'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.organizations')); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('admin/main.types')); ?></label>
                                        <select name="type" data-plugin-selectTwo class="form-control populate">
                                            <option value=""><?php echo e(trans('admin/main.all_types')); ?></option>

                                            <?php $__currentLoopData = \App\Models\Noticeboard::$adminTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>" <?php if(request()->get('type') == $type): ?> selected <?php endif; ?>><?php echo e(trans('public.'.$type)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="col-md-4">
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_send')): ?>
                        <div class="text-right">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/<?php echo e((!empty($isCourseNotice) and $isCourseNotice) ? 'course-noticeboards' : 'noticeboards'); ?>/send" class="btn btn-primary"><?php echo e(trans('admin/main.send_noticeboard')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped font-14" id="datatable-basic">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>

                                <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                    <th class="text-left"><?php echo e(trans('admin/main.course')); ?></th>
                                <?php endif; ?>

                                <th class="text-center"><?php echo e(trans('notification.sender')); ?></th>

                                <th class="text-center"><?php echo e(trans('site.message')); ?></th>

                                <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                    <th class="text-center"><?php echo e(trans('update.color')); ?></th>
                                <?php else: ?>
                                    <th class="text-center"><?php echo e(trans('admin/main.type')); ?></th>
                                <?php endif; ?>

                                <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                <th><?php echo e(trans('admin/main.actions')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $noticeboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticeboard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left">
                                        <?php echo e($noticeboard->title); ?>

                                    </td>

                                    <?php if(!empty($isCourseNotice) and !empty($noticeboard->webinar)): ?>
                                        <td class="text-left">
                                            <?php if(!empty($noticeboard->webinar)): ?>
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars/<?php echo e($noticeboard->webinar->id); ?>/edit" target="_blank" class="font-14 d-block"><?php echo e($noticeboard->webinar->id); ?>-<?php echo e(truncate($noticeboard->webinar->title,32)); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>

                                    <td class="text-center">
                                        <?php if(!empty($isCourseNotice)): ?>
                                            <?php echo e($noticeboard->creator ? $noticeboard->creator->full_name : '-'); ?>

                                        <?php else: ?>
                                            <?php echo e($noticeboard->sender); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" data-item-id="<?php echo e($noticeboard->id); ?>" class="js-show-description btn btn-outline-primary"><?php echo e(trans('admin/main.show')); ?></button>
                                        <input type="hidden" value="<?php echo e(nl2br($noticeboard->message)); ?>">
                                    </td>
                                    <td class="text-center">
                                        <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                            <?php echo e(trans('update.course_noticeboard_color_'.$noticeboard->color)); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('admin/main.notification_'.$noticeboard->type)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center"><?php echo e(dateTimeFormat($noticeboard->created_at,'j M Y | H:i')); ?></td>

                                    <td width="100">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_edit')): ?>
                                            <a href="<?php echo e(getAdminPanelUrl()); ?>/<?php echo e((!empty($isCourseNotice) and $isCourseNotice) ? 'course-noticeboards' : 'noticeboards'); ?>/<?php echo e($noticeboard->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_delete')): ?>
                                            <?php if(!empty($isCourseNotice)): ?>
                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/course-noticeboards/{$noticeboard->id}/delete"),'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl("/noticeboards/{$noticeboard->id}/delete"),'btnClass' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($noticeboards->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="notificationMessageModal" tabindex="-1" aria-labelledby="notificationMessageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationMessageLabel"><?php echo e(trans('admin/main.message')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('admin/main.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/noticeboards.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\noticeboards\lists.blade.php ENDPATH**/ ?>