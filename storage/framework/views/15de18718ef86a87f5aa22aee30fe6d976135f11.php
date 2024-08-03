<?php if($floatingBar->position == 'top' and $floatingBar->fixed): ?>
    <style>
        .has-fixed-top-floating-bar {
            padding-top: <?php echo e(!empty($floatingBar->bar_height) ? $floatingBar->bar_height : 80); ?>px;
        }

        .has-fixed-top-floating-bar .navbar.sticky {
            top: <?php echo e(!empty($floatingBar->bar_height) ? $floatingBar->bar_height : 80); ?>px;
        }
    </style>
<?php endif; ?>

<div class="floating-bar <?php echo e($floatingBar->fixed ? "is-fixed" : ''); ?> <?php echo e('position-'.$floatingBar->position); ?> " style="<?php echo e(!empty($floatingBar->background_image) ? "background-image: url('$floatingBar->background_image');" : ''); ?> <?php echo e((!empty($floatingBar->background_color) ? "background-color: $floatingBar->background_color;" : '')); ?> <?php echo e(!empty($floatingBar->bar_height) ? "height: {$floatingBar->bar_height}px;" : ''); ?>">
    <div class="container h-100">
        <div class="d-flex align-items-center justify-content-between h-100">
            <div class="d-flex align-items-center">
                <?php if(!empty($floatingBar->icon)): ?>
                    <div class="floating-bar__icon mr-5">
                        <img src="<?php echo e($floatingBar->icon); ?>" alt="<?php echo e($floatingBar->title ?? 'icon'); ?>" class="img-fluid">
                    </div>
                <?php endif; ?>
                <div class="">
                    <?php if(!empty($floatingBar->title)): ?>
                        <h5 class="font-16 font-weight-bold" style="<?php echo e(!empty($floatingBar->title_color) ? "color: $floatingBar->title_color" : ''); ?>"><?php echo e($floatingBar->title); ?></h5>
                    <?php endif; ?>

                    <?php if(!empty($floatingBar->description)): ?>
                        <div class="font-14" style="<?php echo e(!empty($floatingBar->description_color) ? "color: $floatingBar->description_color" : ''); ?>"><?php echo e($floatingBar->description); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if(!empty($floatingBar->btn_text)): ?>
                <a
                    href="<?php echo e(!empty($floatingBar->btn_url) ? $floatingBar->btn_url : '#!'); ?>"
                    class="btn btn-sm"
                    style="<?php echo e(!empty($floatingBar->btn_color) ? "background-color: $floatingBar->btn_color; border-color: $floatingBar->btn_color;" : ''); ?> <?php echo e(!empty($floatingBar->btn_text_color) ? "color: $floatingBar->btn_text_color;" : ''); ?> "
                ><?php echo e($floatingBar->btn_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/web/default/includes/floating_bar.blade.php ENDPATH**/ ?>