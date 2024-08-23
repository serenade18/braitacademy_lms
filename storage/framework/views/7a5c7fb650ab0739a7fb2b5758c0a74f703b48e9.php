<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">

    <style>
        .certificate-template-container {
            width: <?php echo e(\App\Models\CertificateTemplate::$templateWidth); ?>px;
            height: <?php echo e(\App\Models\CertificateTemplate::$templateHeight); ?>px;
            position: relative;
            border: 2px solid #000;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .certificate-template-container .draggable-element {
            position: absolute !important;
            display: inline-block;
            white-space: pre-wrap;
        }

        .certificate-template-container .draggable-element[data-name="qr_code"] {
            border: 1px solid #0b2e13;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.new_template')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.new_template')); ?></div>
            </div>
        </div>


        <div class="row mt-3">
            
            <div class="col-12 col-lg-3">
                <form action="<?php echo e(getAdminPanelUrl("/certificates/templates/").(!empty($template) ? ($template->id.'/update') : 'store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>


                    <?php echo $__env->make('admin.certificates.create_template.template-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>

            
            <div class="col-12 col-lg-9">
                <?php echo $__env->make('admin.certificates.create_template.draggable-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <section class="card">
                    <div class="card-body">
                        <div class="section-title ml-0 mt-0 mb-3"><h4><?php echo e(trans('admin/main.hints')); ?></h4></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="media-body">
                                    <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.certificate_template_hint_title_1')); ?></div>
                                    <div class=" text-small font-600-bold"><?php echo e(trans('update.certificate_template_hint_description_1')); ?></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="media-body">
                                    <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.certificate_template_hint_title_2')); ?></div>
                                    <div class=" text-small font-600-bold"><?php echo e(trans('update.certificate_template_hint_description_2')); ?></div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="media-body">
                                    <div class="text-primary mt-0 mb-1 font-weight-bold"><?php echo e(trans('update.certificate_template_hint_title_3')); ?></div>
                                    <div class="text-small font-600-bold"><?php echo e(trans('update.certificate_template_hint_description_3')); ?></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

    <script src="/assets/default/js/admin/create_certificate_template.min.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\certificates\create_template\index.blade.php ENDPATH**/ ?>