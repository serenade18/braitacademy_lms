<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo e($pageTitle ?? ''); ?> </title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"/>


    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">

    <style>
        <?php echo !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : ''; ?>

    </style>
</head>
<body>

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">

                    <div class="card card-primary">
                        <div class="row m-0">
                            <div class="col-12 col-md-12">
                                <div class="card-body">

                                    <div class="section-body">
                                        <div class="invoice">
                                            <div class="invoice-print">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="invoice-title">
                                                            <h2><?php echo e($generalSettings['site_name']); ?></h2>
                                                            <div class="invoice-number"><?php echo e(trans('public.item_id')); ?>: #<?php echo e($webinar->id); ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <address>
                                                                    <strong><?php echo e(trans('quiz.student')); ?>:</strong>
                                                                    <br>
                                                                    <?php echo e(!empty($sale->gift_recipient) ? $sale->gift_recipient : $sale->buyer->full_name); ?>

                                                                    <br>
                                                                </address>

                                                                <address>
                                                                    <strong><?php echo e(trans('home.organization')); ?>:</strong><br>
                                                                    <?php if($webinar->tracher_id != $webinar->creator_id): ?>
                                                                        <?php echo e($webinar->creator->full_name); ?>

                                                                    <?php else: ?>
                                                                        -
                                                                    <?php endif; ?>
                                                                    <br>
                                                                </address>
                                                            </div>
                                                            <div class="col-md-6 text-md-right">
                                                                <address>
                                                                    <strong><?php echo e(trans('home.platform_address')); ?>:</strong><br>
                                                                    <?php echo nl2br(getContactPageSettings('address')); ?>

                                                                </address>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <address>
                                                                    <strong><?php echo e(trans('home.teachers')); ?>:</strong><br>
                                                                    <?php echo e($webinar->teacher->full_name); ?> <br>

                                                                    <?php if(!empty($webinar->webinarPartnerTeacher) and count($webinar->webinarPartnerTeacher)): ?>
                                                                        <?php $__currentLoopData = $webinar->webinarPartnerTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php echo e($partner->teacher->full_name); ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </address>
                                                            </div>

                                                            <div class="col-md-6 text-md-right">
                                                                <address>
                                                                    <strong><?php echo e(trans('panel.purchase_date')); ?>:</strong><br>
                                                                    <?php echo e(dateTimeFormat($sale->created_at,'j M Y | H:i')); ?><br><br>
                                                                </address>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="section-title"><?php echo e(trans('home.order_summary')); ?></div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover table-md">
                                                                <tr>
                                                                    <th data-width="40">#</th>
                                                                    <th><?php echo e(trans('cart.item')); ?></th>
                                                                    <th class="text-center"><?php echo e(trans('admin/main.type')); ?></th>
                                                                    <th class="text-center"><?php echo e(trans('public.price')); ?></th>
                                                                    <th class="text-center"><?php echo e(trans('panel.discount')); ?></th>
                                                                    <th class="text-right"><?php echo e(trans('cart.total')); ?></th>
                                                                </tr>

                                                                <tr>
                                                                    <td><?php echo e($webinar->id); ?></td>
                                                                    <td><?php echo e($webinar->title); ?></td>
                                                                    <td class="text-center"><?php echo e(trans('webinars.'.$webinar->type)); ?></td>
                                                                    <td class="text-center">
                                                                        <?php if(!empty($sale->amount)): ?>
                                                                            <?php echo e(handlePrice($sale->amount)); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e(trans('public.free')); ?>

                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php if(!empty($sale->discount)): ?>
                                                                            <?php echo e(handlePrice($sale->discount)); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <?php if(!empty($sale->total_amount)): ?>
                                                                            <?php echo e(handlePrice($sale->total_amount)); ?>

                                                                        <?php else: ?>
                                                                            0
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="row mt-4">

                                                            <div class="col-lg-12 text-right">
                                                                <div class="invoice-detail-item">
                                                                    <div class="invoice-detail-name"><?php echo e(trans('cart.sub_total')); ?></div>
                                                                    <div class="invoice-detail-value"><?php echo e(handlePrice($sale->amount)); ?></div>
                                                                </div>
                                                                <div class="invoice-detail-item">
                                                                    <div class="invoice-detail-name"><?php echo e(trans('cart.tax')); ?> (<?php echo e(getFinancialSettings('tax')); ?>%)</div>
                                                                    <div class="invoice-detail-value">
                                                                        <?php if(!empty($sale->tax)): ?>
                                                                            <?php echo e(handlePrice($sale->tax)); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invoice-detail-item">
                                                                    <div class="invoice-detail-name"><?php echo e(trans('public.discount')); ?></div>
                                                                    <div class="invoice-detail-value">
                                                                        <?php if(!empty($sale->discount)): ?>
                                                                            <?php echo e(handlePrice($sale->discount)); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <hr class="mt-2 mb-2">
                                                                <div class="invoice-detail-item">
                                                                    <div class="invoice-detail-name"><?php echo e(trans('cart.total')); ?></div>
                                                                    <div class="invoice-detail-value invoice-detail-value-lg">
                                                                        <?php if(!empty($sale->total_amount)): ?>
                                                                            <?php echo e(handlePrice($sale->total_amount)); ?>

                                                                        <?php else: ?>
                                                                            -
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="text-md-right">

                                                <button type="button" onclick="window.print()" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                                            </div>
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
</div>
</body>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\invoice.blade.php ENDPATH**/ ?>