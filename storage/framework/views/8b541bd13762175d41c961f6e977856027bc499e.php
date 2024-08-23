<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <h2 class="section-title"><?php echo e(trans('update.products_statistics')); ?></h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($physicalProducts); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.physical_products')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e($virtualProducts); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.virtual_products')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(!empty($physicalSales) ? handlePrice($physicalSales) : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.physical_sales')); ?></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/download-sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"><?php echo e(!empty($virtualSales) ? handlePrice($virtualSales) : 0); ?></strong>
                        <span class="font-16 text-gray font-weight-500"><?php echo e(trans('update.virtual_sales')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title"><?php echo e(trans('update.my_products')); ?></h2>
        </div>

        <?php if(!empty($products) and !$products->isEmpty()): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $hasDiscount = $product->getActiveDiscount();
                ?>

                <div class="row mt-30">
                    <div class="col-12">
                        <div class="webinar-card webinar-list panel-product-card d-flex">
                            <div class="image-box">
                                <img src="<?php echo e($product->thumbnail); ?>" class="img-cover" alt="">

                                <div class="badges-lists">
                                    <?php if($product->ordering and !empty($product->inventory) and $product->getAvailability() < 1): ?>
                                        <span class="badge badge-danger"><?php echo e(trans('update.out_of_stock')); ?></span>
                                    <?php elseif(!$product->ordering and $product->getActiveDiscount()): ?>
                                        <span class="badge badge-info"><?php echo e(trans('update.ordering_off')); ?></span>
                                    <?php elseif($hasDiscount): ?>
                                        <span class="badge badge-danger"><?php echo e(trans('public.offer',['off' => $hasDiscount->percent])); ?></span>
                                    <?php else: ?>
                                        <?php switch($product->status):
                                            case (\App\Models\Product::$active): ?>
                                                <span class="badge badge-primary"><?php echo e(trans('public.active')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\Product::$draft): ?>
                                                <span class="badge badge-danger"><?php echo e(trans('public.draft')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\Product::$pending): ?>
                                                <span class="badge badge-warning"><?php echo e(trans('public.waiting')); ?></span>
                                                <?php break; ?>
                                            <?php case (\App\Models\Product::$inactive): ?>
                                                <span class="badge badge-danger"><?php echo e(trans('public.rejected')); ?></span>
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="webinar-card-body w-100 d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo e($product->getUrl()); ?>" target="_blank">
                                        <h3 class="font-16 text-dark-blue font-weight-bold"><?php echo e($product->title); ?></h3>
                                    </a>

                                    <?php if($authUser->id == $product->creator_id): ?>
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu ">
                                                <a href="/panel/store/products/<?php echo e($product->id); ?>/edit" class="webinar-actions d-block mt-10"><?php echo e(trans('public.edit')); ?></a>

                                                <?php if($product->creator_id == $authUser->id): ?>
                                                    <?php echo $__env->make('web.default.panel.includes.content_delete_btn', [
                                                        'deleteContentUrl' => "/panel/store/products/{$product->id}/delete",
                                                        'deleteContentClassName' => 'webinar-actions d-block mt-10 text-danger',
                                                        'deleteContentItem' => $product,
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $product->getRate()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="webinar-price-box mt-15">
                                    <?php if($product->price > 0): ?>
                                        <?php if($product->getPriceWithActiveDiscountPrice() < $product->price): ?>
                                            <span class="real"><?php echo e(handlePrice($product->getPriceWithActiveDiscountPrice(), true, true, false, null, true, 'store')); ?></span>
                                            <span class="off ml-10"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                                        <?php else: ?>
                                            <span class="real"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="real"><?php echo e(trans('public.free')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">
                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.item_id')); ?>:</span>
                                        <span class="stat-value"><?php echo e($product->id); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.category')); ?>:</span>
                                        <span class="stat-value"><?php echo e(!empty($product->category_id) ? $product->category->title : ''); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('public.type')); ?>:</span>
                                        <span class="stat-value"><?php echo e(trans('update.product_type_'.$product->type)); ?></span>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('update.availability')); ?>:</span>
                                        <?php if($product->unlimited_inventory): ?>
                                            <?php echo e(trans('update.unlimited')); ?>

                                        <?php else: ?>
                                            <span class="stat-value"><?php echo e($product->getAvailability()); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                        <span class="stat-title"><?php echo e(trans('panel.sales')); ?>:</span>
                                        <?php if(!empty($product->sales()) and count($product->sales())): ?>
                                            <span class="stat-value"><?php echo e($product->salesCount()); ?> (<?php echo e(handlePrice($product->sales()->sum('total_amount'))); ?>)</span>
                                        <?php else: ?>
                                            <span class="stat-value">0</span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($product->isPhysical()): ?>
                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('update.shipping_cost')); ?>:</span>
                                            <span class="stat-value"><?php echo e(!empty($product->delivery_fee) ? handlePrice($product->delivery_fee) : 0); ?></span>
                                        </div>

                                        <div class="d-flex align-items-start flex-column mt-20 mr-15">
                                            <span class="stat-title"><?php echo e(trans('update.waiting_orders')); ?>:</span>
                                            <span class="stat-value"><?php echo e($product->productOrders->whereIn('status',[\App\Models\ProductOrder::$waitingDelivery,\App\Models\ProductOrder::$shipped])->count()); ?></span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="my-30">
                <?php echo e($products->appends(request()->input())->links('vendor.pagination.panel')); ?>

            </div>

        <?php else: ?>
            <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                'file_name' => 'webinar.png',
                'title' => trans('panel.you_not_have_any_webinar'),
                'hint' =>  trans('panel.no_result_hint') ,
                'btn' => ['url' => '/panel/webinars/new','text' => trans('panel.create_a_webinar') ]
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\store\products\lists.blade.php ENDPATH**/ ?>