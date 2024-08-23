<div class="product-show-specifications-tab mt-20">
    <?php if(!empty($selectedSpecifications) and count($selectedSpecifications)): ?>
        <?php $__currentLoopData = $selectedSpecifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedSpecification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-show-specification-item d-flex">
                <div class="specification-item-name <?php echo e(($loop->iteration > 1) ? 'mt-15 pt-15' : ''); ?>">
                    <?php echo e($selectedSpecification->specification->title); ?>

                </div>

                <div class="specification-item-value flex-grow-1 <?php echo e(($loop->iteration > 1) ? 'mt-15 pt-15 border-top border-gray200' : ''); ?>">
                    <?php if($selectedSpecification->type == 'textarea'): ?>
                        <?php echo nl2br($selectedSpecification->value); ?>

                    <?php elseif(!empty($selectedSpecification->selectedMultiValues)): ?>
                        <?php $__currentLoopData = $selectedSpecification->selectedMultiValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedSpecificationValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($selectedSpecificationValue->multiValue)): ?>
                                <span class="d-block mt-5"><?php echo e($selectedSpecificationValue->multiValue->title); ?></span>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\includes\tabs\specifications.blade.php ENDPATH**/ ?>