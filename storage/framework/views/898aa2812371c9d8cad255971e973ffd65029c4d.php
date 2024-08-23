<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-12 col-md-6 mt-15">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.price')); ?> (<?php echo e($currency); ?>)</label>
            <input type="number" name="price" value="<?php echo e((!empty($product) and !empty($product->price)) ? convertPriceToUserCurrency($product->price) : old('price')); ?>" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
            <?php $__errorArgs = ['price'];
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

        <?php if($product->isPhysical()): ?>
            <div class="form-group">
                <label class="input-label"><?php echo e(trans('update.delivery_fee')); ?> (<?php echo e(currencySign()); ?>)</label>
                <input type="number" name="delivery_fee" value="<?php echo e((!empty($product) and !empty($product->delivery_fee)) ? convertPriceToUserCurrency($product->delivery_fee) : old('delivery_fee')); ?>" class="form-control <?php $__errorArgs = ['delivery_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('public.0_for_free')); ?>"/>
                <?php $__errorArgs = ['delivery_fee'];
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
                <label class="input-label"><?php echo e(trans('update.delivery_estimated_time')); ?> (<?php echo e(trans('public.day')); ?>)</label>
                <input type="number" name="delivery_estimated_time" value="<?php echo e(!empty($product) ? $product->delivery_estimated_time : old('delivery_estimated_time')); ?>" class="form-control <?php $__errorArgs = ['delivery_estimated_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
                <?php $__errorArgs = ['delivery_estimated_time'];
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
        <?php endif; ?>

        <div class="form-group js-inventory-inputs <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'd-none' : ''); ?>">
            <label class="input-label"><?php echo e(trans('update.inventory')); ?></label>
            <input type="number" name="inventory" value="<?php echo e((!empty($product) and $product->getAvailability() != 99999) ? $product->getAvailability() : old('inventory')); ?>" class="form-control <?php $__errorArgs = ['inventory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <?php $__errorArgs = ['inventory'];
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

        <div class="form-group js-inventory-inputs <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'd-none' : ''); ?>">
            <label class="input-label"><?php echo e(trans('update.inventory_warning')); ?></label>
            <input type="number" name="inventory_warning" value="<?php echo e(!empty($product) ? $product->inventory_warning : old('inventory_warning')); ?>" class="form-control <?php $__errorArgs = ['inventory_warning'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=""/>
            <?php $__errorArgs = ['inventory_warning'];
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

        <div class="form-group mt-30 mb-10 d-flex align-items-center">
            <label class="cursor-pointer mb-0 input-label" for="unlimitedInventorySwitch"><?php echo e(trans('update.unlimited_inventory')); ?></label>
            <div class="ml-30 custom-control custom-switch">
                <input type="checkbox" name="unlimited_inventory" class="custom-control-input" id="unlimitedInventorySwitch" <?php echo e((!empty($product) and $product->unlimited_inventory) ? 'checked' :  ''); ?>>
                <label class="custom-control-label" for="unlimitedInventorySwitch"></label>
            </div>
        </div>
        <p class="text-gray font-12"><?php echo e(trans('update.create_product_unlimited_inventory_hint')); ?></p>

    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 mt-30">

        <div class="form-group">
            <label class="input-label"><?php echo e(trans('public.category')); ?></label>

            <select id="categories" class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required>
                <option <?php echo e((!empty($product) and !empty($product->category_id)) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($productCategory->subCategories) and $productCategory->subCategories->count() > 0): ?>
                        <optgroup label="<?php echo e($productCategory->title); ?>">
                            <?php $__currentLoopData = $productCategory->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php echo e(((!empty($product) and $product->category_id == $subCategory->id) or old('category_id') == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo e($productCategory->id); ?>" <?php echo e(((!empty($product) and $product->category_id == $productCategory->id) or old('category_id') == $productCategory->id) ? 'selected' : ''); ?>><?php echo e($productCategory->title); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category_id'];
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

    <div class="col-12 mt-20">
        <div class="form-group <?php echo e((!empty($productCategoryFilters) and count($productCategoryFilters)) ? '' : 'd-none'); ?>" id="categoriesFiltersContainer">
            <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
            <div id="categoriesFiltersCard" class="row">

                <?php if(!empty($productCategoryFilters) and count($productCategoryFilters)): ?>
                    <?php $__currentLoopData = $productCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-3 mt-20">
                            <div class="webinar-category-filters">
                                <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                                <div class="py-10"></div>

                                <?php
                                    $productFilterOptions = $product->selectedFilterOptions->pluck('filter_option_id')->toArray();

                                    if (!empty(old('filters'))) {
                                        $productFilterOptions = array_merge($productFilterOptions, old('filters'));
                                    }
                                ?>

                                <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group mt-10 d-flex align-items-center justify-content-between">
                                        <label class="cursor-pointer font-14 text-gray" for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="filters[]" value="<?php echo e($option->id); ?>" <?php echo e(((!empty($productFilterOptions) && in_array($option->id, $productFilterOptions)) ? 'checked' : '')); ?> class="custom-control-input" id="filterOptions<?php echo e($option->id); ?>">
                                            <label class="custom-control-label" for="filterOptions<?php echo e($option->id); ?>"></label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button id="webinarAddRelatedCourses" data-bundle-id="<?php echo e($product->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('update.add_related_courses')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="relatedCoursesAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($product->relatedCourses) and count($product->relatedCourses)): ?>
                    <ul class="draggable-lists" data-order-table="relatedCourses">
                        <?php $__currentLoopData = $product->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourseInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.store.products.create_includes.accordions.related_courses',['product' => $product,'relatedCourse' => $relatedCourseInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'comment.png',
                        'title' => trans('update.related_courses_no_result'),
                        'hint' => trans('update.related_courses_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="newRelatedCourseForm" class="d-none">
    <?php echo $__env->make('web.default.panel.store.products.create_includes.accordions.related_courses',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/panel/webinar.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\store\products\create_includes\step_2.blade.php ENDPATH**/ ?>