<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.account_types')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.account_types')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/account_types" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div id="addAccountTypes" class="ml-3">
                                            <strong class="d-block mb-4"><?php echo e(trans('admin/main.add_account_types')); ?></strong>

                                            <div class="form-group main-row">
                                                <div class="d-flex align-items-stretch">
                                                    <input type="text" name="value[]"
                                                           class="form-control w-auto flex-grow-1"
                                                           placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                                    <button type="button" class="btn btn-success add-btn">+ <?php echo e(trans('admin/main.add')); ?></button>
                                                </div>
                                            </div>

                                            <?php if(!empty($value) and count($value)): ?>
                                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-group">
                                                        <div class="d-flex align-items-stretch">
                                                            <input type="text" name="value[]"
                                                                   class="form-control w-auto flex-grow-1"
                                                                   value="<?php echo e($item); ?>"
                                                                   placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                                            <button type="button" class="btn remove-btn btn-danger"><?php echo e(trans('admin/main.remove')); ?></button>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var removeLang = '<?php echo e(trans('admin/main.remove')); ?>';
    </script>

    <script src="/assets/default/js/admin/settings/account_types.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\account_types.blade.php ENDPATH**/ ?>