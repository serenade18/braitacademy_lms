<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
    <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('update.filters')); ?></h3>

    <div class="form-group mt-20">
        <label for="category_id"><?php echo e(trans('public.category')); ?></label>

        <select name="category_id" id="category_id" class="form-control">
            <option value=""><?php echo e(trans('webinars.select_category')); ?></option>

            <?php if(!empty($categories)): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                        <optgroup label="<?php echo e($category->title); ?>">
                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subCategory->id); ?>" <?php if(request()->get('category_id') == $subCategory->id): ?> selected="selected" <?php endif; ?>><?php echo e($subCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>" <?php if(request()->get('category_id') == $category->id): ?> selected="selected" <?php endif; ?>><?php echo e($category->title); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="level_of_training"><?php echo e(trans('update.student_level')); ?></label>

        <select name="level_of_training" class="form-control">
            <option value=""><?php echo e(trans('update.not_preferenced')); ?></option>
            <option value="beginner" <?php echo e((request()->get('level_of_training') == 'beginner') ? 'selected' : ''); ?>><?php echo e(trans('update.beginner')); ?></option>
            <option value="middle" <?php echo e((request()->get('level_of_training') == 'middle') ? 'selected' : ''); ?>><?php echo e(trans('update.middle')); ?></option>
            <option value="expert" <?php echo e((request()->get('level_of_training') == 'expert') ? 'selected' : ''); ?>><?php echo e(trans('update.expert')); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="gender"><?php echo e(trans('update.instructor_gender')); ?></label>

        <select name="gender" id="gender" class="form-control">
            <option value=""><?php echo e(trans('update.not_preferenced')); ?></option>

            <option value="man" <?php echo e((request()->get('gender') == 'man') ? 'selected' : ''); ?>><?php echo e(trans('update.man')); ?></option>
            <option value="woman" <?php echo e((request()->get('gender') == 'woman') ? 'selected' : ''); ?>><?php echo e(trans('update.woman')); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="instructor_type"><?php echo e(trans('update.instructor_type')); ?></label>

        <select name="role" id="instructor_type" class="form-control">
            <option value=""><?php echo e(trans('update.not_preferenced')); ?></option>
            <option value="<?php echo e(\App\Models\Role::$teacher); ?>" <?php echo e((request()->get('role') == \App\Models\Role::$teacher) ? 'selected' : ''); ?>><?php echo e(trans('public.instructor')); ?></option>
            <option value="<?php echo e(\App\Models\Role::$organization); ?>" <?php echo e((request()->get('role') == \App\Models\Role::$organization) ? 'selected' : ''); ?>><?php echo e(trans('home.organization')); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label class="input-label"><?php echo e(trans('update.meeting_type')); ?></label>

        <div class="d-flex align-items-center wizard-custom-radio mt-5">
            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="meeting_type" value="all" id="all" class="" <?php echo e((request()->get('meeting_type') == 'all') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="all"><?php echo e(trans('public.all')); ?></label>
            </div>

            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="meeting_type" value="in_person" id="in_person" class="" <?php echo e((request()->get('meeting_type') == 'in_person') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="in_person"><?php echo e(trans('update.in_person')); ?></label>
            </div>

            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="meeting_type" value="online" id="online" class="" <?php echo e((request()->get('meeting_type') == 'online') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="online"><?php echo e(trans('update.online')); ?></label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="input-label"><?php echo e(trans('update.population')); ?></label>

        <div class="d-flex align-items-center wizard-custom-radio mt-5">
            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="population" value="all" id="population_all" class="" <?php echo e((request()->get('population') == 'all') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="population_all"><?php echo e(trans('public.all')); ?></label>
            </div>

            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="population" value="single" id="population_single" class="" <?php echo e((request()->get('population') == 'single') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="population_single"><?php echo e(trans('update.single')); ?></label>
            </div>

            <div class="wizard-custom-radio-item flex-grow-1">
                <input type="radio" name="population" value="group" id="population_group" class="" <?php echo e((request()->get('population') == 'group') ? 'checked' : ''); ?>>
                <label class="font-12 cursor-pointer px-15 py-10" for="population_group"><?php echo e(trans('update.group')); ?></label>
            </div>
        </div>
    </div>

    <div class="form-group pb-20">
        <label class="form-label"><?php echo e(trans('update.price_range')); ?></label>
        <div
            class="range wrunner-value-bottom"
            id="priceRange"
            data-minLimit="0"
            data-maxLimit="1000"
        >
            <input type="hidden" name="min_price" value="<?php echo e(request()->get('min_price') ?? null); ?>">
            <input type="hidden" name="max_price" value="<?php echo e(request()->get('max_price') ?? null); ?>">
        </div>
    </div>

    <div class="form-group pb-20">
        <label class="form-label"><?php echo e(trans('update.instructor_age')); ?></label>
        <div
            class="range wrunner-value-bottom"
            id="instructorAgeRange"
            data-minLimit="0"
            data-maxLimit="100"
        >
            <input type="hidden" name="min_age" value="<?php echo e(request()->get('min_age') ?? null); ?>">
            <input type="hidden" name="max_age" value="<?php echo e(request()->get('max_age') ?? null); ?>">
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\components\filters.blade.php ENDPATH**/ ?>