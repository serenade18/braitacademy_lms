<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(trans('admin/main.discounts')); ?></div>
            </div>
        </div>


        <div class="section-body">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/financial/discounts/<?php echo e(!empty($discount) ? $discount->id.'/update' : 'store'); ?>" method="Post">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group">
                                    <label><?php echo e(trans('admin/main.title')); ?></label>
                                    <input type="text" name="title"
                                           class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($discount) ? $discount->title : old('title')); ?>"/>
                                    <?php $__errorArgs = ['title'];
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
                                        <?php $__currentLoopData = \App\Models\Discount::$discountSource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                                <div class="form-group js-courses-input <?php echo e((empty($discount) or $discount->source != \App\Models\Discount::$discountSourceCourse) ? 'd-none' : ''); ?>">
                                    <label class="input-label"><?php echo e(trans('admin/main.courses')); ?></label>
                                    <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2 " data-placeholder="<?php echo e(trans('admin/main.search_webinar')); ?>">

                                        <?php if(!empty($discount) and !empty($discount->discountCourses)): ?>
                                            <?php $__currentLoopData = $discount->discountCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($discountCourse->course)): ?>
                                                    <option value="<?php echo e($discountCourse->course->id); ?>" selected><?php echo e($discountCourse->course->title); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group js-bundles-input <?php echo e((!empty($discount) and $discount->source == \App\Models\Discount::$discountSourceBundle) ? '' : 'd-none'); ?>">
                                    <label class="input-label"><?php echo e(trans('update.bundles')); ?></label>
                                    <select name="bundle_ids[]" multiple="multiple" class="form-control search-bundle-select2 " data-placeholder="<?php echo e(trans('update.search_bundle')); ?>">

                                        <?php if(!empty($discount) and !empty($discount->discountBundles)): ?>
                                            <?php $__currentLoopData = $discount->discountBundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountBundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($discountBundle->bundle)): ?>
                                                    <option value="<?php echo e($discountBundle->bundle->id); ?>" selected><?php echo e($discountBundle->bundle->title); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group js-categories-input <?php echo e((empty($discount) or $discount->source != \App\Models\Discount::$discountSourceCategory) ? 'd-none' : ''); ?>">
                                    <label class="input-label"><?php echo e(trans('admin/main.categories')); ?></label>
                                    <select name="category_ids[]" multiple="multiple" class="form-control search-category-select2 " data-placeholder="<?php echo e(trans('update.search_categories')); ?>">

                                        <?php if(!empty($discount) and !empty($discount->discountCategories)): ?>
                                            <?php $__currentLoopData = $discount->discountCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($discountCategory->category)): ?>
                                                    <option value="<?php echo e($discountCategory->category->id); ?>" selected><?php echo e($discountCategory->category->title); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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

                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.users')); ?></label>
                                    <select name="user_id" class="form-control search-user-select2"
                                            data-placeholder="<?php echo e(trans('update.discount_users_placeholder')); ?>">

                                        <?php if(!empty($userDiscounts) && $userDiscounts->count() > 0): ?>
                                            <?php $__currentLoopData = $userDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($userDiscount->user_id); ?>" selected><?php echo e($userDiscount->user->full_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="input-label d-block"><?php echo e(trans('admin/main.groups')); ?></label>
                                    <select name="group_ids[]" class="form-control select2 <?php $__errorArgs = ['group_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple data-placeholder="<?php echo e(trans('update.discount_user_group_placeholder')); ?>">
                                        <?php if(!empty($userGroups)): ?>
                                            <?php $__currentLoopData = $userGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($userGroup->id); ?>" <?php if(!empty($discountGroupIds) and in_array($userGroup->id, $discountGroupIds)): ?> selected <?php endif; ?>><?php echo e($userGroup->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['group_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>

                                <div class="form-group js-percentage-inputs <?php echo e((!empty($discount) and $discount->discount_type == 'fixed_amount') ? 'd-none' : ''); ?>">
                                    <label><?php echo e(trans('admin/main.discount_percentage')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-percentage" href=""></i>
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
                                               placeholder="0"/>
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
                                    <label><?php echo e(trans('admin/main.max_amount')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <?php echo e($currency); ?>

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
                                               value="<?php echo e((!empty($discount) and !empty($discount->max_amount)) ? convertPriceToUserCurrency($discount->max_amount) : old('max_amount')); ?>"
                                               placeholder="<?php echo e(trans('update.discount_max_amount_placeholder')); ?>"/>
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
                                    <label><?php echo e(trans('admin/main.amount')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <?php echo e($currency); ?>

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
                                               value="<?php echo e((!empty($discount) and !empty($discount->amount)) ? convertPriceToUserCurrency($discount->amount) : old('amount')); ?>"
                                               placeholder="<?php echo e(trans('update.discount_amount_placeholder')); ?>"/>
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
                                    <label><?php echo e(trans('update.minimum_order')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <?php echo e($currency); ?>

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
                                               value="<?php echo e((!empty($discount) and !empty($discount->minimum_order)) ? convertPriceToUserCurrency($discount->minimum_order) : old('minimum_order')); ?>"
                                               placeholder="<?php echo e(trans('update.discount_minimum_order_placeholder')); ?>"/>
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
                                    <label><?php echo e(trans('admin/main.usable_times')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-users" href=""></i>
                                            </div>
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
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputDefault"><?php echo e(trans('admin/main.discount_code')); ?></label>
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
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('admin/main.discount_code_hint')); ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.expiration')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dateRangeLabel">
                                                <i class="fa fa-calendar"></i>
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


                                <div class="form-group custom-switches-stacked">
                                    <label class="custom-switch pl-0">
                                        <input type="hidden" name="for_first_purchase" value="0">
                                        <input type="checkbox" name="for_first_purchase" id="forFirstPurchaseSwitch" value="1" <?php echo e((!empty($discount) and $discount->for_first_purchase) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="forFirstPurchaseSwitch"><?php echo e(trans('update.apply_only_for_the_first_purchase')); ?></label>
                                    </label>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.apply_only_for_the_first_purchase_hint')); ?></div>
                                </div>

                                <div class=" mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/discount.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\discount\new.blade.php ENDPATH**/ ?>