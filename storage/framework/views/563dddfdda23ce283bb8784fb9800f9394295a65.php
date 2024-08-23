<?php
    $canPlay = ($video->accessibility !== 'paid' or ($video->accessibility == 'paid' and !empty($user) and $hasBought));
?>

<div data-id="<?php echo e($canPlay ? $video->id : ''); ?>" data-title="<?php echo e($canPlay ? $video->title : ''); ?>" class="accordion-row modal-video-item <?php echo e($canPlay ? 'js-play-video cursor-pointer' : 'no-hover'); ?> ">
    <div class="p-20 item-border">
        <div class="d-flex align-items-center">
            <?php if($video->accessibility == 'paid'): ?>
                <?php if(!empty($user) and $hasBought): ?>
                    <i data-feather="play-circle" width="20" height="20" class="text-gray"></i>
                <?php else: ?>
                    <i data-feather="lock" width="20" height="20" class="text-gray"></i>
                <?php endif; ?>
            <?php else: ?>
                <i data-feather="play-circle" width="20" height="20" class="text-gray"></i>
            <?php endif; ?>


            <div class="flex-grow-1 mx-15">
                <h3 class="font-16 text-dark"><?php echo e($video->title); ?></h3>
            </div>

            <div class="">
                <?php if($video->storage == 'upload'): ?>
                    <?php echo e($video->getFileDuration()); ?>

                <?php else: ?>
                    <?php echo e(trans('update.file_source_'.$video->storage)); ?>

                <?php endif; ?>
            </div>
        </div>

        <div id="collapseVideo<?php echo e($video->id); ?>" aria-labelledby="videoTab_<?php echo e($video->id); ?>" class="pl-35 collapse" role="tabpanel">
            <div class="text-gray text-12 mt-10">
                <?php echo nl2br(clean($video->description)); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\course\tabs\play_modal\video_item.blade.php ENDPATH**/ ?>