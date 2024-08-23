
<div class="wizard-step-1">
    <h3 class="font-20 text-dark font-weight-bold"><?php echo e(trans('update.your_skill_level')); ?></h3>

    <span class="d-block mt-30 text-gray wizard-step-num">
        <?php echo e(trans('update.step')); ?> 3/4
    </span>

    <div class="form-group mt-30">
        <label class="input-label font-weight-500"><?php echo e(trans('update.which_skill_level_do_you_want_to_learn')); ?></label>

        <select name="level_of_training" class="form-control mt-20">
            <option value="beginner" <?php echo e((request()->get('level_of_training') == 'beginner') ? 'selected' : ''); ?>><?php echo e(trans('update.beginner')); ?></option>
            <option value="middle" <?php echo e((empty(request()->get('level_of_training')) or request()->get('level_of_training') == 'middle') ? 'selected' : ''); ?>><?php echo e(trans('update.middle')); ?></option>
            <option value="expert" <?php echo e((request()->get('level_of_training') == 'expert') ? 'selected' : ''); ?>><?php echo e(trans('update.expert')); ?></option>
        </select>
    </div>

</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\instructorFinder\wizard\step_3.blade.php ENDPATH**/ ?>