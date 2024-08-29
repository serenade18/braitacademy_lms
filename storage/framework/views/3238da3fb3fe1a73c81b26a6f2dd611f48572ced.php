<?php $__env->startSection('content'); ?>
    <section class="cart-banner position-relative text-center">
        <h1 class="font-30 text-white font-weight-bold"><?php echo e(trans('cart.shopping_cart')); ?></h1>
        <span class="payment-hint font-20 text-white d-block"> <?php echo e(handlePrice($subTotal, true, true, false, null, true) . ' ' . trans('cart.for_items',['count' => $carts->count()])); ?></span>
    </section>

    <div class="container">

        <?php if(!empty($totalCashbackAmount)): ?>
            <div class="d-flex align-items-center mt-45 p-15 success-transparent-alert">
                <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
                    <i data-feather="credit-card" width="18" height="18" class=""></i>
                </div>

                <div class="ml-10">
                    <div class="font-14 font-weight-bold "><?php echo e(trans('update.get_cashback')); ?></div>
                    <div class="font-12 "><?php echo e(trans('update.by_purchasing_this_cart_you_will_get_amount_as_cashback',['amount' => handlePrice($totalCashbackAmount)])); ?></div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(!empty($cartDiscount)): ?>
            <?php echo $__env->make('web.default.cart.includes.cart_discount', ['cartDiscountClassName' => 'is-cart-page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <section class="mt-45">
            <h2 class="section-title"><?php echo e(trans('cart.cart_items')); ?></h2>

            <div class="rounded-sm shadow mt-20 py-25 px-10 px-md-30">
                <?php if($carts->count() > 0): ?>
                    <div class="row d-none d-md-flex">
                        <div class="col-12 col-lg-8"><span
                                class="text-gray font-weight-500"><?php echo e(trans('cart.item')); ?></span></div>
                        <div class="col-6 col-lg-2 text-center"><span
                                class="text-gray font-weight-500"><?php echo e(trans('public.price')); ?></span></div>
                        <div class="col-6 col-lg-2 text-center"><span
                                class="text-gray font-weight-500"><?php echo e(trans('public.remove')); ?></span></div>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-5 cart-row">
                        <div class="col-12 col-lg-8 mb-15 mb-md-0">
                            <div class="webinar-card webinar-list-cart row">
                                <div class="col-4">
                                    <div class="image-box">
                                        <?php
                                            $cartItemInfo = $cart->getItemInfo();
                                            $cartTaxType = !empty($cartItemInfo['isProduct']) ? 'store' : 'general';
                                        ?>
                                        <img src="<?php echo e($cartItemInfo['imgPath']); ?>" class="img-cover" alt="user avatar">
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="webinar-card-body p-0 w-100 h-100 d-flex flex-column">
                                        <div class="d-flex flex-column">
                                            <a href="<?php echo e($cartItemInfo['itemUrl'] ?? '#!'); ?>" target="_blank">
                                                <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e($cartItemInfo['title']); ?></h3>
                                            </a>

                                            <?php if(!empty($cart->gift_id) and !empty($cart->gift)): ?>
                                                <span class="d-block mt-5 text-gray font-12"><?php echo trans('update.a_gift_for_name_on_date',['name' => $cart->gift->name, 'date' => (!empty($cart->gift->date) ? dateTimeFormat($cart->gift->date, 'j M Y H:i') : trans('update.instantly'))]); ?></span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if(!empty($cart->reserve_meeting_id)): ?>
                                            <div class="mt-10">
                                                <span class="text-gray font-12 border rounded-pill py-5 px-10"><?php echo e($cart->reserveMeeting->day .' '. $cart->reserveMeeting->meetingTime->time); ?> (<?php echo e($cart->reserveMeeting->meeting->getTimezone()); ?>)</span>
                                            </div>

                                            <?php if($cart->reserveMeeting->meeting->getTimezone() != getTimezone()): ?>
                                                <div class="mt-10">
                                                    <span class="text-danger font-12 border border-danger rounded-pill py-5 px-10"><?php echo e($cart->reserveMeeting->day .' '. dateTimeFormat($cart->reserveMeeting->start_at,'h:iA',false).'-'.dateTimeFormat($cart->reserveMeeting->end_at,'h:iA',false)); ?> (<?php echo e(getTimezone()); ?>)</span>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if(!empty($cartItemInfo['profileUrl']) and !empty($cartItemInfo['teacherName'])): ?>
                                            <span class="text-gray font-14 mt-auto">
                                                <?php echo e(trans('public.by')); ?>

                                                <a href="<?php echo e($cartItemInfo['profileUrl']); ?>" target="_blank" class="text-gray text-decoration-underline"><?php echo e($cartItemInfo['teacherName']); ?></a>
                                            </span>
                                        <?php endif; ?>

                                        <?php if(!empty($cartItemInfo['extraHint'])): ?>
                                            <span class="text-gray font-14 mt-auto"><?php echo e($cartItemInfo['extraHint']); ?></span>
                                        <?php endif; ?>

                                        <?php if(!is_null($cartItemInfo['rate'])): ?>
                                            <?php echo $__env->make('web.default.includes.webinar.rate',['rate' => $cartItemInfo['rate']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-2 d-flex flex-md-column align-items-center justify-content-center">
                            <span class="text-gray d-inline-block d-md-none"><?php echo e(trans('public.price')); ?> :</span>

                            <?php if(!empty($cartItemInfo['discountPrice'])): ?>
                                <span class="text-gray text-decoration-line-through mx-10 mx-md-0"><?php echo e(handlePrice($cartItemInfo['price'], true, true, false, null, true, $cartTaxType)); ?></span>
                                <span class="font-20 text-primary mt-0 mt-md-5 font-weight-bold"><?php echo e(handlePrice($cartItemInfo['discountPrice'], true, true, false, null, true, $cartTaxType)); ?></span>
                            <?php else: ?>
                                <span class="font-20 text-primary mt-0 mt-md-5 font-weight-bold"><?php echo e(handlePrice($cartItemInfo['price'], true, true, false, null, true, $cartTaxType)); ?></span>
                            <?php endif; ?>

                            <?php if(!empty($cartItemInfo['quantity'])): ?>
                                <span class="font-12 text-warning font-weight-500 mt-0 mt-md-5">(<?php echo e($cartItemInfo['quantity']); ?> <?php echo e(trans('update.product')); ?>)</span>
                            <?php endif; ?>

                            <?php if(!empty($cartItemInfo['extraPriceHint'])): ?>
                                <span class="font-12 text-gray font-weight-500 mt-0 mt-md-5"><?php echo e($cartItemInfo['extraPriceHint']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="col-6 col-lg-2 d-flex flex-md-column align-items-center justify-content-center">
                            <span class="text-gray d-inline-block d-md-none mr-10 mr-md-0"><?php echo e(trans('public.remove')); ?> :</span>

                            <a href="/cart/<?php echo e($cart->id); ?>/delete" class="delete-action btn-cart-list-delete d-flex align-items-center justify-content-center">
                                <i data-feather="x" width="20" height="20" class=""></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <button type="button" onclick="window.history.back()" class="btn btn-sm btn-primary mt-25"><?php echo e(trans('cart.continue_shopping')); ?></button>
            </div>
        </section>

        <form action="/cart/checkout" method="post" id="cartForm">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="discount_id" value="">

            <?php if($hasPhysicalProduct): ?>
                <?php echo $__env->make('web.default.cart.includes.shipping_and_delivery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="row mt-30">
                <div class="col-12 col-lg-6">
                    <section class="mt-45">
                        <h3 class="section-title"><?php echo e(trans('cart.coupon_code')); ?></h3>
                        <div class="rounded-sm shadow mt-20 py-25 px-20">
                            <p class="text-gray font-14"><?php echo e(trans('cart.coupon_code_hint')); ?></p>

                            <?php if(!empty($userGroup) and !empty($userGroup->discount)): ?>
                                <p class="text-gray mt-25"><?php echo e(trans('cart.in_user_group',['group_name' => $userGroup->name , 'percent' => $userGroup->discount])); ?></p>
                            <?php endif; ?>

                            <form action="/carts/coupon/validate" method="Post">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <input type="text" name="coupon" id="coupon_input" class="form-control mt-25"
                                           placeholder="<?php echo e(trans('cart.enter_your_code_here')); ?>">
                                    <span class="invalid-feedback"><?php echo e(trans('cart.coupon_invalid')); ?></span>
                                    <span class="valid-feedback"><?php echo e(trans('cart.coupon_valid')); ?></span>
                                </div>

                                <button type="submit" id="checkCoupon"
                                        class="btn btn-sm btn-primary mt-50"><?php echo e(trans('cart.validate')); ?></button>
                            </form>
                        </div>
                    </section>
                </div>

                <div class="col-12 col-lg-6">
                    <section class="mt-45">
                        <h3 class="section-title"><?php echo e(trans('cart.cart_totals')); ?></h3>
                        <div class="rounded-sm shadow mt-20 pb-20 px-20">

                            <div class="cart-checkout-item">
                                <h4 class="text-secondary font-14 font-weight-500"><?php echo e(trans('cart.sub_total')); ?></h4>
                                <span class="font-14 text-gray font-weight-bold"><?php echo e(handlePrice($subTotal)); ?></span>
                            </div>

                            <div class="cart-checkout-item">
                                <h4 class="text-secondary font-14 font-weight-500"><?php echo e(trans('public.discount')); ?></h4>
                                <span class="font-14 text-gray font-weight-bold">
                                <span id="totalDiscount"><?php echo e(handlePrice($totalDiscount)); ?></span>
                            </span>
                            </div>

                            <div class="cart-checkout-item">
                                <h4 class="text-secondary font-14 font-weight-500"><?php echo e(trans('cart.tax')); ?>

                                    <?php if(!$taxIsDifferent): ?>
                                        <span class="font-14 text-gray ">(<?php echo e($tax); ?>%)</span>
                                    <?php endif; ?>
                                </h4>
                                <span class="font-14 text-gray font-weight-bold"><span id="taxPrice"><?php echo e(handlePrice($taxPrice)); ?></span></span>
                            </div>

                            <?php if(!empty($productDeliveryFee)): ?>
                                <div class="cart-checkout-item">
                                    <h4 class="text-secondary font-14 font-weight-500">
                                        <?php echo e(trans('update.delivery_fee')); ?>

                                    </h4>
                                    <span class="font-14 text-gray font-weight-bold"><span id="taxPrice"><?php echo e(handlePrice($productDeliveryFee)); ?></span></span>
                                </div>
                            <?php endif; ?>

                            <div class="cart-checkout-item border-0">
                                <h4 class="text-secondary font-14 font-weight-500"><?php echo e(trans('cart.total')); ?></h4>
                                <span class="font-14 text-gray font-weight-bold"><span id="totalAmount"><?php echo e(handlePrice($total)); ?></span></span>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mt-15"><?php echo e(trans('cart.checkout')); ?></button>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script>
        var couponInvalidLng = '<?php echo e(trans('cart.coupon_invalid')); ?>';
        var selectProvinceLang = '<?php echo e(trans('update.select_province')); ?>';
        var selectCityLang = '<?php echo e(trans('update.select_city')); ?>';
        var selectDistrictLang = '<?php echo e(trans('update.select_district')); ?>';
    </script>

    <script src="/assets/default/js/parts/get-regions.min.js"></script>
    <script src="/assets/default/js/parts/cart.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(getTemplate().'.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/cart/cart.blade.php ENDPATH**/ ?>