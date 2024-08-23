<div class="row">
    <div class="col-12 col-md-5">

        <div class="form-group mt-15 ">
            <label class="input-label d-block"><?php echo e(trans('update.target_types')); ?></label>

            <select name="target_type" class="js-target-types-input custom-select <?php $__errorArgs = ['target_types'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__currentLoopData = \App\Models\CashbackRule::$targetTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type); ?>" <?php if(!empty($rule) and $rule->target_type == $type): ?> selected <?php endif; ?>><?php echo e(trans('update.target_types_'.$type)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['target_types'];
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

        <div class="form-group mt-15 js-select-target-field <?php echo e((empty($rule) or in_array($rule->target_type, ['all', 'recharge_wallet'])) ? 'd-none' : ''); ?>">
            <label class="input-label d-block"><?php echo e(trans('update.select_target')); ?></label>

            <?php
                $targets = [
                    'courses' => \App\Models\CashbackRule::$courseTargets,
                    'store_products' => \App\Models\CashbackRule::$productTargets,
                    'bundles' => \App\Models\CashbackRule::$bundleTargets,
                    'meetings' => \App\Models\CashbackRule::$meetingTargets,
                    'subscription_packages' => \App\Models\CashbackRule::$subscriptionTargets,
                    'registration_packages' => \App\Models\CashbackRule::$registrationPackagesTargets,
                ];
            ?>

            <select name="target" class="js-target-input custom-select  <?php $__errorArgs = ['target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value=""><?php echo e(trans('update.select_target')); ?></option>

                <?php $__currentLoopData = $targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $targetKey => $targetItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $targetItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($target); ?>" class="js-target-option js-target-option-<?php echo e($targetKey); ?> <?php echo e((!empty($rule) and $rule->target_type == $targetKey) ? '' : 'd-none'); ?>" <?php if(!empty($rule) and $rule->target == $target): ?> selected <?php endif; ?>><?php echo e(trans('update.'.$target)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-none">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <?php
            $selectedCategoryIds = !empty($rule) ? $rule->categories->pluck('id')->toArray() : [];
        ?>

        <div class="form-group js-specific-categories-field <?php echo e((!empty($rule) and $rule->target == "specific_categories") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_categories')); ?></label>

            <select name="category_ids[]" id="categories" class="custom-select select2" multiple data-placeholder="<?php echo e(trans('public.choose_category')); ?>">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                        <optgroup label="<?php echo e($category->title); ?>">
                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php echo e(in_array($subCategory->id, $selectedCategoryIds) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(in_array($category->id, $selectedCategoryIds) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php $__errorArgs = ['category_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="form-group js-specific-instructors-field <?php echo e((!empty($rule) and $rule->target == "specific_instructors") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_instructors')); ?></label>

            <select name="instructor_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2"
                    data-placeholder="<?php echo e(trans('public.search_instructors')); ?>">

                <?php if(!empty($rule) and count($rule->instructors)): ?>
                    <?php $__currentLoopData = $rule->instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($instructor->id); ?>" selected><?php echo e($instructor->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['instructor_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group js-specific-sellers-field <?php echo e((!empty($rule) and $rule->target == "specific_sellers") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_sellers')); ?></label>

            <select name="seller_ids[]" multiple="multiple" data-search-option="except_user" class="form-control search-user-select2"
                    data-placeholder="<?php echo e(trans('public.search_instructors')); ?>">

                <?php if(!empty($rule) and count($rule->sellers)): ?>
                    <?php $__currentLoopData = $rule->sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($seller->id); ?>" selected><?php echo e($seller->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['seller_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="form-group js-specific-courses-field <?php echo e((!empty($rule) and $rule->target == "specific_courses") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_courses')); ?></label>
            <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2"
                    data-placeholder="Search classes">

                <?php if(!empty($rule) and count($rule->webinars)): ?>
                    <?php $__currentLoopData = $rule->webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($webinar->id); ?>" selected><?php echo e($webinar->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['webinar_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group js-specific-products-field <?php echo e((!empty($rule) and $rule->target == "specific_products") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_products')); ?></label>
            <select name="product_ids[]" multiple="multiple" class="form-control search-product-select2"
                    data-placeholder="<?php echo e(trans('update.search_product')); ?>">

                <?php if(!empty($rule) and count($rule->products)): ?>
                    <?php $__currentLoopData = $rule->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($product->id); ?>" selected><?php echo e($product->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['product_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group js-specific-bundles-field <?php echo e((!empty($rule) and $rule->target == "specific_bundles") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_bundles')); ?></label>
            <select name="bundle_ids[]" multiple="multiple" class="form-control search-bundle-select2 " data-placeholder="Search bundles">

                <?php if(!empty($rule) and count($rule->bundles)): ?>
                    <?php $__currentLoopData = $rule->bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($bundle->id); ?>" selected><?php echo e($bundle->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['bundle_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <?php
            $selectedSubscriptionPackagesIds = !empty($rule) ? $rule->subscribes->pluck('id')->toArray() : [];
        ?>
        
        <div class="form-group js-subscription-specific-packages-field <?php echo e((!empty($rule) and $rule->target_type == "subscription_packages" and $rule->target == "specific_packages") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_packages')); ?></label>
            <select name="subscribe_ids[]" multiple="multiple" class="form-control select2" data-placeholder="<?php echo e(trans('update.select_packages')); ?>">

                <?php if(!empty($subscriptionPackages) and $subscriptionPackages->count() > 0): ?>
                    <?php $__currentLoopData = $subscriptionPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptionPackage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subscriptionPackage->id); ?>" <?php echo e(in_array($subscriptionPackage->id, $selectedSubscriptionPackagesIds) ? 'selected' : ''); ?>><?php echo e($subscriptionPackage->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['subscription_packages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <?php
            $selectedRegistrationPackagesIds = !empty($rule) ? $rule->registrationPackages->pluck('id')->toArray() : [];
        ?>
        
        <div class="form-group js-registration-specific-packages-field <?php echo e((!empty($rule) and $rule->target_type == "registration_packages" and $rule->target == "specific_packages") ? '' : 'd-none'); ?>">
            <label class="input-label"><?php echo e(trans('update.specific_packages')); ?></label>
            <select name="registration_package_ids[]" multiple="multiple" class="form-control select2" data-placeholder="<?php echo e(trans('update.select_packages')); ?>">

                <?php if(!empty($registrationPackages) and $registrationPackages->count() > 0): ?>
                    <?php $__currentLoopData = $registrationPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registrationPackage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($registrationPackage->id); ?>" <?php echo e(in_array($registrationPackage->id, $selectedRegistrationPackagesIds) ? 'selected' : ''); ?>><?php echo e($registrationPackage->title); ?> (<?php echo e($registrationPackage->role); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>

            <?php $__errorArgs = ['registration_packages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\cashback\rules\create\includes\target_products.blade.php ENDPATH**/ ?>