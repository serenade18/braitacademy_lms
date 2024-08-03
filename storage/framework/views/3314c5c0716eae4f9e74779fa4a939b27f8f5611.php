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

        <?php if(empty(getCertificateMainSettings("certificate_api_user_id")) or empty(getCertificateMainSettings("certificate_api_key"))): ?>
            <div class="my-2 alert alert-danger d-flex align-items-center justify-content-between">
                <p class=""><?php echo e(trans('update.certificate_credentials_not_set_hint')); ?></p>

                <a href="<?php echo e(getAdminPanelUrl("/certificates/settings")); ?>" target="_blank" class="text-white btn-link"><?php echo e(trans('admin/main.settings')); ?></a>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(getAdminPanelUrl()); ?>/certificates/course-competition" method="get" class="row mb-0">

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label class="input-label d-block"><?php echo e(trans('admin/main.class')); ?></label>
                                <select name="webinars_ids[]" multiple="multiple" class="form-control search-webinar-select2"
                                        data-placeholder="<?php echo e(trans('admin/main.search_webinar')); ?>">
                                    <?php if(!empty($webinars)): ?>
                                        <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($webinar->id); ?>"
                                                    selected="selected"><?php echo e($webinar ? $webinar->title : ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.instructor')); ?></label>
                                <select name="teacher_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2"
                                        data-placeholder="Search teachers">

                                    <?php if(!empty($teachers) and $teachers->count() > 0): ?>
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($teacher->id); ?>" selected><?php echo e($teacher->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.student')); ?></label>
                                <select name="student_ids[]" multiple="multiple" data-search-option="just_student_role" class="form-control search-user-select2"
                                        data-placeholder="Search students">

                                    <?php if(!empty($students) and $students->count() > 0): ?>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($student->id); ?>" selected><?php echo e($student->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary w-100"><?php echo e(trans('public.show_results')); ?></button>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.type')); ?></th>
                                        <th class="text-left"><?php echo e(trans('quiz.student')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.date_time')); ?></th>
                                        <th><?php echo e(trans('admin/main.action')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($certificate->id); ?></td>

                                            <td class="text-left">
                                                <?php if(!empty($certificate->webinar_id)): ?>
                                                    <?php echo e($certificate->webinar->title); ?>

                                                <?php else: ?>
                                                    <?php echo e($certificate->bundle->title); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left">
                                                <?php if(!empty($certificate->webinar_id)): ?>
                                                    <?php echo e(trans('product.course')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('update.bundle')); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left"><?php echo e($certificate->student->full_name); ?></td>

                                            <td class="text-left">
                                                <?php if(!empty($certificate->webinar_id)): ?>
                                                    <?php echo e($certificate->webinar->teacher->full_name); ?>

                                                <?php else: ?>
                                                    <?php echo e($certificate->bundle->teacher->full_name); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center"><?php echo e(dateTimeFormat($certificate->created_at, 'j M Y')); ?></td>

                                            <td>
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/certificates/<?php echo e($certificate->id); ?>/download" target="_blank" class="btn-transparent text-primary" data-toggle="tooltip" title="<?php echo e(trans('quiz.download_certificate')); ?>">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($certificates->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/certificates/course_certificates.blade.php ENDPATH**/ ?>