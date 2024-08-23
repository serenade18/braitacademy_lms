<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl('/cashback/rules')); ?>"><?php echo e(trans('update.rules')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($rule) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>


        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="<?php echo e(getAdminPanelUrl('/cashback/rules/'. (!empty($rule) ? $rule->id.'/update' : 'store'))); ?>">
                        <?php echo e(csrf_field()); ?>


                        
                        <section>
                            <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

                            <?php echo $__env->make('admin.cashback.rules.create.includes.basic_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        
                        <section class="mt-3">
                            <h2 class="section-title after-line"><?php echo e(trans('update.target_products')); ?></h2>

                            <?php echo $__env->make('admin.cashback.rules.create.includes.target_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        
                        <section class="mt-3">
                            <h2 class="section-title after-line"><?php echo e(trans('update.payment')); ?></h2>

                            <?php echo $__env->make('admin.cashback.rules.create.includes.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        <div class="mb-20">
                            <div class="form-group mt-30 mb-0 d-flex align-items-center">
                                <label class="" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                <div class="custom-control custom-switch ml-3">
                                    <input type="checkbox" name="enable" class="custom-control-input" id="statusSwitch" <?php echo e((!empty($rule) && $rule->enable) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="statusSwitch"></label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/js/admin/cashback_create_rule.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\create\index.blade.php ENDPATH**/ ?>