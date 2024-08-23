<div class="product-show-files-tab mt-20">
    <?php if(!empty($product->files) and count($product->files) and $product->checkUserHasBought()): ?>
        <?php $__currentLoopData = $product->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex align-items-center justify-content-between p-15 p-lg-20 bg-white rounded-sm border border-gray200 <?php echo e(($loop->iteration > 1) ? 'mt-15' : ''); ?>">
                <div class="">
                    <span class="d-block font-16 font-weight-bold text-dark-blue"><?php echo e($productFile->title); ?></span>
                    <span class="d-block font-12 text-gray"><?php echo e($productFile->description); ?></span>
                </div>

                <div class="d-flex align-items-center ml-20">

                    <?php if($productFile->online_viewer): ?>
                        <button type="button" data-href="<?php echo e($productFile->getOnlineViewUrl()); ?>"  class="js-online-show product-file-download-btn d-flex align-items-center justify-content-center text-white border-0 rounded-circle mr-15">
                            <i data-feather="eye" width="20" height="20" class=""></i>
                        </button>
                    <?php endif; ?>

                    <a href="<?php echo e($productFile->getDownloadUrl()); ?>" target="_blank" class="product-file-download-btn d-flex align-items-center justify-content-center text-white rounded-circle">
                        <i data-feather="download" width="20" height="20" class=""></i>
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\products\includes\tabs\files.blade.php ENDPATH**/ ?>