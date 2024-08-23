<div class="mt-20 p-20 rounded-sm shadow-lg border border-gray300 filters-container">
    <h3 class="category-filter-title font-20 font-weight-bold text-dark-blue"><?php echo e(trans('update.location')); ?></h3>

    <div class="form-group mt-20">
        <label class="input-label font-weight-500"><?php echo e(trans('update.country')); ?></label>

        <select name="country_id" class="form-control">
            <option value=""><?php echo e(trans('update.select_country')); ?></option>

            <?php if(!empty($countries)): ?>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php echo e((request()->get('country_id') == $country->id) ? 'selected' : ''); ?>><?php echo e($country->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group mt-10">
        <label class="input-label font-weight-500"><?php echo e(trans('update.province')); ?></label>

        <select name="province_id" class="form-control" <?php echo e(empty($provinces) ? 'disabled' : ''); ?>>
            <option value=""><?php echo e(trans('update.select_province')); ?></option>

            <?php if(!empty($provinces)): ?>
                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($province->id); ?>" <?php echo e((request()->get('province_id') == $province->id) ? 'selected' : ''); ?>><?php echo e($province->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group mt-10">
        <label class="input-label font-weight-500"><?php echo e(trans('update.city')); ?></label>

        <select name="city_id" class="form-control" <?php echo e(empty($cities) ? 'disabled' : ''); ?>>
            <option value=""><?php echo e(trans('update.select_city')); ?></option>

            <?php if(!empty($cities)): ?>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($city->id); ?>" <?php echo e((request()->get('city_id') == $city->id) ? 'selected' : ''); ?>><?php echo e($city->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group mt-10">
        <label class="input-label font-weight-500"><?php echo e(trans('update.district')); ?></label>

        <select name="district_id" class="form-control" <?php echo e(empty($districts) ? 'disabled' : ''); ?>>
            <option value=""><?php echo e(trans('update.select_district')); ?></option>

            <?php if(!empty($districts)): ?>
                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($district->id); ?>" <?php echo e((request()->get('district_id') == $district->id) ? 'selected' : ''); ?>><?php echo e($district->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\components\location_filters.blade.php ENDPATH**/ ?>