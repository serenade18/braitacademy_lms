<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('product.courses')); ?></h2>
    </div>

    <button id="addBundleWebinar" data-bundle-id="<?php echo e($bundle->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('update.add_course')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="bundleWebinarsAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($bundle->bundleWebinars) and count($bundle->bundleWebinars)): ?>
                    <ul class="draggable-lists" data-order-table="bundle_webinars">
                        <?php $__currentLoopData = $bundle->bundleWebinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundleWebinarRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.bundle-webinars',['bundle' => $bundle, 'bundleWebinar' => $bundleWebinarRow], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'comment.png',
                        'title' => trans('update.bundle_webinar_no_result'),
                        'hint' => trans('update.bundle_webinar_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?> (<?php echo e(trans('public.optional')); ?>)</h2>
    </div>

    <button id="webinarAddRelatedCourses" data-bundle-id="<?php echo e($bundle->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('update.add_related_courses')); ?></button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="relatedCoursesAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($bundle->relatedCourses) and count($bundle->relatedCourses)): ?>
                    <ul class="draggable-lists" data-order-table="relatedCourses">
                        <?php $__currentLoopData = $bundle->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourseInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.related_courses',['bundle' => $bundle,'relatedCourse' => $relatedCourseInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<div id="newBundleWebinarForm" class="d-none">
    <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.bundle-webinars',['bundle' => $bundle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div id="newRelatedCourseForm" class="d-none">
    <?php echo $__env->make('web.default.panel.bundle.create_includes.accordions.related_courses',['bundle' => $bundle], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\step_4.blade.php ENDPATH**/ ?>