<?php
    $productBadges = \App\Models\ProductBadge::query()->get();
?>

<?php if($productBadges->isNotEmpty()): ?>
    <div class="form-group mt-15">
        <label class="input-label d-block"><?php echo e(trans('update.select_badges')); ?></label>

        <select name="product_badges[]" multiple class="form-control select2"
                data-placeholder="<?php echo e(trans('update.select_badges')); ?>"
        >
            <?php $__currentLoopData = $productBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productBadge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $selected = $productBadge->contents()->where('targetable_id', $itemTarget->id)->where('targetable_type', $itemTarget->getMorphClass())->first();
                ?>

                <option value="<?php echo e($productBadge->id); ?>" <?php echo e(!empty($selected) ? 'selected' : ''); ?>><?php echo e($productBadge->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <div class="text-muted text-small mt-1"><?php echo e(trans('update.select_badges_hint')); ?></div>
    </div>
<?php endif; ?>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/product_badges/content_include.blade.php ENDPATH**/ ?>