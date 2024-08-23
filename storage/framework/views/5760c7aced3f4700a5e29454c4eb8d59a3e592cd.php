<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.404_page_setting')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item">404</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(getAdminPanelUrl()); ?>/additional_page/404" method="post">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.error_404_image')); ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text admin-file-manager" data-input="error_image" data-preview="holder">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="value[error_image]" id="error_image" value="<?php echo e((!empty($value) and !empty($value['error_image'])) ? $value['error_image'] : ''); ?>" class="form-control"/>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.error_404_title')); ?></label>
                                            <input type="text" name="value[error_title]" value="<?php echo e((!empty($value) and !empty($value['error_title'])) ? $value['error_title'] : ''); ?>" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="input-label"><?php echo e(trans('admin/main.error_404_description')); ?></label>
                                            <textarea name="value[error_description]" rows="7" class="form-control"><?php echo e((!empty($value) and !empty($value['error_description'])) ? $value['error_description'] : ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\additional_pages\404.blade.php ENDPATH**/ ?>