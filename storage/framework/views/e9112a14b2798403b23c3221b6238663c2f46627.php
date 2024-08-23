<div class="wizard-step-1">
    <h3 class="font-20 text-dark font-weight-bold"><?php echo e(trans('update.meeting_type')); ?></h3>

    <span class="d-block mt-30 text-gray wizard-step-num">
        <?php echo e(trans('update.step')); ?> 2/4
    </span>

    <span class="d-block font-16 font-weight-500 mt-30"><?php echo e(trans('update.choose_the_meeting_type')); ?></span>

    <div class="form-group mt-10">
        <label class="input-label"><?php echo e(trans('update.meeting_type')); ?></label>

        <div class="d-flex align-items-center wizard-custom-radio mt-5">
            <div class="wizard-custom-radio-item">
                <input type="radio" name="meeting_type" checked value="all" id="all" class="">
                <label class="font-12 cursor-pointer" for="all"><?php echo e(trans('public.all')); ?></label>
            </div>

            <div class="wizard-custom-radio-item">
                <input type="radio" name="meeting_type" value="in_person" id="in_person" class="">
                <label class="font-12 cursor-pointer" for="in_person"><?php echo e(trans('update.in_person')); ?></label>
            </div>

            <div class="wizard-custom-radio-item">
                <input type="radio" name="meeting_type" value="online" id="online" class="">
                <label class="font-12 cursor-pointer" for="online"><?php echo e(trans('update.online')); ?></label>
            </div>
        </div>
    </div>

    <div id="regionCard" class="d-none">
        <div class="form-group mt-30">
            <label class="input-label font-weight-500"><?php echo e(trans('update.country')); ?></label>

            <select name="country_id" class="form-control">
                <option value=""><?php echo e(trans('update.select_country')); ?></option>

                <?php if(!empty($countries)): ?>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group mt-30">
            <label class="input-label font-weight-500"><?php echo e(trans('update.province')); ?></label>

            <select name="province_id" class="form-control" disabled>
                <option value=""><?php echo e(trans('update.select_province')); ?></option>
            </select>
        </div>

        <div class="form-group mt-30">
            <label class="input-label font-weight-500"><?php echo e(trans('update.city')); ?></label>

            <select name="city_id" class="form-control" disabled>
                <option value=""><?php echo e(trans('update.select_city')); ?></option>
            </select>
        </div>

        <div class="form-group mt-30">
            <label class="input-label font-weight-500"><?php echo e(trans('update.district')); ?></label>

            <select name="district_id" class="form-control" disabled>
                <option value=""><?php echo e(trans('update.select_district')); ?></option>
            </select>
        </div>
    </div>

    <div class="">
        <label class="input-label"><?php echo e(trans('update.population')); ?></label>

        <div class="d-flex align-items-center wizard-custom-radio mt-5">
            <div class="wizard-custom-radio-item">
                <input type="radio" name="population" value="all" checked id="population_all" class="">
                <label class="font-12 cursor-pointer" for="population_all"><?php echo e(trans('public.all')); ?></label>
            </div>

            <div class="wizard-custom-radio-item">
                <input type="radio" name="population" value="single" id="population_single" class="">
                <label class="font-12 cursor-pointer" for="population_single"><?php echo e(trans('update.single')); ?></label>
            </div>

            <div class="wizard-custom-radio-item">
                <input type="radio" name="population" value="group" id="population_group" class="">
                <label class="font-12 cursor-pointer" for="population_group"><?php echo e(trans('update.group')); ?></label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\wizard\step_2.blade.php ENDPATH**/ ?>