<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('quiz.certificates_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/56.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($activeQuizzes); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.active_certificates')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/57.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($achievementsCount); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.student_achievements')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/60.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($failedResults); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.failed_students')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-lg-3 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($avgGrade); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('quiz.average_grade')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('quiz.filter_certificates')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="" method="get" class="row">
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
                                    <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" value="<?php echo e(request()->get('from','')); ?>" aria-describedby="dateInputGroupPrepend"/>
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
                                    <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>" value="<?php echo e(request()->get('to','')); ?>" aria-describedby="dateInputGroupPrepend"/>
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
                                <select name="webinar_id" class="form-control">
                                    <option value="all"><?php echo e(trans('webinars.all_courses')); ?></option>

                                    <?php $__currentLoopData = $userWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userWebinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($userWebinar->id); ?>" <?php if(request()->get('webinar_id','') == $userWebinar->id): ?> selected <?php endif; ?>><?php echo e($userWebinar->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('quiz.quiz')); ?></label>
                                        <select id="quizFilter" name="quiz_id" class="form-control" <?php if(empty(request()->get('quiz_id'))): ?> disabled <?php endif; ?>>
                                            <option value="all"><?php echo e(trans('quiz.all_quizzes')); ?></option>

                                            <?php $__currentLoopData = $userAllQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($userQuiz->id); ?>" data-webinar-id="<?php echo e($userQuiz->webinar_id); ?>" <?php if(request()->get('quiz_id','') == $userQuiz->id): ?> selected <?php else: ?> class="d-none" <?php endif; ?>><?php echo e($userQuiz->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('quiz.grade')); ?></label>
                                        <input type="text" name="grade" value="<?php echo e(request()->get('grade','')); ?>" class="form-control"/>
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
            <h2 class="section-title"><?php echo e(trans('quiz.active_certificates')); ?></h2>
        </div>

        <?php if(!empty($quizzes) and count($quizzes)): ?>
            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(trans('quiz.quiz')); ?></th>
                                    <th class="text-center"><?php echo e(trans('quiz.grade')); ?></th>
                                    <th class="text-center"><?php echo e(trans('quiz.average')); ?></th>
                                    <th class="text-center"><?php echo e(trans('quiz.generated_certificates')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <span class="d-block text-dark-blue font-weight-500"><?php echo e($quiz->title); ?></span>
                                            <span class="d-block mt-5 font-12 text-gray"><?php echo e(!empty($quiz->webinar) ? $quiz->webinar->title : trans('update.delete_item')); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e($quiz->pass_mark); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(round($quiz->avg_grade, 2)); ?></span>
                                        </td>
                                        <td class="text-dark-blue font-weight-500 align-middle"><?php echo e(count($quiz->certificates)); ?></td>
                                        <td class="align-middle">
                                            <span class="text-dark-blue font-weight-500"><?php echo e(dateTimeFormat($quiz->created_at, 'j M Y')); ?></span>
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
                'file_name' => 'certificate.png',
                'title' => trans('quiz.certificates_no_result'),
                'hint' => nl2br(trans('quiz.certificates_no_result_hint')),
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>

    <div class="my-30">
        <?php echo e($quizzes->appends(request()->input())->links('vendor.pagination.panel')); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/panel/certificates.min.js"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\certificates\list.blade.php ENDPATH**/ ?>