<?php $__env->startPush('styles_top'); ?>
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<div class="row">

    <?php if($product->isVirtual()): ?>
        <div class="col-12 mb-40 mt-20">
            <div class="">
                <h2 class="section-title after-line"><?php echo e(trans('public.files')); ?></h2>
            </div>
            <div class="mt-15">
                <p class="font-14 text-gray">- <?php echo e(trans('update.product_files_hint_1')); ?></p>
            </div>
            <button id="productAddFile" data-product-id="<?php echo e($product->id); ?>" type="button" class="btn btn-primary btn-sm mt-15"><?php echo e(trans('public.add_new_files')); ?></button>


            <div class="accordion-content-wrapper mt-15" id="filesAccordion" role="tablist" aria-multiselectable="true">
                <?php if(!empty($product->files) and count($product->files)): ?>
                    <ul class="draggable-lists" data-order-path="/panel/store/products/files/order-items">
                        <?php $__currentLoopData = $product->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fileInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web.default.panel.store.products.create_includes.accordions.file',['file' => $fileInfo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                        'file_name' => 'files.png',
                        'title' => trans('public.files_no_result'),
                        'hint' => trans('public.files_no_result_hint'),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>

            <div id="newFileForm" class="d-none">
                <?php echo $__env->make('web.default.panel.store.products.create_includes.accordions.file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
    <?php endif; ?>


    <div class="col-12 col-md-6 mt-15">

        <div class="form-group mt-15">
            <label class="input-label"><?php echo e(trans('public.thumbnail_image')); ?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text panel-file-manager" data-input="thumbnail" data-preview="holder">
                        <i data-feather="upload" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" name="thumbnail" id="thumbnail" value="<?php echo e(!empty($product) ? $product->thumbnail : old('thumbnail')); ?>" class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('update.thumbnail_images_size')); ?>"/>
                <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div id="productImagesInputs" class="form-group mt-15">
            <label class="input-label mb-0"><?php echo e(trans('update.images')); ?></label>

            <div class="main-row input-group product-images-input-group mt-10">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text panel-file-manager" data-input="images_record" data-preview="holder">
                        <i data-feather="upload" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" name="images[]" id="images_record" value="" class="form-control" placeholder="<?php echo e(trans('update.product_images_size')); ?>"/>

                <button type="button" class="btn btn-primary btn-sm add-btn">
                    <i data-feather="plus" width="18" height="18" class="text-white"></i>
                </button>
            </div>

            <?php if(!empty($product->images) and count($product->images)): ?>
                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-group product-images-input-group mt-10">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text panel-file-manager" data-input="images_<?php echo e($productImage->id); ?>" data-preview="holder">
                                <i data-feather="upload" width="18" height="18" class="text-white"></i>
                            </button>
                        </div>
                        <input type="text" name="images[]" id="images_<?php echo e($productImage->id); ?>" value="<?php echo e($productImage->path); ?>" class="form-control" placeholder="<?php echo e(trans('update.product_images_size')); ?>"/>

                        <button type="button" class="btn btn-sm btn-danger remove-btn">
                            <i data-feather="x" width="18" height="18" class="text-white"></i>
                        </button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group mt-25">
            <label class="input-label"><?php echo e(trans('public.demo_video')); ?> (<?php echo e(trans('public.optional')); ?>)</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text text-white panel-file-manager" data-input="demo_video" data-preview="holder">
                        <i data-feather="upload" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" name="video_demo" id="demo_video" value="<?php echo e(!empty($product) ? $product->video_demo : old('video_demo')); ?>" class="form-control <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                <?php $__errorArgs = ['video_demo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\store\products\create_includes\step_3.blade.php ENDPATH**/ ?>