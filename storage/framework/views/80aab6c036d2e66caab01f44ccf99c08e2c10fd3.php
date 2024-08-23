<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button id="upcomingCourseAddFAQ" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('public.add_faq')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="faqsAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($upcomingCourse->faqs) and count($upcomingCourse->faqs)): ?>
                    <ul class="draggable-lists draggable-content-lists js-draggable-faq-lists" data-order-table="faqs" data-drag-class="js-draggable-faq-lists">
                        <?php $__currentLoopData = $upcomingCourse->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.faq',['upcomingCourse' => $upcomingCourse, 'faq' => $faqInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'faq.png',
                        'title' => trans('public.faq_no_result'),
                        'hint' => trans('public.faq_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="newFaqForm" class="d-none">
    <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.faq',['upcomingCourse' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__currentLoopData = \App\Models\WebinarExtraDescription::$types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingCourseExtraDescriptionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="mt-50">
        <div class="">
            <h2 class="section-title after-line"><?php echo e(trans('update.'.$upcomingCourseExtraDescriptionType)); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
        </div>

        <button id="add_new_<?php echo e($upcomingCourseExtraDescriptionType); ?>" data-webinar-id="<?php echo e($upcomingCourse->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('update.add_'.$upcomingCourseExtraDescriptionType)); ?></button>

        <div class="row mt-10">
            <div class="col-12">

                <?php
                    $upcomingCourseExtraDescriptionValues = $upcomingCourse->extraDescriptions->where('type',$upcomingCourseExtraDescriptionType);
                ?>

                <div class="accordion-content-wrapper mt-15" id="<?php echo e($upcomingCourseExtraDescriptionType); ?>_accordion" role="tablist" aria-multiselectable="true">
                    <?php if(!empty($upcomingCourseExtraDescriptionValues) and count($upcomingCourseExtraDescriptionValues)): ?>
                        <ul class="draggable-content-lists draggable-lists-<?php echo e($upcomingCourseExtraDescriptionType); ?>" data-drag-class="draggable-lists-<?php echo e($upcomingCourseExtraDescriptionType); ?>" data-order-table="webinar_extra_descriptions_<?php echo e($upcomingCourseExtraDescriptionType); ?>">
                            <?php $__currentLoopData = $upcomingCourseExtraDescriptionValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learningMaterialInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.extra_description',
                                    [
                                        'upcomingCourse' => $upcomingCourse,
                                        'extraDescription' => $learningMaterialInfo,
                                        'extraDescriptionType' => $upcomingCourseExtraDescriptionType,
                                        'extraDescriptionParentAccordion' => $upcomingCourseExtraDescriptionType.'_accordion',
                                    ]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                            'file_name' => 'faq.png',
                            'title' => trans("update.{$upcomingCourseExtraDescriptionType}_no_result"),
                            'hint' => trans("update.{$upcomingCourseExtraDescriptionType}_no_result_hint"),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div id="new_<?php echo e($upcomingCourseExtraDescriptionType); ?>_html" class="d-none">
        <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.extra_description',
            [
                'upcomingCourse' => $upcomingCourse,
                'extraDescriptionType' => $upcomingCourseExtraDescriptionType,
                'extraDescriptionParentAccordion' => $upcomingCourseExtraDescriptionType.'_accordion',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button id="webinarAddRelatedCourses" data-bundle-id="<?php echo e($upcomingCourse->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('update.add_related_courses')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="relatedCoursesAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($upcomingCourse->relatedCourses) and count($upcomingCourse->relatedCourses)): ?>
                    <ul class="draggable-lists" data-order-table="relatedCourses">
                        <?php $__currentLoopData = $upcomingCourse->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourseInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.related_courses',['upcomingCourse' => $upcomingCourse,'relatedCourse' => $relatedCourseInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'comment.png',
                        'title' => trans('update.related_courses_no_result'),
                        'hint' => trans('update.related_courses_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="newRelatedCourseForm" class="d-none">
    <?php echo $__env->make('web.default.panel.upcoming_courses.create_includes.accordions.related_courses',['upcomingCourse' => $upcomingCourse], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/panel/webinar.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\upcoming_courses\create_includes\step_3.blade.php ENDPATH**/ ?>