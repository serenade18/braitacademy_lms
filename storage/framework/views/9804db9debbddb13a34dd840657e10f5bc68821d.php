<?php
    $allowInstructorDeleteContent = !!(!empty(getGeneralOptionsSettings('allow_instructor_delete_content')));
    $contentDeleteMethod = (!empty(getGeneralOptionsSettings('content_delete_method'))) ? getGeneralOptionsSettings('content_delete_method') : 'delete_directly';
?>

<?php if($allowInstructorDeleteContent): ?>
    <?php if($contentDeleteMethod == "delete_directly"): ?>
        <a href="<?php echo e($deleteContentUrl); ?>"
           class="delete-action <?php echo e(!empty($deleteContentClassName) ? $deleteContentClassName : ''); ?>"
        ><?php echo e(trans('public.delete')); ?></a>
    <?php else: ?>
        <a href="<?php echo e($deleteContentUrl); ?>" data-item="<?php echo e($deleteContentItem->id); ?>" data-item-type="<?php echo e($deleteContentItem->getMorphClass()); ?>"
           class="js-content-delete-action <?php echo e(!empty($deleteContentClassName) ? $deleteContentClassName : ''); ?>"
        ><?php echo e(trans('public.delete')); ?></a>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\includes\content_delete_btn.blade.php ENDPATH**/ ?>