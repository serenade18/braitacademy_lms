<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <form action="/panel/marketing/discounts/<?php echo e(!empty($discount) ? $discount->id.'/update' : 'store'); ?>" method="post" class="">
            <?php echo e(csrf_field()); ?>


            <section>
                <h2 class="section-title after-line"><?php echo e(!empty($discount) ? (trans('public.edit').' ('. $discount->title .')') : trans('update.new_coupon')); ?></h2>

                <div class="row  mt-25">
                    <div class="col-12 col-md-5">

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                            <input type="text" name="title" class="js-ajax-title form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($discount) ? $discount->title : old('title')); ?>"/>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <p class="font-12 text-gray mt-5"><?php echo e(trans('update.this_title_will_be_displayed_on_the_product_or_profile_page')); ?></p>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.subtitle')); ?></label>
                            <input type="text" name="subtitle" class="js-ajax-subtitle form-control <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($discount) ? $discount->subtitle : old('subtitle')); ?>"/>
                            <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <p class="font-12 text-gray mt-5"><?php echo e(trans('update.this_subtitle_will_be_displayed_on_the_product_or_profile_page')); ?></p>
                        </div>

                        <div class="form-group">
                            <label class="input-label d-block"><?php echo e(trans('update.discount_type')); ?></label>
                            <select name="discount_type" class="js-discount-type form-control <?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="percentage"<?php echo e((empty($discount) or (!empty($discount) and $discount->discount_type == 'percentage')) ? 'selected' : ''); ?>><?php echo e(trans('admin/main.percentage')); ?></option>
                                <option value="fixed_amount"<?php echo e((!empty($discount) and $discount->discount_type == 'fixed_amount') ? 'selected' : ''); ?>><?php echo e(trans('update.fixed_amount')); ?></option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group">
                            <label class="input-label d-block"><?php echo e(trans('update.source')); ?></label>
                            <select name="source" class="js-discount-source form-control <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__currentLoopData = \App\Models\Discount::$panelDiscountSource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($source); ?>" <?php echo e((!empty($discount) and $discount->source == $source) ? 'selected' : ''); ?>><?php echo e(trans('update.discount_source_'.$source)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <?php
                            $selectedCourseIds = (!empty($discount) and !empty($discount->discountCourses)) ? $discount->discountCourses->pluck('course_id')->toArray() : [];
                            $selectedBundleIds = (!empty($discount) and !empty($discount->discountBundles)) ? $discount->discountBundles->pluck('bundle_id')->toArray() : [];
                        ?>

                        <div class="form-group js-courses-input <?php echo e((empty($discount) or $discount->source != \App\Models\Discount::$discountSourceCourse) ? 'd-none' : ''); ?>">
                            <label class="input-label"><?php echo e(trans('admin/main.courses')); ?></label>
                            <select name="webinar_ids[]" multiple="multiple" class="form-control select2 " data-placeholder="<?php echo e(trans('update.select_a_course')); ?>">
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($webinar->id); ?>" <?php echo e(in_array($webinar->id, $selectedCourseIds) ? 'selected' : ''); ?>><?php echo e($webinar->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group js-bundles-input <?php echo e((!empty($discount) and $discount->source == \App\Models\Discount::$discountSourceBundle) ? '' : 'd-none'); ?>">
                            <label class="input-label"><?php echo e(trans('update.bundles')); ?></label>
                            <select name="bundle_ids[]" multiple="multiple" class="form-control select2 " data-placeholder="<?php echo e(trans('update.select_a_bundle')); ?>">
                                <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bundle->id); ?>" <?php echo e(in_array($bundle->id, $selectedCourseIds) ? 'selected' : ''); ?>><?php echo e($bundle->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <div class="form-group js-products-input <?php echo e((empty($discount) or $discount->source != \App\Models\Discount::$discountSourceProduct) ? 'd-none' : ''); ?>">
                            <label class="input-label d-block"><?php echo e(trans('update.product_type')); ?></label>
                            <select name="product_type" class="form-control">
                                <option value="all"><?php echo e(trans('admin/main.all')); ?></option>
                                <option value="physical" <?php echo e((!empty($discount) and $discount->product_type == 'physical') ? 'selected' : ''); ?>><?php echo e(trans('update.physical')); ?></option>
                                <option value="virtual" <?php echo e((!empty($discount) and $discount->product_type == 'virtual') ? 'selected' : ''); ?>><?php echo e(trans('update.virtual')); ?></option>
                            </select>
                        </div>

                        <div class="form-group js-percentage-inputs <?php echo e((!empty($discount) and $discount->discount_type == 'fixed_amount') ? 'd-none' : ''); ?>">
                            <label class="input-label"><?php echo e(trans('admin/main.discount_percentage')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="text-white font-16">%</span>
                                    </div>
                                </div>

                                <input type="number" name="percent"
                                       class="form-control text-center  <?php $__errorArgs = ['percent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($discount) ? $discount->percent : old('percent')); ?>"
                                       placeholder="0" min="0"/>
                                <?php $__errorArgs = ['percent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group js-percentage-inputs <?php echo e((!empty($discount) and $discount->discount_type == 'fixed_amount') ? 'd-none' : ''); ?>">
                            <label class="input-label"><?php echo e(trans('admin/main.max_amount')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="text-white"><?php echo e($currency); ?></span>
                                    </div>
                                </div>

                                <input type="number" name="max_amount"
                                       class="form-control text-center <?php $__errorArgs = ['max_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($discount) ? $discount->max_amount : old('max_amount')); ?>"
                                       placeholder="<?php echo e(trans('update.discount_max_amount_placeholder')); ?>" min="0"/>
                                <?php $__errorArgs = ['max_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group js-fixed-amount-inputs <?php echo e((empty($discount) or $discount->discount_type == 'percentage') ? 'd-none' : ''); ?>">
                            <label class="input-label"><?php echo e(trans('admin/main.amount')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="text-white"><?php echo e($currency); ?></span>
                                    </div>
                                </div>

                                <input type="number" name="amount"
                                       class="form-control text-center <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($discount) ? $discount->amount : old('amount')); ?>"
                                       placeholder="<?php echo e(trans('update.discount_amount_placeholder')); ?>" min="0"/>
                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.minimum_order')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="text-white"><?php echo e($currency); ?></span>
                                    </div>
                                </div>

                                <input type="number" name="minimum_order"
                                       class="form-control text-center <?php $__errorArgs = ['minimum_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($discount) ? $discount->minimum_order : old('minimum_order')); ?>"
                                       placeholder="<?php echo e(trans('update.discount_minimum_order_placeholder')); ?>" min="0"/>
                                <?php $__errorArgs = ['minimum_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('admin/main.usable_times')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i data-feather="users" width="18" height="18" class="text-white"></i>
                                    </span>
                                </div>

                                <input type="number" name="count"
                                       class="form-control text-center <?php $__errorArgs = ['count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(!empty($discount) ? $discount->count : old('count')); ?>"
                                       placeholder="<?php echo e(trans('admin/main.count_placeholder')); ?>"/>
                                <?php $__errorArgs = ['count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <p class="font-12 text-gray mt-5"><?php echo e(trans('update.the_coupon_will_be_expired_after_reaching_this_parameter_leave_it_blank_for_unlimited')); ?></p>
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="inputDefault"><?php echo e(trans('update.coupon_code')); ?></label>
                            <input type="text" name="code"
                                   value="<?php echo e(!empty($discount) ? $discount->code : old('code')); ?>"
                                   class="form-control text-center <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.expiry_date')); ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                    </span>
                                </div>
                                <input type="text" name="expired_at" class="form-control datetimepicker <?php $__errorArgs = ['expired_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       aria-describedby="dateRangeLabel" autocomplete="off"
                                       value="<?php echo e(!empty($discount) ? dateTimeFormat($discount->expired_at, 'Y-m-d H:i', false) : ''); ?>"/>

                                <?php $__errorArgs = ['expired_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group mt-2 d-flex align-items-center justify-content-between ">
                            <div class="">
                                <label class="input-label cursor-pointer" for="private"><?php echo e(trans('update.private_coupon')); ?></label>
                                <p class="font-12 text-gray font-weight-500"> <?php echo e(trans('update.the_coupon_will_be_hidden_in_frontend')); ?></p>
                            </div>

                            <div class="custom-control custom-switch">
                                <input id="private" type="checkbox" name="private" class="custom-control-input" <?php echo e((!empty($discount) and $discount->private) ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="private"></label>
                            </div>
                        </div>


                        <div class=" mt-25">
                            <button class="btn btn-primary"><?php echo e(trans('admin/main.save')); ?></button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/admin/discount.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.default.panel.layouts.panel_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\marketing\discounts\create\index.blade.php ENDPATH**/ ?>