<div class="product-show-description-tab mt-20">
    <?php if($product->description): ?>
        <div class="course-description">
            <?php echo $product->description; ?>

        </div>
    <?php endif; ?>

    
    <?php if(!empty($product->faqs) and $product->faqs->count() > 0): ?>
        <div class="mt-20 mt-lg-30">
            <h2 class="section-title after-line"><?php echo e(trans('public.faq')); ?></h2>

            <div class="accordion-content-wrapper mt-15" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $__currentLoopData = $product->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-row rounded-sm shadow-lg border mt-20 py-20 px-35">
                        <div class="font-weight-bold font-14 text-secondary" role="tab" id="faq_<?php echo e($faq->id); ?>">
                            <div href="#collapseFaq<?php echo e($faq->id); ?>" aria-controls="collapseFaq<?php echo e($faq->id); ?>" class="d-flex align-items-center justify-content-between" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">
                                <span><?php echo e(clean($faq->title,'title')); ?>?</span>
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
    

    
    <?php if(!empty($product->relatedCourses) and $product->relatedCourses->count() > 0): ?>

        <div class="mt-20">
            <h2 class="section-title after-line"><?php echo e(trans('update.related_courses')); ?></h2>

            <?php $__currentLoopData = $product->relatedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($relatedCourse->course): ?>
                    <?php echo $__env->make('web.default.includes.webinar.list-card',['webinar' => $relatedCourse->course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    

    <?php if(!empty(getStoreSettings('activate_comments')) and getStoreSettings('activate_comments')): ?>
        
        <?php echo $__env->make('web.default.includes.comments',[
                'comments' => $product->comments,
                'inputName' => 'product_id',
                'inputValue' => $product->id
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\includes\tabs\description.blade.php ENDPATH**/ ?>