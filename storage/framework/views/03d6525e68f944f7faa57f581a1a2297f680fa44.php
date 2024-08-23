<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    
    <?php if(!empty($cashbackRules) and count($cashbackRules)): ?>
        <div class="container position-relative mt-30">
            <?php echo $__env->make('web.default.includes.cashback_alert',['itemPrice' => $product->price], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>

    <div class="container product-show-special-offer position-relative mt-30">
        <?php if(!empty($activeSpecialOffer)): ?>
            <?php echo $__env->make('web.default.course.special_offer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <div class="container <?php echo e(!empty($activeSpecialOffer) ? 'mt-50' : 'mt-30'); ?>">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="lazyImage product-show-image-card position-relative">
                    <img src="<?php echo e($product->thumbnail); ?>" alt="<?php echo e($product->title); ?>" class="main-s-image img-cover rounded-lg" loading="lazy">

                    <?php if(!empty($product->video_demo)): ?>
                        <button id="productDemoVideoBtn"
                                data-video-path="<?php echo e(url($product->video_demo)); ?>"
                                class="product-video-demo-icon cursor-pointer btn-transparent d-flex align-items-center justify-content-center">
                            <img src="/assets/default/img/icons/play-bold.svg" alt="play icon" class=""/>
                        </button>
                    <?php endif; ?>
                </div>


                <div class="product-show-thumbnail-card d-flex align-items-center mt-20">
                    <div class="thumbnail-card is-first-thumbnail-card cursor-pointer position-relative">
                        <img src="<?php echo e($product->thumbnail); ?>" alt="<?php echo e($product->title); ?>" class="img-cover rounded-sm">

                        <?php if(!empty($product->video_demo)): ?>
                            <span class="product-video-demo-thumb-icon d-flex align-items-center justify-content-center">
                                <img src="/assets/default/img/icons/play-bold.svg" alt="play icon" class=""/>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if(!empty($product->images) and count($product->images)): ?>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="thumbnail-card cursor-pointer ml-20 ml-lg-35">
                                <img src="<?php echo e($image->path); ?>" alt="<?php echo e($product->title); ?>" class="img-cover rounded-sm">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <form action="/cart/store" method="post" id="productAddToCartForm">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="item_id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="item_name" value="product_id">

                    <div class="product-show-info-card bg-info p-15 p-md-25 rounded-lg">
                        <h1 class="font-30">
                            <?php echo e(clean($product->title, 't')); ?>

                        </h1>

                        <span class="d-block font-16 mt-10"><?php echo e(trans('public.in')); ?> <a href="<?php echo e($product->category->getUrl()); ?>" target="_blank" class="font-weight-500 text-decoration-underline"><?php echo e($product->category->title); ?></a></span>

                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mt-20">
                            <div class="d-flex align-items-center">
                                <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $product->getRate(),'className' => 'mt-0'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <span class="ml-10 font-14">(<?php echo e($product->reviews->pluck('creator_id')->count()); ?> <?php echo e(trans('product.reviews')); ?>)</span>
                            </div>

                            <div class="d-flex align-items-center mt-15 mt-md-0">
                                <span class="mr-5"><?php echo e(trans('update.availability')); ?></span>
                                <?php if(($product->getAvailability() > 0)): ?>
                                    <?php if(!empty($product->inventory) and !empty($product->inventory_warning) and $product->inventory_warning > $product->getAvailability()): ?>
                                        <span class="product-availability-badge badge-warning"><?php echo e(trans('update.only_n_left',['count' => $product->getAvailability()])); ?></span>
                                    <?php else: ?>
                                        <span class="product-availability-badge badge-primary"><?php echo e(trans('update.in_stock')); ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="product-availability-badge badge-danger"><?php echo e(trans('update.out_of_stock')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if(!empty($selectableSpecifications) and count($selectableSpecifications)): ?>
                            <?php $__currentLoopData = $selectableSpecifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectableSpecification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-show-selectable-specification mt-10">
                                    <span class="font-14 font-weight-bold text-dark"><?php echo e($selectableSpecification->specification->title); ?></span>

                                    <div class="d-flex align-items-center flex-wrap">
                                        <?php $__currentLoopData = $selectableSpecification->selectedMultiValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specificationValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($specificationValue->multiValue)): ?>
                                                <div class="selectable-specification-item mr-5 mt-5">
                                                    <input type="radio" name="specifications[<?php echo e($selectableSpecification->specification->createName()); ?>]" value="<?php echo e($specificationValue->multiValue->createName()); ?>" id="<?php echo e($specificationValue->multiValue->createName()); ?>" class="" <?php echo e(($loop->iteration == 1) ? 'checked' : ''); ?>>
                                                    <label class="font-12 cursor-pointer px-10 py-5" for="<?php echo e($specificationValue->multiValue->createName()); ?>"><?php echo e($specificationValue->multiValue->title); ?></label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="product-show-price-box mt-15">
                            <?php if(!empty($product->price) and $product->price > 0): ?>
                                <?php if($product->getPriceWithActiveDiscountPrice() < $product->price): ?>
                                    <span class="real"><?php echo e(handlePrice($product->getPriceWithActiveDiscountPrice(), true, true, false, null, true, 'store')); ?></span>
                                    <span class="off ml-10"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                                <?php else: ?>
                                    <span class="real"><?php echo e(handlePrice($product->price, true, true, false, null, true, 'store')); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="real"><?php echo e(trans('public.free')); ?></span>
                            <?php endif; ?>

                            <?php if($product->isPhysical()): ?>
                                <?php if(!empty($product->delivery_fee) and $product->delivery_fee > 0): ?>
                                    <span class="shipping-price d-block mt-5">+ <?php echo e(handlePrice($product->delivery_fee)); ?> <?php echo e(trans('update.shipping')); ?></span>
                                <?php else: ?>
                                    <span class="text-warning d-block font-14 font-weight-500 mt-5"><?php echo e(trans('update.free_shipping')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="product-show-cart-actions d-flex align-items-center flex-wrap ">
                            <div class="cart-quantity d-flex align-items-center mt-20 mr-15">
                                <input type="hidden" id="productAvailabilityCount" value="<?php echo e($product->getAvailability()); ?>">
                                <button type="button" class="minus d-flex align-items-center justify-content-center" <?php echo e(($product->getAvailability() < 1) ? 'disabled' : ''); ?>>
                                    <i data-feather="minus" class="" width="20" height="20"></i>
                                </button>

                                <input type="number" name="quantity" value="1" <?php echo e(($product->getAvailability() < 1) ? 'disabled' : ''); ?>>

                                <button type="button" class="plus d-flex align-items-center justify-content-center" <?php echo e(($product->getAvailability() < 1) ? 'disabled' : ''); ?>>
                                    <i data-feather="plus" class="" width="20" height="20"></i>
                                </button>
                            </div>

                            <?php
                                $productAvailability = $product->getAvailability();
                            ?>

                            <div class="d-flex flex-column flex-md-row flex-md-wrap align-items-md-center w-100">
                                <button type="submit" class="btn mt-20 <?php echo e(($productAvailability > 0) ? 'btn-primary' : 'btn-dark'); ?>" <?php echo e(($productAvailability < 1) ? 'disabled' : ''); ?>>
                                    <i data-feather="shopping-cart" class="mr-5" width="20" height="20"></i>
                                    <?php echo e(($productAvailability > 0) ? trans('public.add_to_cart') : trans('update.out_of_stock')); ?>

                                </button>

                                <?php if($productAvailability > 0 and !empty($product->point) and $product->point > 0): ?>
                                    <input type="hidden" class="js-product-points" value="<?php echo e($product->point); ?>">

                                    <a href="<?php echo e(!(auth()->check()) ? '/login' : '#!'); ?>" class="<?php echo e((auth()->check()) ? 'js-buy-with-point' : ''); ?> js-buy-with-point-show-btn btn btn-outline-warning mt-20 ml-0 ml-md-10" rel="nofollow">
                                        <?php echo trans('update.buy_with_n_points',['points' => $product->point]); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if($productAvailability > 0 and !empty(getFeaturesSettings('direct_products_payment_button_status'))): ?>
                                    <button type="button" class="btn btn-outline-danger mt-20 ml-0 ml-md-10 js-product-direct-payment">
                                        <?php echo e(trans('update.buy_now')); ?>

                                    </button>
                                <?php endif; ?>

                                <?php if($productAvailability > 0 and $hasInstallments): ?>
                                    <a href="/products/<?php echo e($product->slug); ?>/installments" class="js-installments-btn btn btn-outline-primary mt-20 ml-0 ml-md-10">
                                        <?php echo e(trans('update.installments')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-md-row align-items-md-center w-100 mt-35">
                            <?php if($product->isPhysical() and !empty($product->delivery_estimated_time)): ?>
                                <div class="product-show-info-footer-items d-flex align-items-center mb-10 mb-md-0 mr-0 mr-md-10">
                                    <div class="icon-box">
                                        <i data-feather="package" class="" width="20" height="20"></i>
                                    </div>
                                    <div class="ml-5">
                                        <span class="d-block font-14 font-weight-bold text-dark"><?php echo e(trans('update.physical_product')); ?></span>
                                        <span class="d-block font-12 text-gray"><?php echo e(trans('update.delivery_estimated_time_days_alert',['days' => $product->delivery_estimated_time])); ?></span>
                                    </div>
                                </div>
                            <?php elseif($product->isVirtual()): ?>
                                <div class="product-show-info-footer-items d-flex align-items-center mb-10 mb-md-0 mr-0 mr-md-10">
                                    <div class="icon-box">
                                        <i data-feather="package" class="" width="20" height="20"></i>
                                    </div>
                                    <div class="ml-5">
                                        <span class="d-block font-14 font-weight-bold text-dark"><?php echo e(trans('update.virtual_product')); ?></span>
                                        <span class="d-block font-12 text-gray"><?php echo e(trans('update.download_all_files_after_payment')); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="js-share-product product-show-info-footer-items d-flex align-items-center cursor-pointer">
                                <div class="icon-box">
                                    <i data-feather="share-2" class="" width="20" height="20"></i>
                                </div>
                                <div class="ml-5">
                                    <span class="d-block font-14 font-weight-bold text-dark"><?php echo e(trans('public.share')); ?></span>
                                    <span class="d-block font-12 text-gray"><?php echo e(trans('update.product_share_text')); ?></span>
                                </div>
                            </div>
                        </div>

                        
                        <?php if($product->isVirtual() and $productAvailability > 0 and !empty(getGiftsGeneralSettings('status')) and !empty(getGiftsGeneralSettings('allow_sending_gift_for_products'))): ?>
                            <a href="/gift/product/<?php echo e($product->slug); ?>" class="d-flex align-items-center mt-15 rounded-lg border p-15">
                                <div class="size-40 d-flex-center rounded-circle bg-gray200">
                                    <i data-feather="gift" class="text-gray" width="20" height="20"></i>
                                </div>
                                <div class="ml-5">
                                    <h4 class="font-14 font-weight-bold text-gray"><?php echo e(trans('update.gift_this_product')); ?></h4>
                                    <p class="font-12 text-gray"><?php echo e(trans('update.gift_this_product_hint')); ?></p>
                                </div>
                            </a>
                        <?php endif; ?>

                    </div>
                </form>
            </div>
        </div>

        <?php if(
               !empty(getFeaturesSettings("frontend_coupons_display_type")) and
               getFeaturesSettings("frontend_coupons_display_type") == "before_content" and
               !empty($instructorDiscounts) and
               count($instructorDiscounts)
           ): ?>
            <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-30"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="mt-30">
            <ul class="product-show__nav-tabs nav nav-tabs p-15 d-flex align-items-center" id="tabs-tab" role="tablist">
                <li class="nav-item mr-20 mr-lg-30">
                    <a class="position-relative font-14 <?php echo e((empty(request()->get('tab')) or request()->get('tab') == 'description') ? 'active' : ''); ?>" id="description-tab"
                       data-toggle="tab" href="#description" role="tab" aria-controls="description"
                       aria-selected="true"><?php echo e(trans('public.description')); ?></a>
                </li>
                <li class="nav-item mr-20 mr-lg-30">
                    <a class="position-relative font-14 <?php echo e((request()->get('tab') == 'seller') ? 'active' : ''); ?>" id="seller-tab" data-toggle="tab"
                       href="#seller" role="tab" aria-controls="seller"
                       aria-selected="false"><?php echo e(trans('update.seller')); ?></a>
                </li>
                <li class="nav-item mr-20 mr-lg-30">
                    <a class="position-relative font-14 <?php echo e((request()->get('tab') == 'specifications') ? 'active' : ''); ?>" id="specifications-tab" data-toggle="tab"
                       href="#specifications" role="tab" aria-controls="specifications"
                       aria-selected="false"><?php echo e(trans('update.specifications')); ?></a>
                </li>

                <?php if(!empty($product->files) and count($product->files) and $product->checkUserHasBought()): ?>
                    <li class="nav-item mr-20 mr-lg-30">
                        <a class="position-relative font-14 <?php echo e((request()->get('tab') == 'files') ? 'active' : ''); ?>" id="files-tab" data-toggle="tab"
                           href="#files" role="tab" aria-controls="files"
                           aria-selected="false"><?php echo e(trans('public.files')); ?></a>
                    </li>
                <?php endif; ?>

                <li class="nav-item mr-20 mr-lg-30">
                    <a class="position-relative font-14 <?php echo e((request()->get('tab') == 'reviews') ? 'active' : ''); ?>" id="reviews-tab" data-toggle="tab"
                       href="#reviews" role="tab" aria-controls="reviews"
                       aria-selected="false"><?php echo e(trans('product.reviews')); ?></a>
                </li>
            </ul>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade <?php echo e((empty(request()->get('tab')) or request()->get('tab') == 'description') ? 'show active' : ''); ?> " id="description" role="tabpanel"
                     aria-labelledby="description-tab">
                    <?php echo $__env->make('web.default.products.includes.tabs.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="tab-pane fade <?php echo e((request()->get('tab') == 'seller') ? 'show active' : ''); ?> " id="seller" role="tabpanel"
                     aria-labelledby="seller-tab">
                    <?php echo $__env->make('web.default.products.includes.tabs.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="tab-pane fade <?php echo e((request()->get('tab') == 'specifications') ? 'show active' : ''); ?> " id="specifications" role="tabpanel"
                     aria-labelledby="specifications-tab">
                    <?php echo $__env->make('web.default.products.includes.tabs.specifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="tab-pane fade <?php echo e((request()->get('tab') == 'files') ? 'show active' : ''); ?> " id="files" role="tabpanel"
                     aria-labelledby="files-tab">
                    <?php echo $__env->make('web.default.products.includes.tabs.files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="tab-pane fade <?php echo e((request()->get('tab') == 'reviews') ? 'show active' : ''); ?> " id="reviews" role="tabpanel"
                     aria-labelledby="reviews-tab">
                    <?php echo $__env->make('web.default.products.includes.tabs.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>

        <?php if(
               !empty(getFeaturesSettings("frontend_coupons_display_type")) and
               getFeaturesSettings("frontend_coupons_display_type") == "after_content" and
               !empty($instructorDiscounts) and
               count($instructorDiscounts)
           ): ?>
            <?php $__currentLoopData = $instructorDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web.default.includes.discounts.instructor_discounts_card', ['discount' => $instructorDiscount, 'instructorDiscountClassName' => "mt-30"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        
        <?php if(!empty($advertisingBanners) and count($advertisingBanners)): ?>
            <div class="mt-30 mt-md-50">
                <div class="row">
                    <?php $__currentLoopData = $advertisingBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-<?php echo e($banner->size); ?>">
                            <a href="<?php echo e($banner->link); ?>">
                                <img src="<?php echo e($banner->image); ?>" class="img-cover rounded-sm" alt="<?php echo e($banner->title); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
        

    </div>

    <?php echo $__env->make('web.default.products.includes.share_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.default.user.send_message_modal',['user' => $seller], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.default.products.includes.buy_with_point_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var replyLang = '<?php echo e(trans('panel.reply')); ?>';
        var closeLang = '<?php echo e(trans('public.close')); ?>';
        var saveLang = '<?php echo e(trans('public.save')); ?>';
        var reportLang = '<?php echo e(trans('panel.report')); ?>';
        var reportSuccessLang = '<?php echo e(trans('panel.report_success')); ?>';
        var reportFailLang = '<?php echo e(trans('panel.report_fail')); ?>';
        var messageToReviewerLang = '<?php echo e(trans('public.message_to_reviewer')); ?>';
        var unFollowLang = '<?php echo e(trans('panel.unfollow')); ?>';
        var followLang = '<?php echo e(trans('panel.follow')); ?>';
        var messageSuccessSentLang = '<?php echo e(trans('site.message_success_sent')); ?>';
        var productDemoLang = '<?php echo e(trans('update.product_demo')); ?>';
        var onlineViewerModalTitleLang = '<?php echo e(trans('update.online_viewer')); ?>';
        var copyLang = '<?php echo e(trans('public.copy')); ?>';
        var copiedLang = '<?php echo e(trans('public.copied')); ?>';
    </script>

    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/profile.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/product_show.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\show.blade.php ENDPATH**/ ?>