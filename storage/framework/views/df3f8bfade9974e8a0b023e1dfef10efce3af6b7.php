<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container pt-50 mt-10">
        <div class="text-center">
            <?php if($installment->needToVerify()): ?>
                <h1 class="font-36"><?php echo e(trans('update.verify_your_installments')); ?></h1>
                <p class="mt-10 font-16 text-gray"><?php echo e(trans('update.verify_your_installments_hint')); ?></p>
            <?php else: ?>
                <h1 class="font-36"><?php echo e(trans('update.verify_your_installments2')); ?></h1>
                <p class="mt-10 font-16 text-gray"><?php echo e(trans('update.verify_your_installments_hint2')); ?></p>
            <?php endif; ?>
        </div>

        <div class="become-instructor-packages d-flex align-items-center flex-column flex-lg-row mt-50 border rounded-lg p-15 p-lg-25">
            <div class="default-package-icon">
                <img src="/assets/default/img/become-instructor/default.png" class="img-cover" alt="<?php echo e(trans('update.installment_overview')); ?>" width="176" height="144">
            </div>

            <div class="ml-lg-25 w-100 mt-20 mt-lg-0">
                <h2 class="font-24 font-weight-bold text-dark-blue"><?php echo e(trans('update.installment_overview')); ?></h2>
                <?php if($itemType == 'course'): ?>
                    <a href="<?php echo e($item->getUrl()); ?>" target="_blank" class="font-14 font-weight-500 text-gray"><?php echo e($item->title); ?></a>
                <?php else: ?>
                    <div class="font-14 font-weight-500 text-gray"><?php echo e($item->title); ?></div>
                <?php endif; ?>

                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="check-square" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e(!empty($installment->upfront) ? handlePrice($installment->getUpfront($itemPrice)).' '. trans('update.upfront') : trans('update.no_upfront')); ?></span>
                    </div>

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="menu" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e($installment->steps_count); ?> <?php echo e(trans('update.installments')); ?> (<?php echo e(handlePrice($installment->totalPayments($itemPrice, false))); ?>)</span>
                    </div>

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="dollar-sign" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e(handlePrice($installment->totalPayments($itemPrice))); ?> <?php echo e(trans('financial.total_amount')); ?></span>
                    </div>

                    <div class="d-flex align-items-center mt-20">
                        <i data-feather="calendar" width="20" height="20" class="text-gray"></i>
                        <span class="font-14 text-gray ml-5"><?php echo e($installment->steps->max('deadline')); ?> <?php echo e(trans('update.days_duration')); ?></span>
                    </div>

                </div>
            </div>
        </div>

        <form action="/installments/<?php echo e($installment->id); ?>/store" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="item" value="<?php echo e(request()->get('item')); ?>">
            <input type="hidden" name="item_type" value="<?php echo e(request()->get('item_type')); ?>">

            
            <?php if($installment->request_uploads or $installment->needToVerify()): ?>
                <div class="border rounded-lg p-15 mt-20">
                    <?php if($installment->needToVerify()): ?>
                        <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.verify_installments')); ?></h3>

                        <div class="font-16 text-gray mt-10"><?php echo nl2br($installment->verification_description); ?></div>

                        
                        <?php if(!empty($installment->verification_banner)): ?>
                            <img src="<?php echo e($installment->verification_banner); ?>" alt="<?php echo e($installment->main_title); ?>" class="img-fluid mt-30">
                        <?php endif; ?>

                        
                        <?php if(!empty($installment->verification_video)): ?>
                            <div class="installment-video-card mt-50">
                                <video
                                    id="my-video"
                                    class="video-js"
                                    controls
                                    preload="auto"
                                >
                                    <source src="<?php echo e($installment->verification_video); ?>" type="video/mp4"/>
                                </video>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($installment->request_uploads): ?>
                        <div class="<?php echo e(($installment->needToVerify()) ? 'mt-20' : ''); ?>">
                            <h4 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.attachments')); ?></h4>
                            <p class="mt-5 font-12 text-gray"><?php echo e(trans('update.attach_your_documents_and_send_them_to_admin')); ?></p>

                            <?php $__errorArgs = ['attachments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <div class="js-attachments">

                                <div class="js-main-row row">
                                    <div class="col-12 col-md-6 mt-15">
                                        <div class="form-group mb-0">
                                            <label class="font-14 text-dark-blue"><?php echo e(trans('public.title')); ?></label>
                                            <input type="text" name="attachments[record][title]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mt-15">
                                        <div class="form-group">
                                            <label class="font-14 text-dark-blue"><?php echo e(trans('update.attach_a_file_optional')); ?></label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text panel-file-manager" data-input="file_record" data-preview="holder">
                                                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="attachments[record][file]" id="file_record" class="form-control rounded-0"/>

                                                <button type="button" class="js-add-btn btn btn-primary h-40px btn-sm installment-verify-attachment-add-btn">
                                                    <i data-feather="plus" width="16" height="16" class="text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


            
            <div class="border rounded-lg p-15 mt-30">
                <h3 class="font-16 font-weight-bold text-dark-blue"><?php echo e(trans('update.installment_terms_&_rules')); ?></h3>

                <div class="font-16 text-gray"><?php echo nl2br(getInstallmentsTermsSettings('terms_description')); ?></div>

                <div class="mt-10 border bg-info-light p-15 rounded-sm">
                    <h4 class="font-14 text-gray font-weight-bold"><?php echo e(trans('update.important')); ?></h4>
                    <p class="mt-5 font-14 text-gray"><?php echo e(trans('update.by_purchasing_installment_plans_you_will_accept_installment_terms_and_rules')); ?></p>
                </div>
            </div>

            <?php if(!empty($hasPhysicalProduct)): ?>
                <?php echo $__env->make('web.default.cart.includes.shipping_and_delivery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(!empty(request()->get('quantity'))): ?>
                <input type="hidden" name="quantity" value="<?php echo e(request()->get('quantity')); ?>">
            <?php endif; ?>

            <?php if(!empty(request()->get('specifications')) and count(request()->get('specifications'))): ?>
                <?php $__currentLoopData = request()->get('specifications'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="specifications[<?php echo e($k); ?>]" value="<?php echo e($specification); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="d-flex align-items-center justify-content-between border-top pt-10 mt-20">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-gray200"><?php echo e(trans('update.back')); ?></a>

                <button type="submit" class="btn btn-sm btn-primary">
                    <?php if($installment->needToVerify()): ?>
                        <?php if(!empty($installment->upfront)): ?>
                            <?php echo e(trans('update.submit_and_checkout')); ?>

                        <?php else: ?>
                            <?php echo e(trans('update.submit_request')); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(!empty($installment->upfront)): ?>
                            <?php echo e(trans('update.proceed_to_checkout')); ?>

                        <?php else: ?>
                            <?php echo e(trans('update.finalize_request')); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </button>
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

    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="/assets/default/js/parts/get-regions.min.js"></script>
    <script src="/assets/default/js/parts/installment_verify.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\installment\verify.blade.php ENDPATH**/ ?>