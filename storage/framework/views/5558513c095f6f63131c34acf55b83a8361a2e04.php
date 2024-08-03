<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.quizzes')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.quizzes')); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_quizzes')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalQuizzes); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-clipboard-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.active_quizzes')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalActiveQuizzes); ?>

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
                        <i class="fas fa-user-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_passed_students')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalPassedStudents); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="<?php echo e(getAdminPanelUrl()); ?>/quizzes" method="get" class="row mb-0">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                <input type="text" class="form-control" name="title" value="<?php echo e(request()->get('title')); ?>">
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
                                    <option value="have_certificate" <?php if(request()->get('sort') == 'have_certificate'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.quizzes_have_certificate')); ?></option>
                                    <option value="students_count_asc" <?php if(request()->get('sort') == 'students_count_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.students_ascending')); ?></option>
                                    <option value="students_count_desc" <?php if(request()->get('sort') == 'students_count_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.students_descending')); ?></option>
                                    <option value="passed_count_asc" <?php if(request()->get('sort') == 'passed_count_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.passed_students_ascending')); ?></option>
                                    <option value="passed_count_desc" <?php if(request()->get('sort') == 'passed_count_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.passes_students_descending')); ?></option>
                                    <option value="grade_avg_asc" <?php if(request()->get('sort') == 'grade_avg_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.grades_average_ascending')); ?></option>
                                    <option value="grade_avg_desc" <?php if(request()->get('sort') == 'grade_avg_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.grades_average_descending')); ?></option>
                                    <option value="created_at_asc" <?php if(request()->get('sort') == 'created_at_asc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_ascending')); ?></option>
                                    <option value="created_at_desc" <?php if(request()->get('sort') == 'created_at_desc'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.create_date_descending')); ?></option>
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
                                <label class="input-label"><?php echo e(trans('admin/main.class')); ?></label>
                                <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2"
                                        data-placeholder="Search classes">

                                    <?php if(!empty($webinars) and $webinars->count() > 0): ?>
                                        <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($webinar->id); ?>" selected><?php echo e($webinar->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                <select name="statue" data-plugin-selectTwo class="form-control populate">
                                    <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                    <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.active')); ?></option>
                                    <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?>><?php echo e(trans('admin/main.inactive')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary w-100"><?php echo e(trans('admin/main.show_results')); ?></button>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes_lists_excel')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/quizzes/excel?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes_create')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/quizzes/create" class="btn btn-primary ml-2"><?php echo e(trans('quiz.new_quiz')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.instructor')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.question_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.students_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.average_grade')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.certificate')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span><?php echo e($quiz->title); ?></span>
                                                <?php if(!empty($quiz->webinar)): ?>
                                                    <small class="d-block text-left text-primary"><?php echo e($quiz->webinar->title); ?></small>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left"><?php echo e($quiz->teacher->full_name); ?></td>

                                            <td class="text-center">
                                                <?php echo e($quiz->quizQuestions->count()); ?>

                                                <?php if(($quiz->display_limited_questions and !empty($quiz->display_number_of_questions))): ?>
                                                    <span class="font-12 text-gray">(<?php echo e(trans('public.active')); ?>: <?php echo e($quiz->display_number_of_questions); ?>)</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <span><?php echo e($quiz->quizResults->pluck('user_id')->count()); ?></span>
                                                <span class="d-block text-primary font-12">(<?php echo e(trans('admin/main.passed')); ?>: <?php echo e($quiz->quizResults->where('status','passed')->count()); ?>)</span>
                                            </td>

                                            <td class="text-center"><?php echo e(round($quiz->quizResults->avg('user_grade'),2)); ?> </td>

                                            <td class="text-center">
                                                <?php if($quiz->certificate): ?>
                                                    <a class="text-success fas fa-check"></a>
                                                <?php else: ?>
                                                    <a class="text-danger fas fa-times"></a>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if($quiz->status === \App\Models\Quiz::ACTIVE): ?>
                                                    <span class="text-success"><?php echo e(trans('admin/main.active')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-warning"><?php echo e(trans('admin/main.inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes_results')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/quizzes/<?php echo e($quiz->id); ?>/results" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" title="<?php echo e(trans('admin/main.quiz_results')); ?>">
                                                        <i class="fa fa-poll fa-1x"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/quizzes/<?php echo e($quiz->id); ?>/edit" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_quizzes_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/quizzes/'.$quiz->id.'/delete' , 'btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($quizzes->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/quizzes/lists.blade.php ENDPATH**/ ?>