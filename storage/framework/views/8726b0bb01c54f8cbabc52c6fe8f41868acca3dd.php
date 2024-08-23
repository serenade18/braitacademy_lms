<div class="" id="relatedCourseModal">
    <h3 class="section-title after-line font-20 text-dark-blue mb-25"><?php echo e(trans('update.add_new_related_courses')); ?></h3>

    <div class="js-related-course-form" data-action="<?php echo e(getAdminPanelUrl("/relatedCourses/").(!empty($relatedCourse) ? $relatedCourse->id.'/update' : 'store')); ?>" >
        <input type="hidden" name="item_id" value="<?php echo e($itemId); ?>">
        <input type="hidden" name="item_type" value="<?php echo e($itemType); ?>">

        <div class="form-group mt-15">
            <label class="input-label d-block"><?php echo e(trans('update.select_related_courses')); ?></label>
            <select name="course_id" class="js-ajax-course_id form-control related-course-select2" data-placeholder="<?php echo e(trans('update.search_courses')); ?>">
                <?php if(!empty($relatedCourse) and !empty($relatedCourse->course)): ?>
                    <option selected value="<?php echo e($relatedCourse->course->id); ?>"><?php echo e($relatedCourse->course->title .' - '. $relatedCourse->course->teacher->full_name); ?></option>
                <?php endif; ?>
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mt-30 d-flex align-items-center justify-content-end">
            <button type="button" id="saveRelateCourse" class="btn btn-primary"><?php echo e(trans('public.save')); ?></button>
            <button type="button" class="btn btn-danger ml-2 close-swl"><?php echo e(trans('public.close')); ?></button>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\relatedCourse\related_course_modal.blade.php ENDPATH**/ ?>