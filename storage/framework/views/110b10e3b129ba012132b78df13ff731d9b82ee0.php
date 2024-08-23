
<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">

    <div class="">
        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('public.type')); ?></h3>

        <div class="pt-10">
            <?php $__currentLoopData = ['webinar','course','text_lesson']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <label class="cursor-pointer" for="filterLanguage<?php echo e($typeOption); ?>"><?php echo e(trans('webinars.'.$typeOption)); ?></label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="type[]" id="filterLanguage<?php echo e($typeOption); ?>" value="<?php echo e($typeOption); ?>" <?php if(in_array($typeOption, request()->get('type', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                        <label class="custom-control-label" for="filterLanguage<?php echo e($typeOption); ?>"></label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="mt-25 pt-25 border-top border-gray300">
        <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('site.more_options')); ?></h3>

        <div class="pt-10">
            <?php $__currentLoopData = ['supported_courses', 'quiz_included', 'certificate_included']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moreOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex align-items-center justify-content-between mt-20">
                    <label class="cursor-pointer" for="filterLanguage<?php echo e($moreOption); ?>"><?php echo e(trans('update.show_only_'.$moreOption)); ?></label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="moreOptions[]" id="filterLanguage<?php echo e($moreOption); ?>" value="<?php echo e($moreOption); ?>" <?php if(in_array($moreOption, request()->get('moreOptions', []))): ?> checked="checked" <?php endif; ?> class="custom-control-input">
                        <label class="custom-control-label" for="filterLanguage<?php echo e($moreOption); ?>"></label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-primary btn-block mt-30"><?php echo e(trans('site.filter_items')); ?></button>
</div>

<?php
    $urlParams = request()->all();
?>

<?php if(!empty($categoriesLists)): ?>
    <?php if(!empty($selectedCategory)): ?>
        <input type="hidden" name="category_id" value="<?php echo e($selectedCategory->id); ?>">
    <?php endif; ?>

    <div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">

        <div class="">
            <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('categories.categories')); ?></h3>

            <div class="pt-10">
                <?php $__currentLoopData = $categoriesLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($categoryItem->subCategories) and count($categoryItem->subCategories)): ?>

                        <span class="d-block font-14 font-weight-bold  mt-20"><?php echo e($categoryItem->title); ?></span>

                        <div class="pl-10">
                            <?php $__currentLoopData = $categoryItem->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $urlParams['category_id'] = $subCategory->id;
                                ?>

                                <a href="/upcoming_courses?<?php echo e(http_build_query($urlParams)); ?>" class="d-flex align-items-center font-14 font-weight-normal mt-20 <?php echo e((!empty($selectedCategory) and $selectedCategory->id == $subCategory->id) ? 'text-primary' : ''); ?>">
                                    <?php if(!empty($selectedCategory) and $selectedCategory->id == $subCategory->id): ?>
                                        <i data-feather="chevron-right" width="20" height="20" class="mr-5"></i>
                                    <?php endif; ?>

                                    <span><?php echo e($subCategory->title); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <?php
                            $urlParams['category_id'] = $categoryItem->id;
                        ?>

                        <a href="/upcoming_courses?<?php echo e(http_build_query($urlParams)); ?>" class="d-flex align-items-center font-14 font-weight-bold mt-20 <?php echo e((!empty($selectedCategory) and $selectedCategory->id == $categoryItem->id) ? 'text-primary' : ''); ?>">
                            <?php if(!empty($selectedCategory) and $selectedCategory->id == $categoryItem->id): ?>
                                <i data-feather="chevron-right" width="20" height="20" class="mr-5"></i>
                            <?php endif; ?>

                            <span><?php echo e($categoryItem->title); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($selectedCategory) and !empty($selectedCategory->filters)): ?>
    <div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">

        <?php $__currentLoopData = $selectedCategory->filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mt-25 pt-25 border-top border-gray300">
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
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\upcoming_courses\includes\right_filters.blade.php ENDPATH**/ ?>