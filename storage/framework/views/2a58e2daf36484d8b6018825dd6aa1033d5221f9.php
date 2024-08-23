<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('update.registration_packages')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('update.registration_packages')); ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.total_buy_instructors_packages')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalBuyInstructorsPackages); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-clipboard-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.total_buy_organization_packages')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalBuyOrganizationPackages); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-users"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('financial.total_amount')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e(handlePrice($sales->sum('total_amount'))); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-users"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total_sales')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($sales->count()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.user_role')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.days')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.price')); ?></th>
                                        <th class="text-center"><?php echo e(trans('update.activation_date')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.ext_date')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left"><?php echo e(!empty($sale->buyer) ? $sale->buyer->full_name : ''); ?></td>
                                            <td class="text-center"><?php echo e(!empty($sale->buyer) ? $sale->buyer->role_name : ''); ?></td>
                                            <td class="text-center"><?php echo e(!empty($sale->registrationPackage) ? $sale->registrationPackage->title : ''); ?></td>
                                            <td class="text-center"><?php echo e(!empty($sale->registrationPackage) ? $sale->registrationPackage->days : ''); ?></td>
                                            <td class="text-center"><?php echo e(!empty($sale->registrationPackage) ? handlePrice($sale->registrationPackage->price) : ''); ?></td>
                                            <td class="text-center"><?php echo e(dateTimeFormat($sale->created_at, 'Y M j | H:i')); ?></td>
                                            <td class="text-center"><?php echo e(!empty($sale->registrationPackage) ? dateTimeFormat(($sale->created_at + ($sale->registrationPackage->days * 24 * 60 *60)) , 'Y M j | H:i') : ''); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($sales->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\registration_packages\reports.blade.php ENDPATH**/ ?>