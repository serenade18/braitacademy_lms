<section>
    <h2 class="section-title after-line mt-2 mb-4"><?php echo e(trans('public.category')); ?></h2>

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
                            <div class="col-12 col-md-3 mt-3">
                                <div class="webinar-category-filters">
                                    <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                                    <div class="py-2"></div>

                                    <?php
                                        $productFilterOptions = $product->selectedFilterOptions->pluck('filter_option_id')->toArray();

                                        if (!empty(old('filters'))) {
                                            $productFilterOptions = array_merge($productFilterOptions, old('filters'));
                                        }
                                    ?>

                                    <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group d-flex align-items-center justify-content-between">
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

        
        <div class="col-12 mt-20">
            <?php echo $__env->make('admin.webinars.relatedCourse.add_related_course', [
                    'relatedCourseItemId' => $product->id,
                     'relatedCourseItemType' => 'product',
                     'relatedCourses' => $product->relatedCourses
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>


        <div class="col-12 mt-20">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section-title after-line"><?php echo e(trans('update.specifications')); ?></h2>

                <div class="px-2 mt-3">
                    <button type="button" id="productAddSpecification" class="btn btn-primary btn-sm"><?php echo e(trans('update.new_specification')); ?></button>
                </div>
            </div>

            <div class="accordion-content-wrapper mt-15" id="specificationsAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($product->selectedSpecifications) and count($product->selectedSpecifications)): ?>
                    <div>
                        <?php $__currentLoopData = $product->selectedSpecifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedSpecificationRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('admin.store.products.create.accordions.specification',['selectedSpecification' => $selectedSpecificationRow], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'files.png',
                        'title' => trans('update.specifications_no_result'),
                        'hint' => trans('update.specifications_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div id="newSpecificationForm" class="d-none">
                <?php echo $__env->make('admin.store.products.create.accordions.specification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>

                <div class="px-2 mt-3">
                    <button type="button" id="productAddFAQ" class="btn btn-primary btn-sm mt-10"><?php echo e(trans('webinars.add_new_faqs')); ?></button>
                </div>
            </div>

            <div class="accordion-content-wrapper mt-15" id="faqsAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($product->faqs) and count($product->faqs)): ?>
                    <div>
                        <?php $__currentLoopData = $product->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('admin.store.products.create.accordions.faq',['faq' => $faqRow], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'faq.png',
                        'title' => trans('update.product_faq_no_result'),
                        'hint' => trans('update.product_faq_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div id="newFaqForm" class="d-none">
                <?php echo $__env->make('admin.store.products.create.accordions.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\create\category_and_specification.blade.php ENDPATH**/ ?>