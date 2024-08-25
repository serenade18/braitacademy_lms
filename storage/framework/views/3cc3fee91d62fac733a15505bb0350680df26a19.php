<div class="no-result default-no-result mt-50 d-flex align-items-center justify-content-center flex-column">
    <div class="no-result-logo">
        <img src="/assets/default/img/no-results/<?php echo e($file_name); ?>" alt="">
    </div>
    <div class="d-flex align-items-center flex-column mt-30 text-center">
        <h2 class="text-dark-blue"><?php echo e($title); ?></h2>
        <p class="mt-1 text-center text-gray font-weight-500"><?php echo $hint; ?></p>
        <?php if(!empty($btn)): ?>
            <a href="<?php echo e($btn['url']); ?>" class="btn btn-sm btn-primary mt-25"><?php echo e($btn['text']); ?></a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views/web/default/includes/no-result.blade.php ENDPATH**/ ?>