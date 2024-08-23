<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('panel.comments_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/46.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($quizzesCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.quizzes')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/47.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($questionsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.questions')); ?></span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($userCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.students')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('quiz.filter_quizzes')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/quizzes" method="get" class="row">
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
                                    <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('from','')); ?>"/>
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
                                    <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" aria-describedby="dateInputGroupPrepend" value="<?php echo e(request()->get('to','')); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('quiz.quiz_or_webinar')); ?></label>
                                <select name="quiz_id" class="form-control select2" data-placeholder="<?php echo e(trans('public.all')); ?>">
                                    <option value="all"><?php echo e(trans('public.all')); ?></option>

                                    <?php $__currentLoopData = $allQuizzesLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($allQuiz->id); ?>" <?php if(request()->get('quiz_id') == $allQuiz->id): ?> selected <?php endif; ?>><?php echo e($allQuiz->title .' - '. ($allQuiz->webinar ? $allQuiz->webinar->title : '-')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('public.total_mark')); ?></label>
                                        <input type="text" name="total_mark" class="form-control" value="<?php echo e(request()->get('total_mark','')); ?>"/>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('public.status')); ?></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="all"><?php echo e(trans('public.all')); ?></option>
                                            <option value="active" <?php if(request()->get('status') == 'active'): ?> selected <?php endif; ?> ><?php echo e(trans('public.active')); ?></option>
                                            <option value="inactive" <?php if(request()->get('status') == 'inactive'): ?> selected <?php endif; ?> ><?php echo e(trans('public.inactive')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('quiz.quizzes')); ?></h2>

            <form action="/panel/quizzes" method="get" class="">
                <div class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="mb-0 mr-10 cursor-pointer text-gray font-14 font-weight-500" for="activeQuizzesSwitch"><?php echo e(trans('quiz.show_only_active_quizzes')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="active_quizzes" class="custom-control-input" id="activeQuizzesSwitch" <?php if(request()->get('active_quizzes',null) == 'on'): ?> checked <?php endif; ?>>
                        <label class="custom-control-label" for="activeQuizzesSwitch"></label>
                    </div>
                </div>
            </form>
        </div>

        <?php if($quizzes->count() > 0): ?>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th class="text-left"><?php echo e(trans('public.title')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.questions')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.time')); ?> <span class="braces">(<?php echo e(trans('public.min')); ?>)</span></th>
                                    <th class="text-center"><?php echo e(trans('public.total_mark')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.pass_mark')); ?></th>
                                    <th class="text-center"><?php echo e(trans('quiz.students')); ?></th>
                                    
                                    <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date_created')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <span class="d-block"><?php echo e($quiz->title); ?></span>
                                            <span class="font-12 text-gray d-block">
                                                <?php if(!empty($quiz->webinar)): ?>
                                                    <?php echo e($quiz->webinar->title); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('panel.not_assign_any_webinar')); ?>

                                                <?php endif; ?>
                                        </span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php echo e($quiz->quizQuestions->count()); ?>

                                            <?php if(($quiz->display_limited_questions and !empty($quiz->display_number_of_questions))): ?>
                                                <span class="font-12 text-gray">(<?php echo e(trans('public.active')); ?>: <?php echo e($quiz->display_number_of_questions); ?>)</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle"><?php echo e($quiz->time); ?></td>
                                        <td class="text-center align-middle"><?php echo e($quiz->quizQuestions->sum('grade')); ?></td>
                                        <td class="text-center align-middle"><?php echo e($quiz->pass_mark); ?></td>
                                        <td class="text-center align-middle">
                                            <span class="d-block"><?php echo e($quiz->quizResults->pluck('user_id')->count()); ?></span>

                                            <?php if(!empty($quiz->userSuccessRate) and $quiz->userSuccessRate > 0): ?>
                                                <span class="font-12 text-primary d-block"><?php echo e($quiz->userSuccessRate); ?>% <?php echo e(trans('quiz.passed')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center align-middle"><?php echo e(trans('public.'.$quiz->status)); ?></td>

                                        <td class="text-center align-middle"><?php echo e(dateTimeFormat($quiz->created_at, 'j M Y H:i')); ?></td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu font-weight-normal">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_create')): ?>
                                                        <a href="/panel/quizzes/<?php echo e($quiz->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('panel_quizzes_delete')): ?>
                                                        <a href="/panel/quizzes/<?php echo e($quiz->id); ?>/delete" data-item-id="1" class="webinar-actions d-block mt-10 delete-action"><?php echo e(trans('public.delete')); ?></a>
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
                'file_name' => 'quiz.png',
                'title' => trans('quiz.quiz_no_result'),
                'hint' => nl2br(trans('quiz.quiz_no_result_hint')),
                'btn' => ['url' => '/panel/quizzes/new','text' => trans('quiz.create_a_quiz')]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

    </section>

    <div class="my-30">
        <?php echo e($quizzes->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script src="/assets/default/js/panel/quiz_list.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\quizzes\lists.blade.php ENDPATH**/ ?>