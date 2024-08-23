<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
<?php $__env->stopPush(); ?>

<div class="row">
    <div class="col-12 col-md-6 mt-15">

        <?php if(!empty(getCertificateMainSettings("status"))): ?>
            <div class="form-group mt-30">
                <div class="d-flex align-items-center justify-content-between">
                    <label class="cursor-pointer input-label" for="certificateSwitch"><?php echo e(trans('update.bundle_completion_certificate')); ?></label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="certificate" class="custom-control-input" id="certificateSwitch" <?php echo e(((!empty($bundle) && $bundle->certificate) or old('certificate') == 'on') ? 'checked' :  ''); ?>>
                        <label class="custom-control-label" for="certificateSwitch"></label>
                    </div>
                </div>

                <p class="mt-10 font-12 text-gray">- <?php echo e(trans('update.bundle_completion_certificate_hint')); ?></p>
            </div>
        <?php endif; ?>


        <div class="form-group mt-15">
            <label class="input-label d-block"><?php echo e(trans('public.tags')); ?></label>
            <input type="text" name="tags" data-max-tag="5" value="<?php echo e(!empty($bundle) ? implode(',',$bundleTags) : ''); ?>" class="form-control inputtags" placeholder="<?php echo e(trans('public.type_tag_name_and_press_enter')); ?> (<?php echo e(trans('forms.max')); ?> : 5)"/>
        </div>


        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.category')); ?></label>

            <select id="categories" class="custom-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" required>
                <option <?php echo e((!empty($bundle) and !empty($bundle->category_id)) ? '' : 'selected'); ?> disabled><?php echo e(trans('public.choose_category')); ?></option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->subCategories) and $category->subCategories->count() > 0): ?>
                        <optgroup label="<?php echo e($category->title); ?>">
                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php echo e(((!empty($bundle) and $bundle->category_id == $subCategory->id) or old('category_id') == $subCategory->id) ? 'selected' : ''); ?>><?php echo e($subCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(((!empty($bundle) and $bundle->category_id == $category->id) or old('category_id') == $category->id) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
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
</div>

<div class="form-group mt-15 <?php echo e((!empty($bundleCategoryFilters) and count($bundleCategoryFilters)) ? '' : 'd-none'); ?>" id="categoriesFiltersContainer">
    <span class="input-label d-block"><?php echo e(trans('public.category_filters')); ?></span>
    <div id="categoriesFiltersCard" class="row mt-20">

        <?php if(!empty($bundleCategoryFilters) and count($bundleCategoryFilters)): ?>
            <?php $__currentLoopData = $bundleCategoryFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-3">
                    <div class="webinar-category-filters">
                        <strong class="category-filter-title d-block"><?php echo e($filter->title); ?></strong>
                        <div class="py-10"></div>

                        <?php
                            $bundleFilterOptions = $bundle->filterOptions->pluck('filter_option_id')->toArray();

                            if (!empty(old('filters'))) {
                                $bundleFilterOptions = array_merge($bundleFilterOptions, old('filters'));
                            }
                        ?>

                        <?php $__currentLoopData = $filter->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group mt-10 d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer font-14 text-gray" for="filterOptions<?php echo e($option->id); ?>"><?php echo e($option->title); ?></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="filters[]" value="<?php echo e($option->id); ?>" <?php echo e(((!empty($bundleFilterOptions) && in_array($option->id, $bundleFilterOptions)) ? 'checked' : '')); ?> class="custom-control-input" id="filterOptions<?php echo e($option->id); ?>">
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

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\step_2.blade.php ENDPATH**/ ?>