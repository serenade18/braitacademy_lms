<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.custom_css_js')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a></div>
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>/settings"><?php echo e(trans('admin/main.settings')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.custom_css_js')); ?></div>
            </div>
        </div>

        <?php
            $itemValue = (!empty($settings) and !empty($settings['custom_css_js'])) ? $settings['custom_css_js']->value : '';

            if (!empty($itemValue) and !is_array($itemValue)) {
                $itemValue = json_decode($itemValue, true);
            }
        ?>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="css-tab" data-toggle="tab" href="#css" role="tab" aria-controls="css" aria-selected="true"><?php echo e(trans('admin/main.css')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="js-tab" data-toggle="tab" href="#js" role="tab" aria-controls="js" aria-selected="true"><?php echo e(trans('admin/main.js')); ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane mt-3 fade active show" id="css" role="tabpanel" aria-labelledby="css-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/custom_css_js/store" method="post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <textarea name="value[css]" class="form-control" rows="10"><?php echo e((!empty($itemValue) and !empty($itemValue['css'])) ? $itemValue['css'] : ''); ?></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane mt-3 fade" id="js" role="tabpanel" aria-labelledby="js-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/custom_css_js/store" method="post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <textarea name="value[js]" class="form-control" rows="10"><?php echo e((!empty($itemValue) and !empty($itemValue['js'])) ? $itemValue['js'] : ''); ?></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\customization.blade.php ENDPATH**/ ?>