<?php $__env->startPush('libraries_top'); ?>
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.theme.min.css">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="section">


        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.users_without_purchases')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($usersWithoutPurchases); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.teachers_without_class')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($teachersWithoutClass); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-star"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.featured_classes')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($featuredClasses); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-percentage"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.active_discounts')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($activeDiscounts); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.net_profit_statistics')); ?></h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <button type="button" class="js-sale-chart-month btn"><?php echo e(trans('admin/main.month')); ?></button>
                                <button type="button" class="js-sale-chart-year btn btn-primary"><?php echo e(trans('admin/main.year')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="position-relative">
                                    <canvas id="netProfitChart" height="360"></canvas>
                                </div>
                            </div>
                        </div>

                        <?php if(!empty($getNetProfitStatistics)): ?>
                            <div class="statistic-details mt-4 position-relative">
                                <div class="statistic-details-item">
                                    <span class="text-muted">
                                        <?php if($getNetProfitStatistics['todayIncome']['grow_percent']['status'] == 'up'): ?>
                                            <span class="text-primary"><i class="fas fa-caret-up"></i></span>
                                        <?php else: ?>
                                            <span class="text-danger"><i class="fas fa-caret-down"></i></span>
                                        <?php endif; ?>

                                        <?php echo e($getNetProfitStatistics['todayIncome']['grow_percent']['percent']); ?>

                                    </span>

                                    <div class="detail-value"><?php echo e(handlePrice($getNetProfitStatistics['todayIncome']['amount'])); ?></div>
                                    <div class="detail-name"><?php echo e(trans('admin/main.today_income')); ?></div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted">
                                        <?php if($getNetProfitStatistics['weekIncome']['grow_percent']['status'] == 'up'): ?>
                                            <span class="text-primary"><i class="fas fa-caret-up"></i></span>
                                        <?php else: ?>
                                            <span class="text-danger"><i class="fas fa-caret-down"></i></span>
                                        <?php endif; ?>

                                        <?php echo e($getNetProfitStatistics['weekIncome']['grow_percent']['percent']); ?>

                                    </span>

                                    <div class="detail-value"><?php echo e(handlePrice($getNetProfitStatistics['weekIncome']['amount'])); ?></div>
                                    <div class="detail-name"><?php echo e(trans('admin/main.week_income')); ?></div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted">
                                        <?php if($getNetProfitStatistics['monthIncome']['grow_percent']['status'] == 'up'): ?>
                                            <span class="text-primary"><i class="fas fa-caret-up"></i></span>
                                        <?php else: ?>
                                            <span class="text-danger"><i class="fas fa-caret-down"></i></span>
                                        <?php endif; ?>

                                        <?php echo e($getNetProfitStatistics['monthIncome']['grow_percent']['percent']); ?>

                                    </span>

                                    <div class="detail-value"><?php echo e(handlePrice($getNetProfitStatistics['monthIncome']['amount'])); ?></div>
                                    <div class="detail-name"><?php echo e(trans('admin/main.month_income')); ?></div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted">
                                        <?php if($getNetProfitStatistics['yearIncome']['grow_percent']['status'] == 'up'): ?>
                                            <span class="text-primary"><i class="fas fa-caret-up"></i></span>
                                        <?php else: ?>
                                            <span class="text-danger"><i class="fas fa-caret-down"></i></span>
                                        <?php endif; ?>

                                        <?php echo e($getNetProfitStatistics['yearIncome']['grow_percent']['percent']); ?>

                                    </span>

                                    <div class="detail-value"><?php echo e(handlePrice($getNetProfitStatistics['yearIncome']['amount'])); ?></div>
                                    <div class="detail-name"><?php echo e(trans('admin/main.year_income')); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.classes_statistics')); ?></h4>
                    </div>
                    <div class="card-body">
                        <canvas id="classesStatisticsChart" height="490"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.top_selling_classes')); ?></h4>
                        <div class="card-header-action">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=course&sort=sales_desc" class="btn btn-primary"><?php echo e(trans('admin/main.view_more')); ?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">

                                <tr>
                                    <th>#</th>
                                    <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                    <th><?php echo e(trans('admin/main.sales')); ?></th>
                                    <th><?php echo e(trans('admin/main.income')); ?></th>
                                </tr>

                                <?php $__currentLoopData = $getTopSellingClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getTopSellingClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($getTopSellingClass->id); ?></td>
                                        <td>
                                            <a href="<?php echo e($getTopSellingClass->getUrl()); ?>" target="_blank" class="media-body text-left">
                                                <div><?php echo e($getTopSellingClass->title); ?></div>
                                                <div class="text-primary text-small font-600-bold"><?php echo e(trans('webinars.'.$getTopSellingClass->type)); ?></div>
                                            </a>
                                        </td>
                                        <td><?php echo e($getTopSellingClass->sales_count); ?></td>
                                        <td><?php echo e(handlePrice($getTopSellingClass->sales_amount)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.top_selling_appointments')); ?></h4>
                        <div class="card-header-action">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/consultants?sort=appointments_desc" class="btn btn-sm btn-primary"><?php echo e(trans('admin/main.view_more')); ?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th>#</th>
                                    <th class="text-left"><?php echo e(trans('admin/main.consultant')); ?></th>
                                    <th><?php echo e(trans('admin/main.sales')); ?></th>
                                    <th><?php echo e(trans('admin/main.income')); ?></th>
                                </tr>

                                <?php $__currentLoopData = $getTopSellingAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getTopSellingAppointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($getTopSellingAppointment->creator->id); ?></td>
                                        <td class="text-left"><?php echo e($getTopSellingAppointment->creator->full_name); ?></td>
                                        <td><?php echo e($getTopSellingAppointment->sales_count); ?></td>
                                        <td><?php echo e(handlePrice($getTopSellingAppointment->sales_amount)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.top_selling_instructors')); ?></h4>
                        <div class="card-header-action">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/instructors?sort=sales_classes_desc" class="btn btn-sm btn-primary"><?php echo e(trans('admin/main.view_more')); ?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th><?php echo e(trans('admin/main.id')); ?></th>
                                    <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                    <th><?php echo e(trans('admin/main.classes_durations')); ?></th>
                                    <th><?php echo e(trans('admin/main.sales')); ?></th>
                                    <th><?php echo e(trans('admin/main.income')); ?></th>

                                </tr>

                                <?php $__currentLoopData = $getTopSellingTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getTopSellingTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($getTopSellingTeacher->id); ?></td>
                                        <td class="text-left"><?php echo e($getTopSellingTeacher->full_name); ?></td>
                                        <td><?php echo e(convertMinutesToHourAndMinute($getTopSellingTeacher->classes_durations)); ?> Hours</td>
                                        <td><?php echo e($getTopSellingTeacher->sales_count); ?></td>
                                        <td><?php echo e(handlePrice($getTopSellingTeacher->sales_amount)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.top_selling_organizations')); ?></h4>
                        <div class="card-header-action">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/organizations?sort=sales_classes_desc" class="btn btn-sm btn-primary"><?php echo e(trans('admin/main.view_more')); ?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th><?php echo e(trans('admin/main.id')); ?></th>
                                    <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                    <th><?php echo e(trans('admin/main.classes_durations')); ?></th>
                                    <th><?php echo e(trans('admin/main.sales')); ?></th>
                                    <th><?php echo e(trans('admin/main.income')); ?></th>

                                </tr>
                                <?php $__currentLoopData = $getTopSellingOrganizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getTopSellingOrganization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($getTopSellingOrganization->id); ?></td>
                                        <td class="text-left"><?php echo e($getTopSellingOrganization->full_name); ?></td>
                                        <td><?php echo e(convertMinutesToHourAndMinute($getTopSellingOrganization->classes_durations)); ?> Hours</td>
                                        <td><?php echo e($getTopSellingOrganization->sales_count); ?></td>
                                        <td><?php echo e(handlePrice($getTopSellingOrganization->sales_amount)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(trans('admin/main.most_active_students')); ?></h4>
                        <div class="card-header-action">
                            <a href="<?php echo e(getAdminPanelUrl()); ?>/students?sort=register_desc" class="btn btn-sm btn-primary"><?php echo e(trans('admin/main.view_more')); ?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th>#</th>
                                    <th class="text-left"><?php echo e(trans('admin/main.name')); ?></th>
                                    <th><?php echo e(trans('admin/main.purchased_classes')); ?></th>
                                    <th><?php echo e(trans('admin/main.reserved_appointments')); ?></th>
                                    <th><?php echo e(trans('admin/main.total_purchased_amount')); ?></th>

                                </tr>
                                <?php $__currentLoopData = $getMostActiveStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getMostActiveStudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($getMostActiveStudent->id); ?></td>
                                        <td class="text-left"><?php echo e($getMostActiveStudent->full_name); ?></td>
                                        <td><?php echo e($getMostActiveStudent->purchased_classes); ?></td>
                                        <td><?php echo e($getMostActiveStudent->reserved_appointments); ?></td>
                                        <td><?php echo e(handlePrice($getMostActiveStudent->total_cost)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>
    <script src="/assets/admin/vendor/owl.carousel/owl.carousel.min.js"></script>

    <script src="/assets/admin/js/marketing_dashboard.min.js"></script>

    <script>
        (function ($) {
            "use strict";

            <?php if(!empty($getClassesStatistics)): ?>
            makeClassesStatisticsChart('', <?php echo json_encode($getClassesStatistics['labels'], 15, 512) ?>,<?php echo json_encode($getClassesStatistics['data'], 15, 512) ?>);
            <?php endif; ?>

            <?php if(!empty($getNetProfitChart)): ?>
            makeNetProfitChart('Income', <?php echo json_encode($getNetProfitChart['labels'], 15, 512) ?>,<?php echo json_encode($getNetProfitChart['data'], 15, 512) ?>);
            <?php endif; ?>
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\marketing_dashboard.blade.php ENDPATH**/ ?>