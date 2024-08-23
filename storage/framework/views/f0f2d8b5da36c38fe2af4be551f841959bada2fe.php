<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="text-danger"><?php echo e(trans('update.please_fix_the_error_fields_that_are_specified')); ?></div>
                            <?php endif; ?>

                            <form id="productForm" method="post" action="<?php echo e(getAdminPanelUrl()); ?>/store/products/<?php echo e(!empty($product) ? $product->id.'/update' : 'store'); ?>" class="webinar-form">
                                <?php echo e(csrf_field()); ?>


                                <?php echo $__env->make('admin.store.products.create.basic_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php if(!empty($product)): ?>
                                    <?php echo $__env->make('admin.store.products.create.extra_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('admin.store.products.create.image_and_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('admin.store.products.create.category_and_specification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <section class="mt-3">
                                        <h2 class="section-title after-line"><?php echo e(trans('public.message_to_reviewer')); ?></h2>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mt-15">
                                                    <textarea name="message_for_reviewer" rows="10" class="form-control"><?php echo e((!empty($product) and $product->message_for_reviewer) ? $product->message_for_reviewer : old('message_for_reviewer')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" id="productStatusInput" name="status" value="<?php echo e(\App\Models\Product::$draft); ?>">

                                        <button type="button" id="saveAndPublish" class="btn btn-success"><?php echo e(!empty($product) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue')); ?></button>

                                        <?php if(!empty($product)): ?>
                                            <button type="button" id="saveReject" class="btn btn-warning"><?php echo e(trans('public.reject')); ?></button>

                                            <?php echo $__env->make('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/store/products/'. $product->id .'/delete',
                                                    'btnText' => trans('public.delete'),
                                                    'hideDefaultClass' => true,
                                                    'btnClass' => 'btn btn-danger'
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('admin.store.products.create.modals.file_description_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.store.products.create.modals.file_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var saveSuccessLang = '<?php echo e(trans('webinars.success_store')); ?>';
        var requestFailedLang = '<?php echo e(trans('public.request_failed')); ?>';
        var maxFourImageCanSelect = '<?php echo e(trans('update.max_four_image_can_select')); ?>';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>

    <script src="/assets/default/js/admin/new_product.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\create.blade.php ENDPATH**/ ?>