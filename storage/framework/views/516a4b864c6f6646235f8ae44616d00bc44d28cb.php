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

        <div class="section-body">
            <section class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center font-14">

                            <tr>
                                <th class="text-left"><?php echo e(trans('admin/main.user')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.total_points')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.spent_points')); ?></th>
                                <th class="text-center"><?php echo e(trans('update.available_points')); ?></th>
                            </tr>

                            <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td class="text-left">
                                        <?php if(!empty($reward->user)): ?>
                                            <div class="d-flex align-items-center">
                                                <figure class="avatar mr-2">
                                                    <img src="<?php echo e($reward->user->getAvatar()); ?>" alt="<?php echo e($reward->user->full_name); ?>">
                                                </figure>
                                                <div class="media-body ml-1">
                                                    <div class="mt-0 mb-1 font-weight-bold"><?php echo e($reward->user->full_name); ?></div>

                                                    <?php if($reward->user->mobile): ?>
                                                        <div class="text-primary text-small font-600-bold"><?php echo e($reward->user->mobile); ?></div>
                                                    <?php elseif($reward->user->email): ?>
                                                        <div class="text-primary text-small font-600-bold"><?php echo e($reward->user->email); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($reward->total_points); ?></td>

                                    <td><?php echo e($reward->spent_points); ?></td>

                                    <td><?php echo e($reward->available_points); ?></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <?php echo e($rewards->links()); ?>

                </div>
            </section>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\rewards\history.blade.php ENDPATH**/ ?>