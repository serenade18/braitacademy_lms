<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('update.purchases_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/physical_product3.png" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5 text-dark-blue"><?php echo e($totalOrders); ?></strong>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.total_orders')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/physical_product2.png" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5 text-dark-blue"><?php echo e($pendingOrders); ?></strong>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.pending_orders')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/physical_product1.png" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5 text-dark-blue"><?php echo e($canceledOrders); ?></strong>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.canceled_orders')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/33.png" width="64" height="64" alt="">
                        <strong class="font-30 font-weight-bold mt-5 text-dark-blue"><?php echo e(!empty($totalPurchase) ? handlePrice($totalPurchase) : 0); ?></strong>
                        <span class="font-16 font-weight-500 text-gray"><?php echo e(trans('update.total_purchase')); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title"><?php echo e(trans('update.purchases_report')); ?></h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="" method="get" class="row">
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.from')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" class="form-control <?php if(!empty(request()->get('from'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>"
                                           aria-describedby="dateInputGroupPrepend"
                                           value="<?php echo e(request()->get('from',null)); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.to')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="dateInputGroupPrepend">
                                            <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="to" autocomplete="off" class="form-control <?php if(!empty(request()->get('to'))): ?> datepicker <?php else: ?> datefilter <?php endif; ?>"
                                           aria-describedby="dateInputGroupPrepend"
                                           value="<?php echo e(request()->get('to',null)); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('update.seller')); ?></label>

                                <select name="seller_id" class="form-control select2" data-allow-clear="false">
                                    <option value="all"><?php echo e(trans('public.all')); ?></option>

                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($seller->id); ?>" <?php if(request()->get('seller_id',null) == $seller->id): ?> selected <?php endif; ?>><?php echo e($seller->full_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.type')); ?></label>
                                <select class="form-control" id="type" name="type">
                                    <option value="all"
                                            <?php if(request()->get('type',null) == 'all'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.all')); ?></option>

                                    <?php $__currentLoopData = \App\Models\Product::$productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($productType); ?>"
                                                <?php if(request()->get('type',null) == $productType): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.product_type_'.$productType)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.status')); ?></label>
                                <select class="form-control" id="status" name="status">
                                    <option value="all"
                                            <?php if(request()->get('status',null) == 'all'): ?> selected="selected" <?php endif; ?>><?php echo e(trans('public.all')); ?></option>

                                    <?php $__currentLoopData = \App\Models\ProductOrder::$status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($orderStatus != 'pending'): ?>
                                            <option value="<?php echo e($orderStatus); ?>"
                                                    <?php if(request()->get('status',null) == $orderStatus): ?> selected="selected" <?php endif; ?>><?php echo e(trans('update.product_order_status_'.$orderStatus)); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2"><?php echo e(trans('public.show_results')); ?></button>
                </div>
            </form>
        </div>
    </section>

    <?php if(!empty($orders) and !$orders->isEmpty()): ?>
        <section class="mt-35">
            <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
                <h2 class="section-title"><?php echo e(trans('update.purchases_history')); ?></h2>
            </div>

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table text-center custom-table">
                                <thead>
                                <tr>
                                    <th><?php echo e(trans('update.seller')); ?></th>
                                    <th class=" text-left"><?php echo e(trans('update.order_id')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.price')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.discount')); ?></th>
                                    <th class="text-center"><?php echo e(trans('cart.tax')); ?></th>
                                    <th class="text-center"><?php echo e(trans('update.delivery_fee')); ?></th>
                                    <th class="text-center"><?php echo e(trans('financial.total_amount')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.type')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.status')); ?></th>
                                    <th class="text-center"><?php echo e(trans('public.date')); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <div class="user-inline-avatar d-flex align-items-center">
                                                <div class="avatar bg-gray200">
                                                    <img src="<?php echo e(!empty($order->seller) ? $order->seller->getAvatar() : ''); ?>" class="img-cover" alt="">
                                                </div>
                                                <div class=" ml-5">
                                                    <span class="d-block"><?php echo e(!empty($order->seller) ? $order->seller->full_name : ''); ?></span>
                                                    <span class="mt-5 font-12 text-gray d-block"><?php echo e(!empty($order->seller) ? $order->seller->email : ''); ?></span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class=" text-left">
                                            <span class="d-block font-weight-500 text-dark-blue font-16"><?php echo e($order->id); ?></span>
                                            <span class="d-block font-12 text-gray"><?php echo e($order->quantity); ?> <?php echo e(trans('update.product')); ?></span>
                                        </td>

                                        <td class="align-middle">
                                            <span><?php echo e(handlePrice($order->sale->amount)); ?></span>
                                        </td>

                                        <td class="align-middle">
                                            <?php if(!empty($order->sale->discount) and (int)$order->sale->discount > 0): ?>
                                                <?php echo e(handlePrice($order->sale->discount ?? 0)); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php if(!empty($order->sale->tax)): ?>
                                                <?php echo e(handlePrice($order->sale->tax)); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php if(!empty($order->sale->product_delivery_fee)): ?>
                                                <?php echo e(handlePrice($order->sale->product_delivery_fee)); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>

                                        <td class="align-middle">
                                            <span><?php echo e(handlePrice($order->sale->total_amount)); ?></span>
                                        </td>

                                        <td class="align-middle">
                                            <?php if(!empty($order) and !empty($order->product)): ?>
                                                <span><?php echo e(trans('update.product_type_'.$order->product->type)); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php if($order->status == \App\Models\ProductOrder::$waitingDelivery): ?>
                                                <span class="text-warning"><?php echo e(trans('update.product_order_status_waiting_delivery')); ?></span>
                                            <?php elseif($order->status == \App\Models\ProductOrder::$success): ?>
                                                <span class="text-dark-blue"><?php echo e(trans('update.product_order_status_success')); ?></span>
                                            <?php elseif($order->status == \App\Models\ProductOrder::$shipped): ?>
                                                <span class="text-warning"><?php echo e(trans('update.product_order_status_shipped')); ?></span>
                                            <?php elseif($order->status == \App\Models\ProductOrder::$canceled): ?>
                                                <span class="text-danger"><?php echo e(trans('update.product_order_status_canceled')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <span><?php echo e(dateTimeFormat($order->created_at, 'j M Y H:i')); ?></span>
                                        </td>

                                        <td class="text-center align-middle">
                                            <?php if(!empty($order) and $order->status != \App\Models\ProductOrder::$canceled): ?>
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="more-vertical" height="20"></i>
                                                    </button>
                                                    <div class="dropdown-menu font-weight-normal">

                                                        <?php if(!empty($order->product) and $order->product->isVirtual() and !empty($order->product->files) and count($order->product->files)): ?>
                                                            <a href="/panel/store/products/<?php echo e($order->product->id); ?>/getFilesModal" class="js-show-product-files webinar-actions d-block mt-10"><?php echo e(trans('home.download')); ?></a>
                                                        <?php endif; ?>

                                                        <a href="/panel/store/purchases/<?php echo e($order->sale_id); ?>/productOrder/<?php echo e($order->id); ?>/invoice" target="_blank" class="webinar-actions d-block mt-10"><?php echo e(trans('public.invoice')); ?></a>

                                                        <?php if(!empty($order->product) and $order->status == \App\Models\ProductOrder::$success): ?>
                                                            <a href="<?php echo e($order->product->getUrl()); ?>" class="webinar-actions d-block mt-10" target="_blank"><?php echo e(trans('public.feedback')); ?></a>
                                                        <?php endif; ?>

                                                        <?php if($order->status == \App\Models\ProductOrder::$shipped): ?>
                                                            <button type="button" data-sale-id="<?php echo e($order->sale_id); ?>" data-product-order-id="<?php echo e($order->id); ?>" class="js-view-tracking-code webinar-actions btn-transparent d-block mt-10"><?php echo e(trans('update.view_tracking_code')); ?></button>

                                                            <button type="button" data-sale-id="<?php echo e($order->sale_id); ?>" data-product-order-id="<?php echo e($order->id); ?>" class="js-got-the-parcel webinar-actions btn-transparent d-block mt-10"><?php echo e(trans('update.i_got_the_parcel')); ?></button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-30">
                <?php echo e($orders->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>

        </section>
    <?php else: ?>
        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
              'file_name' => 'sales.png',
              'title' => trans('update.product_purchases_no_result'),
              'hint' => nl2br(trans('update.product_purchases_no_result_hint')),
          ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var viewTrackingCodeModalTitleLang = '<?php echo e(trans('update.view_tracking_code')); ?>';
        var trackingCodeLang = '<?php echo e(trans('update.tracking_code')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var confirmLang = '<?php echo e(trans('update.confirm')); ?>';
        var gotTheParcelLang = '<?php echo e(trans('update.i_got_the_parcel')); ?>';
        var gotTheParcelConfirmTextLang = '<?php echo e(trans('update.i_got_the_parcel_confirm')); ?>';
        var gotTheParcelSaveSuccessLang = '<?php echo e(trans('update.i_got_the_parcel_success_save')); ?>';
        var gotTheParcelSaveErrorLang = '<?php echo e(trans('update.i_got_the_parcel_error_save')); ?>';
        var shippingTrackingUrlLang = '<?php echo e(trans('update.track_shipping')); ?>';
        var addressLang = '<?php echo e(trans('update.address')); ?>';
        var filesLang = '<?php echo e(trans('public.files')); ?>';
    </script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/js/panel/store/my-purchase.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate() .'.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\store\my-purchases.blade.php ENDPATH**/ ?>