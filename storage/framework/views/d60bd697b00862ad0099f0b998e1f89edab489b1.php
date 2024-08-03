<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(trans('admin/main.sales')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.sales')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_success_orders')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($successOrders['count']); ?>

                            </div>
                            <div class="text-primary font-weight-bold">
                                <?php echo e(handlePrice($successOrders['amount'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-times-circle"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_canceled_orders')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($canceledOrders['count']); ?>

                            </div>
                            <div class="text-success font-weight-bold">
                                <?php echo e(handlePrice($canceledOrders['amount'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-hourglass-half"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_waiting_orders')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($waitingOrders['count']); ?>

                            </div>
                            <div class="text-danger font-weight-bold">
                                <?php echo e(handlePrice($waitingOrders['amount'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-shopping-basket"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(trans('update.total_orders')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalOrders['count']); ?>

                            </div>
                            <div class="text-danger font-weight-bold">
                                <?php echo e(handlePrice($totalOrders['amount'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.search')); ?></label>
                                    <input type="text" class="form-control" name="item_title" value="<?php echo e(request()->get('item_title')); ?>">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.start_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="<?php echo e(request()->get('from')); ?>" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="<?php echo e(request()->get('to')); ?>" placeholder="End Date">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.status')); ?></label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value=""><?php echo e(trans('admin/main.all_status')); ?></option>
                                        <?php $__currentLoopData = \App\Models\ProductOrder::$status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $str): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($str != \App\Models\ProductOrder::$pending): ?>
                                                <option value="<?php echo e($str); ?>" <?php if(request()->get('status') == $str): ?> selected <?php endif; ?>><?php echo e(trans('update.product_order_status_'.$str)); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.seller')); ?></label>
                                    <select name="seller_ids[]" multiple="multiple" data-search-option="just_organization_and_teacher_role" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('update.search_seller')); ?>">

                                        <?php if(!empty($sellers) and $sellers->count() > 0): ?>
                                            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($seller->id); ?>" selected><?php echo e($seller->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('update.customer')); ?></label>
                                    <select name="customer_ids[]" multiple="multiple" data-search-option="just_student_role" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('public.search_user')); ?>">

                                        <?php if(!empty($customers) and $customers->count() > 0): ?>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($customer->id); ?>" selected><?php echo e($customer->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="<?php echo e(trans('admin/main.show_results')); ?>">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_orders_export')): ?>
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/store/orders/export?<?php echo e(!empty($inHouseOrders) ? 'in-house-orders=true&' : ''); ?><?php echo e(http_build_query(request()->all())); ?>" class="btn btn-primary"><?php echo e(trans('admin/main.export_xls')); ?></a>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left"><?php echo e(trans('update.customer')); ?></th>
                                        <th class="text-left"><?php echo e(trans('admin/main.seller')); ?></th>
                                        <th><?php echo e(trans('admin/main.type')); ?></th>
                                        <th><?php echo e(trans('update.quantity')); ?></th>
                                        <th><?php echo e(trans('admin/main.paid_amount')); ?></th>
                                        <th><?php echo e(trans('admin/main.discount')); ?></th>
                                        <th><?php echo e(trans('admin/main.tax')); ?></th>
                                        <th><?php echo e(trans('admin/main.date')); ?></th>
                                        <th><?php echo e(trans('admin/main.status')); ?></th>
                                        <th width="120"><?php echo e(trans('admin/main.actions')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>

                                            <td class="text-left">
                                                <?php if(!empty($order->buyer)): ?>
                                                    <?php echo e($order->buyer->full_name); ?>

                                                    <div class="text-primary text-small font-600-bold">ID : <?php echo e($order->buyer->id); ?></div>
                                                <?php elseif(!empty($order->gift) and !empty($order->gift)): ?>
                                                    <?php echo e($order->gift->user->full_name); ?>

                                                    <div class="text-primary text-small font-600-bold">ID : <?php echo e($order->gift->user_id); ?></div>
                                                    <span class="d-block mt-1 text-muted font-12"><?php echo trans('update.a_gift_for_name_on_date',['name' => $order->gift->name, 'date' => (!empty($order->gift->date) ? dateTimeFormat($order->gift->date, 'j M Y H:i') : trans('update.instantly'))]); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-left">
                                                <?php echo e(!empty($order->seller) ? $order->seller->full_name : ''); ?>

                                                <div class="text-primary text-small font-600-bold">ID : <?php echo e(!empty($order->seller) ? $order->seller->id : ''); ?></div>
                                            </td>

                                            <td>
                                                <?php if(!empty($order->product)): ?>
                                                    <span><?php echo e(trans('update.product_type_'.$order->product->type)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <span><?php echo e($order->quantity); ?></span>
                                            </td>

                                            <td>
                                                <?php if(!empty($order->sale)): ?>
                                                    <span class=""><?php echo e(handlePrice($order->sale->total_amount)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(!empty($order->sale)): ?>
                                                    <span class=""><?php echo e(handlePrice($order->sale->discount)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(!empty($order->sale)): ?>
                                                    <span class=""><?php echo e(handlePrice($order->sale->tax)); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e(dateTimeFormat($order->created_at, 'j F Y H:i')); ?></td>

                                            <td>
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

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_orders_invoice')): ?>
                                                    <?php if(!empty($order->product)): ?>
                                                        <a href="<?php echo e(getAdminPanelUrl()); ?>/store/orders/<?php echo e($order->id); ?>/invoice" target="_blank" title="<?php echo e(trans('admin/main.invoice')); ?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_orders_refund')): ?>
                                                    <?php echo $__env->make('admin.includes.delete_button',[
                                                            'url' => getAdminPanelUrl().'/store/orders/'. $order->id .'/refund',
                                                            'tooltip' => trans('admin/main.refund'),
                                                            'btnIcon' => 'fa-times-circle'
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>

                                                <?php if($order->status == \App\Models\ProductOrder::$waitingDelivery): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_store_products_orders_tracking_code')): ?>
                                                        <button type="button"
                                                                data-sale-id="<?php echo e($order->sale_id); ?>"
                                                                data-product-order-id="<?php echo e($order->id); ?>"
                                                                data-toggle="tooltip" title="<?php echo e(trans('update.enter_tracking_code')); ?>"
                                                                class="js-enter-tracking-code btn-transparent text-primary">
                                                            <i class="fa fa-map"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <?php echo e($orders->appends(request()->input())->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var enterTrackingCodeModalTitleLang = '<?php echo e(trans('update.enter_tracking_code')); ?>';
        var trackingCodeLang = '<?php echo e(trans('update.tracking_code')); ?>';
        var addressLang = '<?php echo e(trans('update.address')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var trackingCodeSaveSuccessLang = '<?php echo e(trans('update.tracking_code_success_save')); ?>';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/js/admin/store/orders.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/store/orders/lists.blade.php ENDPATH**/ ?>