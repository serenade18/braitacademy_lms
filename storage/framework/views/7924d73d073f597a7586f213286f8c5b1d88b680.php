<div class="text-left">
    <div class="text-center">
        <img src="/assets/default/img/gift/gift_icon.svg" class="" alt="gift_icon" width="246" height="244">

        <h4 class="font-16 font-weight-bold mt-15"><?php echo e(trans("update.you_got_a_gift_{$gift->getItemType()}")); ?></h4>
        <p class="font-14 font-weight-500 text-gray mt-5">
            <?php echo e(trans('update.user_send_item_to_you_as_a_gift',['user' => $gift->user->full_name, 'item_title' => $gift->getItemTitle()])); ?>

        </p>
    </div>

    <div class="d-flex align-items-center justify-content-center mt-15">
        <?php if(!empty($gift->webinar_id)): ?>
            <a href="<?php echo e($gift->webinar->getUrl()); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('update.view_gift')); ?></a>
        <?php elseif(!empty($gift->bundle_id)): ?>
            <a href="<?php echo e($gift->bundle->getUrl()); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('update.view_gift')); ?></a>
        <?php elseif(!empty($gift->product_id)): ?>
            <a href="<?php echo e($gift->product->getUrl()); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('update.view_gift')); ?></a>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\dashboard\gift_modal.blade.php ENDPATH**/ ?>