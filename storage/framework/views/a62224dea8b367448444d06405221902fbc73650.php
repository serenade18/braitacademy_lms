<?php if(!empty($authUser) and ($authUser->isOrganization() or $authUser->isTeacher())): ?>
    <a href="/panel/store/products/new" class="mt-20 btn btn-primary btn-flex align-items-center w-100">
        <i data-feather="shopping-bag" width="20" height="20" class="mr-5"></i>
        <span><?php echo e(trans('update.add_new_product')); ?></span>
    </a>
<?php endif; ?>

<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
    <div class="">
        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('public.type')); ?></h3>

        <div class="pt-10">
            <?php $__currentLoopData = ['virtual','physical']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <label class="cursor-pointer" for="filterTypes<?php echo e($typeOption); ?>"><?php echo e(trans('update.product_type_'.$typeOption)); ?></label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="type[]" id="filterTypes<?php echo e($typeOption); ?>" value="<?php echo e($typeOption); ?>" <?php if(in_array($typeOption, request()->get('type', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                        <label class="custom-control-label" for="filterTypes<?php echo e($typeOption); ?>"></label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-primary btn-block mt-30"><?php echo e(trans('site.filter_items')); ?></button>
</div>


<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
    <div class="">
        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('update.options')); ?></h3>

        <div class="pt-10">

            <div class="d-flex align-items-center justify-content-between mt-20">
                <label class="cursor-pointer" for="filterOptionsOnlyAvailableProducts"><?php echo e(trans('update.only_available_products')); ?></label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="options[]" id="filterOptionsOnlyAvailableProducts" value="only_available" <?php if(in_array('only_available', request()->get('options', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                    <label class="custom-control-label" for="filterOptionsOnlyAvailableProducts"></label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-20">
                <label class="cursor-pointer" for="filterOptionsWithPoint"><?php echo e(trans('update.products_with_points')); ?></label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="options[]" id="filterOptionsWithPoint" value="with_point" <?php if(in_array('with_point', request()->get('options', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                    <label class="custom-control-label" for="filterOptionsWithPoint"></label>
                </div>
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-primary btn-block mt-30"><?php echo e(trans('site.filter_items')); ?></button>
</div>

<?php if(!empty($productCategories)): ?>
    <?php if(!empty($selectedCategory)): ?>
        <input type="hidden" name="category_id" value="<?php echo e($selectedCategory->id); ?>">
    <?php endif; ?>

    <div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">

        <div class="">
            <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('categories.categories')); ?></h3>

            <div class="pt-10">
                <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($productCategory->subCategories) and count($productCategory->subCategories)): ?>

                        <span class="d-block font-14 font-weight-bold  mt-20"><?php echo e($productCategory->title); ?></span>

                        <div class="pl-10">
                            <?php $__currentLoopData = $productCategory->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($subCategory->getUrl()); ?>" class="d-flex align-items-center font-14 font-weight-normal mt-20 <?php echo e((!empty($selectedCategory) and $selectedCategory->id == $subCategory->id) ? 'text-primary' : ''); ?>">
                                    <?php if(!empty($selectedCategory) and $selectedCategory->id == $subCategory->id): ?>
                                        <i data-feather="chevron-right" width="20" height="20" class="mr-5"></i>
                                    <?php endif; ?>

                                    <span><?php echo e($subCategory->title); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e($productCategory->getUrl()); ?>" class="d-flex align-items-center font-14 font-weight-bold mt-20 <?php echo e((!empty($selectedCategory) and $selectedCategory->id == $productCategory->id) ? 'text-primary' : ''); ?>">
                            <?php if(!empty($selectedCategory) and $selectedCategory->id == $productCategory->id): ?>
                                <i data-feather="chevron-right" width="20" height="20" class="mr-5"></i>
                            <?php endif; ?>

                            <span><?php echo e($productCategory->title); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($selectedCategory) and !empty($selectedCategory->filters) and count($selectedCategory->filters)): ?>
    <div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
        <?php $__currentLoopData = $selectedCategory->filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="<?php echo e(($loop->iteration > 1) ? 'border-gray300 border-top mt-25 pt-25' : ''); ?>">
                <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e($filter->title); ?></h3>

                <?php if(!empty($filter->options)): ?>
                    <div class="pt-10">
                        <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center justify-content-between mt-20">
                                <label class="cursor-pointer" for="filterLanguage<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="filter_option[]" id="filterLanguage<?php echo e($option->id); ?>" value="<?php echo e($option->id); ?>" <?php if(in_array($option->id, request()->get('filter_option', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                                    <label class="custom-control-label" for="filterLanguage<?php echo e($option->id); ?>"></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button type="submit" class="btn btn-sm btn-primary btn-block mt-30"><?php echo e(trans('site.filter_items')); ?></button>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\includes\right_filters.blade.php ENDPATH**/ ?>