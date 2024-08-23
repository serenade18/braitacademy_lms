<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a><?php echo e(trans('admin/main.users')); ?></a></div>
                <div class="breadcrumb-item"><a href="#"><?php echo e($pageTitle); ?></a></div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin_user_ip_restriction_create")): ?>
                <button data-path="<?php echo e(getAdminPanelUrl("/users/ip-restriction/get-form")); ?>" class="js-add-restriction btn btn-primary"><?php echo e(trans('admin/main.add_new')); ?></button>
            <?php endif; ?>
        </div>

        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-striped font-14">
                    <tr>
                        <th width="120"><?php echo e(trans('admin/main.type')); ?></th>
                        <th class="text-left" width="200"><?php echo e(trans('update.value')); ?></th>
                        <th class="text-left"><?php echo e(trans('product.reason')); ?></th>
                        <th class="text-left"><?php echo e(trans('update.blocked_date')); ?></th>
                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                    </tr>

                    <?php $__currentLoopData = $restrictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restriction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td width="120"><?php echo e(trans("update.{$restriction->type}")); ?></td>


                            <td class="text-left" width="200">
                                <?php if($restriction->type == "country"): ?>
                                    <?php echo e(getCountriesLists($restriction->value)); ?>

                                <?php else: ?>
                                    <?php echo e($restriction->value); ?>

                                <?php endif; ?>
                            </td>

                            <td class="text-left"><?php echo e($restriction->reason); ?></td>

                            <td class="text-left"><?php echo e(dateTimeFormat($restriction->created_at, 'j M Y H:i')); ?></td>


                            <td class="text-center mb-2" width="120">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("admin_user_ip_restriction_create")): ?>
                                    <a href="<?php echo e(getAdminPanelUrl("/users/ip-restriction/{$restriction->id}/edit")); ?>" class="js-edit-restriction btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_ip_restriction_delete')): ?>
                                    <?php echo $__env->make('admin.includes.delete_button',[
                                            'url' => getAdminPanelUrl("/users/ip-restriction/{$restriction->id}/delete"),
                                           ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <?php echo e($restrictions->appends(request()->input())->links()); ?>

        </div>
    </div>


    <section class="card">
        <div class="card-body">
            <div class="section-title ml-0 mt-0 mb-3"><h5><?php echo e(trans('admin/main.hints')); ?></h5></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.restrictions_hint_title_1')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.restrictions_hint_description_1')); ?></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.restrictions_hint_title_2')); ?></div>
                        <div class=" text-small font-600-bold"><?php echo e(trans('update.restrictions_hint_description_2')); ?></div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media-body">
                        <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.restrictions_hint_title_3')); ?></div>
                        <div class="text-small font-600-bold"><?php echo e(trans('update.restrictions_hint_description_3')); ?></div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="/assets/default/js/admin/ip-restriction.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\users\restrictions\lists\index.blade.php ENDPATH**/ ?>