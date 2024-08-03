<div class="no-result default-no-result mt-5 d-flex align-items-center justify-content-center flex-column">
    <div class="no-result-logo <?php echo e(!empty($noResultSmLogo) ? 'sm-logo' : ''); ?>">
        <img src="/assets/default/img/no-results/<?php echo e($file_name); ?>" alt="">
    </div>
    <div class="d-flex align-items-center flex-column mt-3 text-center">
        <h2><?php echo e($title); ?></h2>
        <p class="mt-1 text-center"><?php echo $hint; ?></p>
        <?php if(!empty($btn)): ?>
            <a href="<?php echo e($btn['url']); ?>" class="btn btn-primary mt-2"><?php echo e($btn['text']); ?></a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/braitaca/public_html/resources/views/admin/includes/no-result.blade.php ENDPATH**/ ?>