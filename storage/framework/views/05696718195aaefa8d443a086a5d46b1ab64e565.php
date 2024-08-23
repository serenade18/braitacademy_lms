<div id="upcomingAssignCourseModal" class="" data-action="/panel/upcoming_courses/<?php echo e($upcomingCourse->id); ?>/assign-course">
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('update.assign_published_course')); ?></h2>

        <div class="mt-20">
            <input type="hidden" name="upcoming_id" value="<?php echo e($upcomingCourse->id); ?>">

            <div class="form-group">
                <label class="input-label"><?php echo e(trans('product.course')); ?></label>
                <select name="course" class="js-ajax-course form-control js-select2">
                    <option value=""><?php echo e(trans('update.select_a_course')); ?></option>
                    <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($webinar->id); ?>"><?php echo e($webinar->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback d-block"></div>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-20">
                <button type="button" class="js-save-assign-course btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\upcoming_courses\assign_course_modal.blade.php ENDPATH**/ ?>