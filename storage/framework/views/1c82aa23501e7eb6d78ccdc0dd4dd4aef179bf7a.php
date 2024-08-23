<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/chartjs/chart.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><a href="<?php echo e(getAdminPanelUrl()); ?>/webinars"><?php echo e(trans('admin/main.classes')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <section>
            <h2 class="section-title"><?php echo e($webinar->title); ?></h2>

            <div class="activities-container mt-3 p-3 p-lg-3">
                <div class="row">
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-dark mt-1"><?php echo e($studentsCount); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.students')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/125.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-dark mt-1"><?php echo e($commentsCount); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.comments')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-dark mt-1"><?php echo e($salesCount); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.sales')); ?></span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/33.png" width="64" height="64" alt="">
                            <strong class="font-30 font-weight-bold text-dark mt-1"><?php echo e((!empty($salesAmount) and $salesAmount > 0) ? handlePrice($salesAmount) : 0); ?></strong>
                            <span class="font-16 text-gray font-weight-500"><?php echo e(trans('panel.sales_amount')); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="row">

            <div class="col-6 col-md-3 mt-3">
                <div class="dashboard-stats rounded-sm panel-shadow p-10 p-md-3 d-flex align-items-center">
                    <div class="stat-icon stat-icon-chapters">
                        <img src="/assets/default/img/icons/course-statistics/1.svg" alt="">
                    </div>
                    <div class="d-flex flex-column ml-2">
                        <span class="font-30 font-weight-bold text-dark"><?php echo e($chaptersCount); ?></span>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.chapters')); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mt-3">
                <div class="dashboard-stats rounded-sm panel-shadow p-10 p-md-3 d-flex align-items-center">
                    <div class="stat-icon stat-icon-sessions">
                        <img src="/assets/default/img/icons/course-statistics/2.svg" alt="">
                    </div>
                    <div class="d-flex flex-column ml-2">
                        <span class="font-30 font-weight-bold text-dark"><?php echo e($sessionsCount); ?></span>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('public.sessions')); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mt-3">
                <div class="dashboard-stats rounded-sm panel-shadow p-10 p-md-3 d-flex align-items-center">
                    <div class="stat-icon stat-icon-pending-quizzes">
                        <img src="/assets/default/img/icons/course-statistics/3.svg" alt="">
                    </div>
                    <div class="d-flex flex-column ml-2">
                        <span class="font-30 font-weight-bold text-dark"><?php echo e($pendingQuizzesCount); ?></span>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.pending_quizzes')); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mt-3">
                <div class="dashboard-stats rounded-sm panel-shadow p-10 p-md-3 d-flex align-items-center">
                    <div class="stat-icon stat-icon-pending-assignments">
                        <img src="/assets/default/img/icons/course-statistics/4.svg" alt="">
                    </div>
                    <div class="d-flex flex-column ml-2">
                        <span class="font-30 font-weight-bold text-dark"><?php echo e($pendingAssignmentsCount); ?></span>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.pending_assignments')); ?></span>
                    </div>
                </div>
            </div>

        </section>

        <section>
            <div class="row">
                <div class="col-12 col-md-3 mt-3">
                    <div class="course-statistic-cards-shadow py-3 px-2 py-md-3 px-md-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center flex-column">
                            <img src="/assets/default/img/activity/33.png" width="64" height="64" alt="">

                            <span class="font-30 text-dark mt-3 font-weight-bold"><?php echo e($courseRate); ?></span>
                            <?php echo $__env->make('admin.webinars.includes.rate',['rate' => $courseRate, 'className' => 'mt-2', 'dontShowRate' => true, 'showRateStars' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top font-16 font-weight-500">
                            <span class="text-gray"><?php echo e(trans('update.total_rates')); ?></span>
                            <span class="text-dark font-weight-bold"><?php echo e($courseRateCount); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mt-3">
                    <div class="course-statistic-cards-shadow py-3 px-2 py-md-3 px-md-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center flex-column">
                            <img src="/assets/default/img/activity/88.svg" width="64" height="64" alt="">

                            <span class="font-30 text-dark mt-3 font-weight-bold"><?php echo e($webinar->quizzes->count()); ?></span>
                            <span class="mt-2 font-16 font-weight-500 text-gray"><?php echo e(trans('quiz.quizzes')); ?></span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top font-16 font-weight-500">
                            <span class="text-gray"><?php echo e(trans('quiz.average_grade')); ?></span>
                            <span class="text-dark font-weight-bold"><?php echo e($quizzesAverageGrade); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mt-3">
                    <div class="course-statistic-cards-shadow py-3 px-2 py-md-3 px-md-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center flex-column">
                            <img src="/assets/default/img/activity/homework.svg" width="64" height="64" alt="">

                            <span class="font-30 text-dark mt-3 font-weight-bold"><?php echo e($webinar->assignments->count()); ?></span>
                            <span class="mt-2 font-16 font-weight-500 text-gray"><?php echo e(trans('update.assignments')); ?></span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top font-16 font-weight-500">
                            <span class="text-gray"><?php echo e(trans('quiz.average_grade')); ?></span>
                            <span class="text-dark font-weight-bold"><?php echo e($assignmentsAverageGrade); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mt-3">
                    <div class="course-statistic-cards-shadow py-3 px-2 py-md-3 px-md-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center flex-column">
                            <img src="/assets/default/img/activity/39.svg" width="64" height="64" alt="">

                            <span class="font-30 text-dark mt-3 font-weight-bold"><?php echo e($courseForumsMessagesCount); ?></span>
                            <span class="mt-2 font-16 font-weight-500 text-gray"><?php echo e(trans('update.forum_messages')); ?></span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3 pt-3 border-top font-16 font-weight-500">
                            <span class="text-gray"><?php echo e(trans('update.forum_students')); ?></span>
                            <span class="text-dark font-weight-bold"><?php echo e($courseForumsStudentsCount); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="row">
                <?php echo $__env->make('admin.webinars.course_statistics.includes.pie_charts',[
                    'cardTitle' => trans('update.students_user_roles'),
                    'cardId' => 'studentsUserRolesChart',
                    'cardPrimaryLabel' => trans('public.students'),
                    'cardSecondaryLabel' => trans('public.instructors'),
                    'cardWarningLabel' => trans('home.organizations'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.webinars.course_statistics.includes.pie_charts',[
                    'cardTitle' => trans('update.course_progress'),
                    'cardId' => 'courseProgressChart',
                    'cardPrimaryLabel' => trans('update.completed'),
                    'cardSecondaryLabel' => trans('webinars.in_progress'),
                    'cardWarningLabel' => trans('update.not_started'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.webinars.course_statistics.includes.pie_charts',[
                    'cardTitle' => trans('quiz.quiz_status'),
                    'cardId' => 'quizStatusChart',
                    'cardPrimaryLabel' => trans('quiz.passed'),
                    'cardSecondaryLabel' => trans('public.pending'),
                    'cardWarningLabel' => trans('quiz.failed'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.webinars.course_statistics.includes.pie_charts',[
                    'cardTitle' => trans('update.assignments_status'),
                    'cardId' => 'assignmentsStatusChart',
                    'cardPrimaryLabel' => trans('quiz.passed'),
                    'cardSecondaryLabel' => trans('public.pending'),
                    'cardWarningLabel' => trans('quiz.failed'),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </section>


        <section>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <div class="course-statistic-cards-shadow monthly-sales-card pt-2 px-2 pb-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="font-16 text-dark font-weight-bold"><?php echo e(trans('panel.monthly_sales')); ?></h3>

                            <span class="font-16 font-weight-500 text-gray"><?php echo e(dateTimeFormat(time(),'M Y')); ?></span>
                        </div>

                        <div class="monthly-sales-chart mt-2">
                            <canvas id="monthlySalesChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-3">
                    <div class="course-statistic-cards-shadow monthly-sales-card pt-2 px-2 pb-3 rounded-sm bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="font-16 text-dark font-weight-bold"><?php echo e(trans('update.course_progress')); ?> (%)</h3>
                        </div>

                        <div class="monthly-sales-chart mt-2">
                            <canvas id="courseProgressLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="section-title"><?php echo e(trans('panel.students_list')); ?></h2>

            <?php if(!empty($students) and !$students->isEmpty()): ?>
                <div class="panel-section-card py-3 px-3 mt-3">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="table-responsive">
                                <table class="table custom-table text-center ">
                                    <thead>
                                    <tr>
                                        <th class="text-left text-gray"><?php echo e(trans('quiz.student')); ?></th>
                                        <th class="text-center text-gray"><?php echo e(trans('update.progress')); ?></th>
                                        <th class="text-center text-gray"><?php echo e(trans('update.passed_quizzes')); ?></th>
                                        <th class="text-center text-gray"><?php echo e(trans('update.unsent_assignments')); ?></th>
                                        <th class="text-center text-gray"><?php echo e(trans('update.pending_assignments')); ?></th>
                                        <th class="text-center text-gray"><?php echo e(trans('panel.purchase_date')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $usersLists = new \Illuminate\Support\Collection($students->items());
                                        $usersLists = $usersLists->merge($unregisteredUsers);
                                    ?>

                                    <?php $__currentLoopData = $usersLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td class="text-left">
                                                <div class="user-inline-avatar d-flex align-items-center">
                                                    <div class="avatar bg-gray200">
                                                        <img src="<?php echo e($user->getAvatar()); ?>" class="img-cover" alt="">
                                                    </div>
                                                    <div class=" ml-2">
                                                        <span class="d-block text-dark font-weight-500"><?php echo e($user->full_name); ?></span>
                                                        <span class="mt-2 d-block font-12 text-gray"><?php echo e($user->email); ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark font-weight-500"><?php echo e($user->course_progress ?? 0); ?>%</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark font-weight-500"><?php echo e($user->passed_quizzes ?? 0); ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark font-weight-500"><?php echo e($user->unsent_assignments ?? 0); ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark font-weight-500"><?php echo e($user->pending_assignments ?? 0); ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <?php if(empty($user->id)): ?>
                                                    <span class="text-warning"><?php echo e(trans('update.unregistered')); ?></span>
                                                <?php else: ?>
                                                    <span class="text-dark font-weight-500"><?php echo e(dateTimeFormat($user->created_at,'j M Y | H:i')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <?php echo e($students->appends(request()->input())->links()); ?>

                </div>
            <?php else: ?>

                <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                    'file_name' => 'studentt.png',
                    'title' => trans('update.course_statistic_students_no_result'),
                    'hint' =>  nl2br(trans('update.course_statistic_students_no_result_hint')),
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>
    <script src="/assets/default/js/panel/course_statistics.min.js"></script>

    <script>
        (function ($) {
            "use strict";

            <?php if(!empty($studentsUserRolesChart)): ?>
            makePieChart('studentsUserRolesChart', <?php echo json_encode($studentsUserRolesChart['labels'], 15, 512) ?>,<?php echo json_encode($studentsUserRolesChart['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($courseProgressChart)): ?>
            makePieChart('courseProgressChart', <?php echo json_encode($courseProgressChart['labels'], 15, 512) ?>,<?php echo json_encode($courseProgressChart['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($quizStatusChart)): ?>
            makePieChart('quizStatusChart', <?php echo json_encode($quizStatusChart['labels'], 15, 512) ?>,<?php echo json_encode($quizStatusChart['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($assignmentsStatusChart)): ?>
            makePieChart('assignmentsStatusChart', <?php echo json_encode($assignmentsStatusChart['labels'], 15, 512) ?>,<?php echo json_encode($assignmentsStatusChart['data'], 15, 512) ?>);
            <?php endif; ?>


            <?php if(!empty($monthlySalesChart)): ?>
            handleMonthlySalesChart(<?php echo json_encode($monthlySalesChart['labels'], 15, 512) ?>,<?php echo json_encode($monthlySalesChart['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($courseProgressLineChart)): ?>
            handleCourseProgressChart(<?php echo json_encode($courseProgressLineChart['labels'], 15, 512) ?>,<?php echo json_encode($courseProgressLineChart['data'], 15, 512) ?>);
            <?php endif; ?>

            // handleCourseProgressChartChart();
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\course_statistics\index.blade.php ENDPATH**/ ?>