<?php if(!empty($upcomingCourse->webinar_id)): ?>
    <div class="d-flex align-items-center mt-20 p-15 success-transparent-alert">
        <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
            <i data-feather="check-circle" width="18" height="18" class=""></i>
        </div>
        <div class="ml-10">
            <div class="font-14 font-weight-bold "><?php echo e(trans('update.course_published')); ?></div>
            <div class="font-12 "><?php echo e(trans('update.this_course_was_published_already_and_you_can_check_the_main_course')); ?></div>
        </div>
    </div>

    <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $upcomingCourse->webinar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php
    $learningMaterialsExtraDescription = !empty($upcomingCourse->extraDescriptions) ? $upcomingCourse->extraDescriptions->where('type','learning_materials') : null;
    $companyLogosExtraDescription = !empty($upcomingCourse->extraDescriptions) ? $upcomingCourse->extraDescriptions->where('type','company_logos') : null;
    $requirementsExtraDescription = !empty($upcomingCourse->extraDescriptions) ? $upcomingCourse->extraDescriptions->where('type','requirements') : null;
?>

<?php if(!empty($learningMaterialsExtraDescription) and count($learningMaterialsExtraDescription)): ?>
    <div class="mt-20 rounded-sm border bg-info-light p-15">
        <h3 class="font-16 text-secondary font-weight-bold mb-15"><?php echo e(trans('update.what_you_will_learn')); ?></h3>

        <?php $__currentLoopData = $learningMaterialsExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learningMaterial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="d-flex align-items-start font-14 text-gray mt-10">
                <i data-feather="check" width="18" height="18" class="mr-10 webinar-extra-description-check-icon"></i>
                <span class=""><?php echo e($learningMaterial->value); ?></span>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


<?php if($upcomingCourse->description): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('update.course_description')); ?></h2>
        <div class="mt-15 course-description">
            <?php echo clean($upcomingCourse->description); ?>

        </div>
    </div>
<?php endif; ?>


<?php if(!empty($companyLogosExtraDescription) and count($companyLogosExtraDescription)): ?>
    <div class="mt-20 rounded-sm border bg-white p-15">
        <div class="mb-15">
            <h3 class="font-16 text-secondary font-weight-bold"><?php echo e(trans('update.suggested_by_top_companies')); ?></h3>
            <p class="font-14 text-gray mt-5"><?php echo e(trans('update.suggested_by_top_companies_hint')); ?></p>
        </div>

        <div class="row">
            <?php $__currentLoopData = $companyLogosExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyLogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col text-center">
                    <img src="<?php echo e($companyLogo->value); ?>" class="webinar-extra-description-company-logos" alt="<?php echo e(trans('update.company_logos')); ?>">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($requirementsExtraDescription) and count($requirementsExtraDescription)): ?>
    <div class="mt-20">
        <h3 class="font-16 text-secondary font-weight-bold mb-15"><?php echo e(trans('update.requirements')); ?></h3>

        <?php $__currentLoopData = $requirementsExtraDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirementExtraDescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="d-flex align-items-start font-14 text-gray mt-10">
                <i data-feather="check" width="18" height="18" class="mr-10 webinar-extra-description-check-icon"></i>
                <span class=""><?php echo e($requirementExtraDescription->value); ?></span>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>



<?php if(!empty($upcomingCourse->faqs) and $upcomingCourse->faqs->count() > 0): ?>
    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>

        <div class="accordion-content-wrapper mt-15" id="accordion" role="tablist" aria-multiselectable="true">
            <?php $__currentLoopData = $upcomingCourse->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-row rounded-sm shadow-lg border mt-20 py-20 px-35">
                    <div class="font-weight-bold font-14 text-secondary" role="tab" id="faq_<?php echo e($faq->id); ?>">
                        <div href="#collapseFaq<?php echo e($faq->id); ?>" aria-controls="collapseFaq<?php echo e($faq->id); ?>" class="d-flex align-items-center justify-content-between" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">
                            <span><?php echo e(clean($faq->title,'title')); ?></span>
                            <i class="collapse-chevron-icon" data-feather="chevron-down" width="25" class="text-gray"></i>
                        </div>
                    </div>
                    <div id="collapseFaq<?php echo e($faq->id); ?>" aria-labelledby="faq_<?php echo e($faq->id); ?>" class=" collapse" role="tabpanel">
                        <div class="panel-collapse text-gray">
                            <?php echo e(clean($faq->answer,'answer')); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>



<?php if(!empty($upcomingCourse->relatedCourses) and $upcomingCourse->relatedCourses->count() > 0): ?>

    <div class="mt-20">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?></h2>

        <?php $__currentLoopData = $upcomingCourse->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($relatedCourse->course): ?>
                <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $relatedCourse->course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>



<?php echo $__env->make('web.default.includes.comments',[
        'comments' => $upcomingCourse->comments,
        'inputName' => 'upcoming_course_id',
        'inputValue' => $upcomingCourse->id
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\upcoming_courses\tabs\information.blade.php ENDPATH**/ ?>