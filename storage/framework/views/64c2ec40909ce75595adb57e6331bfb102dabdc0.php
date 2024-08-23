<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl('/forms')); ?>"><?php echo e(trans('update.forms')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($form) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>


        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="<?php echo e(getAdminPanelUrl('/forms/'. (!empty($form) ? $form->id.'/update' : 'store'))); ?>">
                        <?php echo e(csrf_field()); ?>


                        
                        <section>
                            <h2 class="section-title after-line"><?php echo e(trans('public.basic_information')); ?></h2>

                            <?php echo $__env->make('admin.forms.create.includes.basic_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        
                        <section class="mt-3">
                            <h2 class="section-title after-line"><?php echo e(trans('update.welcome_message')); ?></h2>

                            <?php echo $__env->make('admin.forms.create.includes.welcome_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        
                        <section class="mt-3">
                            <h2 class="section-title after-line"><?php echo e(trans('update.tank_you_message')); ?></h2>

                            <?php echo $__env->make('admin.forms.create.includes.tank_you_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>

                        
                        <section class="mt-3">
                            <h2 class="section-title after-line"><?php echo e(trans('update.form_fields')); ?></h2>

                            <?php if(!empty($form)): ?>
                                <?php echo $__env->make('admin.forms.create.includes.form_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="alert alert-warning"><?php echo e(trans('update.after_saving_the_form_you_can_create_the_fields')); ?></div>
                            <?php endif; ?>
                        </section>

                        <?php if(!empty($form)): ?>
                            <div class="mb-20">
                                <div class="form-group mt-30 mb-0 d-flex align-items-center">
                                    <label class="" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                                    <div class="custom-control custom-switch ml-3">
                                        <input type="checkbox" name="enable" class="custom-control-input" id="statusSwitch" <?php echo e(($form->enable) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="statusSwitch"></label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var fieldSaveSuccessLang = '<?php echo e(trans('update.form_field_data_stored_successfully')); ?>'
        var chooseTitleLang = '<?php echo e(trans('admin/main.choose_title')); ?>'
    </script>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/create_forms.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\forms\create\index.blade.php ENDPATH**/ ?>