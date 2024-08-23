<div class="tab-pane mt-3 fade" id="occupations" role="tabpanel" aria-labelledby="occupations-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/users/<?php echo e($user->id .'/occupationsUpdate'); ?>" method="Post">
                <?php echo e(csrf_field()); ?>


                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                        <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox-button mr-15 mt-10">
                                <input type="checkbox" name="occupations[]" id="checkbox<?php echo e($subCategory->id); ?>" value="<?php echo e($subCategory->id); ?>" <?php if(!empty($occupations) and in_array($subCategory->id,$occupations)): ?> checked="checked" <?php endif; ?>>
                                <label for="checkbox<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->title); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="checkbox-button mr-15 mt-10">
                            <input type="checkbox" name="occupations[]" id="checkbox<?php echo e($category->id); ?>" value="<?php echo e($category->id); ?>" <?php if(!empty($occupations) and in_array($category->id,$occupations)): ?> checked="checked" <?php endif; ?>>
                            <label for="checkbox<?php echo e($category->id); ?>"><?php echo e($category->title); ?></label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class=" mt-4">
                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/admin/users/editTabs/occupations.blade.php ENDPATH**/ ?>