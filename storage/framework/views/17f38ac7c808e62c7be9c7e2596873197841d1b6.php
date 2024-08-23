<li data-id="<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="relatedCourse_<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapseRelatedCourse<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" aria-controls="collapseRelatedCourse<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" data-parent="#relatedCoursesAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span><?php echo e((!empty($relatedCourse) and !empty($relatedCourse->course)) ? $relatedCourse->course->title .' - '. $relatedCourse->course->teacher->full_name : trans('update.add_new_related_courses')); ?></span>
        </div>

        <div class="d-flex align-items-center">
            

            <?php if(!empty($relatedCourse)): ?>
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/relatedCourses/<?php echo e($relatedCourse->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseRelatedCourse<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" aria-controls="collapseRelatedCourse<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" data-parent="#relatedCoursesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseRelatedCourse<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" aria-labelledby="relatedCourse_<?php echo e(!empty($relatedCourse) ? $relatedCourse->id :'record'); ?>" class=" collapse <?php if(empty($relatedCourse)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="related-course-form" data-action="/panel/relatedCourses/<?php echo e(!empty($relatedCourse) ? $relatedCourse->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($relatedCourse) ? $relatedCourse->id : 'new'); ?>][item_id]" value="<?php echo e($webinar->id); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($relatedCourse) ? $relatedCourse->id : 'new'); ?>][item_type]" value="webinar">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group mt-15">
                            <label class="input-label d-block"><?php echo e(trans('update.select_related_courses')); ?></label>
                            <select name="ajax[<?php echo e(!empty($relatedCourse) ? $relatedCourse->id : 'new'); ?>][course_id]" class="js-ajax-course_id form-control <?php if(!empty($relatedCourse)): ?> panel-search-webinar-select2 <?php else: ?> relatedCourses-select2 <?php endif; ?>" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" data-placeholder="<?php echo e(trans('update.search_courses')); ?>">
                                <?php if(!empty($relatedCourse) and !empty($relatedCourse->course)): ?>
                                    <option selected value="<?php echo e($relatedCourse->course->id); ?>"><?php echo e($relatedCourse->course->title .' - '. $relatedCourse->course->teacher->full_name); ?></option>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-related-course btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($relatedCourse)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\webinar\create_includes\accordions\related_courses.blade.php ENDPATH**/ ?>