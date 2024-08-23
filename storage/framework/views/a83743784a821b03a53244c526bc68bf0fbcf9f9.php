<div class="stars-card d-flex align-items-center <?php echo e($className ?? ' mt-15'); ?>">
    <?php
        $i = 5;
    ?>

    <?php if((!empty($rate) and $rate > 0) or !empty($showRateStars)): ?>
        <?php while(--$i >= 5 - $rate): ?>
            <i class="fa fa-star active"></i>
        <?php endwhile; ?>
        <?php while($i-- >= 0): ?>
            <i class="fa fa-star"></i>
        <?php endwhile; ?>

        <?php if(empty($dontShowRate) or !$dontShowRate): ?>
            <span class="badge badge-primary ml-10"><?php echo e($rate); ?></span>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\webinars\includes\rate.blade.php ENDPATH**/ ?>