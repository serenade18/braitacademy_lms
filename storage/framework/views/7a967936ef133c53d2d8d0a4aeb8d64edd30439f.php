<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(empty($isCourseNotice)): ?>
        <section>
            <h2 class="section-title"><?php echo e(trans('update.noticeboard_statistics')); ?></h2>

            <div class="activities-container mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/homework.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold mt-5"><?php echo e($totalNoticeboards); ?></strong>
                            <span class="font-16 text-dark-blue text-gray font-weight-500"><?php echo e(trans('update.total_noticeboards')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/58.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold mt-5"><?php echo e($totalCourseNotices); ?></strong>
                            <span class="font-16 text-dark-blue text-gray font-weight-500"><?php echo e(trans('update.course_notices')); ?></span>
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/45.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($totalGeneralNotices); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.general_notices')); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('update.filter_noticeboards')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="<?php echo e(request()->url()); ?>" method="get" class="row">
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>"
                                           aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('from','')); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>"
                                           aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('to','')); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('product.course')); ?></label>
                                <select name="webinar_id" class="form-control select2">
                                    <option value=""><?php echo e(trans('webinars.all_courses')); ?></option>

                                    <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($webinar->id); ?>" <?php if(request()->get('webinar_id') == $webinar->id): ?> selected <?php endif; ?>><?php echo e($webinar->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 <?php echo e(!empty($isCourseNotice) ? 'col-lg-5' : 'col-lg-8'); ?>">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                <input type="text" name="title" class="form-control" value="<?php echo e(request()->get('title')); ?>" placeholder="<?php echo e(trans('public.search')); ?>">
                            </div>
                        </div>

                        <?php if(!empty($isCourseNotice)): ?>
                            <div class="col-12 col-lg-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.color')); ?></label>
                                    <select name="color" class="form-control select2">
                                        <option value=""><?php echo e(trans('update.all_colors')); ?></option>

                                        <?php $__currentLoopData = \App\Models\CourseNoticeboard::$colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticeColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($noticeColor); ?>" <?php if(request()->get('color') == $noticeColor): ?> selected <?php endif; ?>><?php echo e(trans('update.course_noticeboard_color_'.$noticeColor)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-20">
        <h2 class="section-title"><?php echo e(trans('panel.noticeboards')); ?></h2>

        <?php if(!empty($noticeboards) and !$noticeboards->isEmpty()): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table text-center ">
                                <thead>
                                <tr>
                                    <th class="text-left text-gray"><?php echo e(trans('webinars.title')); ?></th>
                                    <th class="text-center text-gray"><?php echo e(trans('site.message')); ?></th>

                                    <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                        <th class="text-center text-gray"><?php echo e(trans('update.color')); ?></th>
                                    <?php else: ?>
                                        <th class="text-center text-gray"><?php echo e(trans('public.type')); ?></th>
                                    <?php endif; ?>

                                    <th class="text-center text-gray"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $noticeboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticeboard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="noticeboard-item">
                                        <td class="text-left align-middle" width="25%">
                                            <span class="js-noticeboard-title d-block text-dark-blue font-weight-500"><?php echo e($noticeboard->title); ?></span>
                                            <?php if(!empty($noticeboard->webinar)): ?>
                                                <span class="d-block text-gray font-12"><?php echo e($noticeboard->webinar->title); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="js-view-message btn btn-sm btn-gray200"><?php echo e(trans('public.view')); ?></button>
                                            <input type="hidden" class="js-noticeboard-message" value="<?php echo e(nl2br($noticeboard->message)); ?>">
                                        </td>
                                        <td class="text-dark-blue font-weight-500 align-middle">
                                            <?php if(!empty($isCourseNotice) and $isCourseNotice): ?>
                                                <?php echo e(trans('update.course_noticeboard_color_'.$noticeboard->color)); ?>

                                            <?php else: ?>
                                                <?php if(!empty($noticeboard->instructor_id) and !empty($noticeboard->webinar_id)): ?>
                                                    <?php echo e(trans('product.course')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('public.'.$noticeboard->type)); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="js-noticeboard-time text-dark-blue font-weight-500 align-middle"><?php echo e(dateTimeFormat($noticeboard->created_at,'j M Y | H:i')); ?></td>
                                        <td class="text-right align-middle">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_create')): ?>
                                                        <a href="/panel/<?php echo e((!empty($isCourseNotice) and $isCourseNotice) ? 'course-noticeboard' : 'noticeboard'); ?>/<?php echo e($noticeboard->id); ?>/edit" class="webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_noticeboard_delete')): ?>
                                                        <a href="/panel/<?php echo e((!empty($isCourseNotice) and $isCourseNotice) ? 'course-noticeboard' : 'noticeboard'); ?>/<?php echo e($noticeboard->id); ?>/delete" class="delete-action webinar-actions d-block mt-10 text-hover-primary"><?php echo e(trans('public.delete')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'comment.png',
                'title' => trans('panel.comments_no_result'),
                'hint' =>  nl2br(trans('panel.comments_no_result_hint')) ,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($noticeboards->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>

    <div class="d-none" id="noticeboardMessageModal">
        <div class="text-center">
            <h3 class="modal-title font-16 font-weight-bold text-dark-blue"></h3>
            <span class="modal-time d-block font-12 text-gray mt-15"></span>
            <p class="modal-message font-weight-500 text-gray mt-2"></p>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/panel/noticeboard.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\noticeboard\index.blade.php ENDPATH**/ ?>