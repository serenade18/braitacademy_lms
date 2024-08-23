<div class="card">
    <div class="card-body">
        <p class="text-muted mb-1 px-2"><?php echo e(trans('update.certificate_template_box_hint')); ?></p>

        <div id="certificateTemplateContainer" class="d-flex justify-content-center">
            <?php if(!empty($template) and !empty($template->body)): ?>
                <?php echo $template->body; ?>

            <?php else: ?>
                <div class="certificate-template-container"></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\certificates\create_template\draggable-section.blade.php ENDPATH**/ ?>