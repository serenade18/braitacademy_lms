<?php $__env->startPush('libraries_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.affiliate_users')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.affiliate_users')); ?></div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_referrals_export')): ?>
                                <div class="text-right">
                                    <a href="<?php echo e(getAdminPanelUrl()); ?>/referrals/excel?type=users" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14 ">
                                    <tr>
                                        <th><?php echo e(trans('admin/main.user')); ?></th>
                                        <th><?php echo e(trans('admin/main.role')); ?></th>
                                        <th><?php echo e(trans('admin/main.user_group')); ?></th>
                                        <th><?php echo e(trans('admin/main.referral_code')); ?></th>
                                        <th><?php echo e(trans('admin/main.registration_income')); ?></th>
                                        <th><?php echo e(trans('admin/main.aff_sales_commission')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <tbody>
                                    <?php $__currentLoopData = $affiliates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($affiliate->affiliateUser->full_name); ?></td>

                                            <td>
                                                <?php if($affiliate->affiliateUser->isUser()): ?>
                                                    Student
                                                <?php elseif($affiliate->affiliateUser->isTeacher()): ?>
                                                    Teacher
                                                <?php elseif($affiliate->affiliateUser->isOrganization()): ?>
                                                    Organization
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e(!empty($affiliate->affiliateUser->getUserGroup()) ? $affiliate->affiliateUser->getUserGroup()->name : '-'); ?></td>

                                            <td><?php echo e(!empty($affiliate->affiliateUser->affiliateCode) ? $affiliate->affiliateUser->affiliateCode->code : ''); ?></td>

                                            <td><?php echo e(handlePrice($affiliate->getTotalAffiliateRegistrationAmounts())); ?></td>

                                            <td><?php echo e(handlePrice($affiliate->getTotalAffiliateCommissions())); ?></td>

                                            <td><?php echo e($affiliate->affiliateUser->affiliate ? trans('admin/main.yes') : trans('admin/main.no')); ?></td>

                                            <td>
                                                <a href="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($affiliate->affiliateUser->id); ?>/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            
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
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.registration_income_hint')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.registration_income_desc')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('admin/main.aff_sales_commission_hint')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('admin/main.aff_sales_commission_desc')); ?></div>
                    </div>
                </div>



            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\referrals\users.blade.php ENDPATH**/ ?>