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
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users-cog	"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('admin/main.total')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalPackages); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-tie"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.active_by_instructors')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalActiveByInstructors); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-briefcase"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e(trans('update.active_by_organization')); ?></h4>
                        </div>
                        <div class="card-body">
                            <?php echo e($totalActiveByOrganization); ?>

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
                                        <th>#</th>
                                        <th class="text-left"><?php echo e(trans('admin/main.title')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.role')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.price')); ?></th>
                                        <th class="text-center"><?php echo e(trans('public.days')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.sale_count')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.status')); ?></th>
                                        <th class="text-center"><?php echo e(trans('admin/main.created_at')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e($package->icon); ?>" width="50" height="50" alt="">
                                            </td>
                                            <td class="text-left"><?php echo e($package->title); ?></td>
                                            <td class="text-center"><?php echo e($package->role); ?></td>
                                            <td class="text-center"><?php echo e(handlePrice($package->price)); ?></td>
                                            <td class="text-center"><?php echo e($package->days); ?></td>
                                            <td class="text-center"><?php echo e($package->sales->count()); ?></td>
                                            <td class="text-center">
                                                <span class="<?php echo e($package->status == 'active' ? 'text-success' : 'text-danger'); ?>"><?php echo e(trans('admin/main.'.$package->status)); ?></span>
                                            </td>
                                            <td class="text-center"><?php echo e(dateTimeFormat($package->created_at, 'Y M j | H:i')); ?></td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_edit')): ?>
                                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/registration-packages/<?php echo e($package->id); ?>/edit" class="btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_registration_packages_delete')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/financial/registration-packages/'. $package->id.'/delete','btnClass' => 'btn-sm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($packages->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.registration_packages_list_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.registration_packages_list_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.registration_packages_list_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.registration_packages_list_hint_description_2')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/financial/registration_packages/lists.blade.php ENDPATH**/ ?>