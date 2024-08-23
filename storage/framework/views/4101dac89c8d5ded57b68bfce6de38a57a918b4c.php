<section>
    <h2 class="section-title after-line mt-2 mb-4"><?php echo e(trans('update.images')); ?></h2>

    <div class="row">
        <div class="col-12 col-md-6 mt-15">

            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('public.thumbnail_image')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="thumbnail" data-preview="holder">
                            <i class="fa fa-upload"></i>
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

                <div class="main-row input-group product-images-input-group mt-2">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="images_record" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="images[]" id="images_record" value="" class="form-control" placeholder="<?php echo e(trans('update.product_images_size')); ?>"/>

                    <button type="button" class="btn btn-primary btn-sm add-btn">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>

                <?php if(!empty($product->images) and count($product->images)): ?>
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="input-group product-images-input-group mt-2">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text admin-file-manager" data-input="images_<?php echo e($productImage->id); ?>" data-preview="holder">
                                    <i class="fa fa-upload"></i>
                                </button>
                            </div>
                            <input type="text" name="images[]" id="images_<?php echo e($productImage->id); ?>" value="<?php echo e($productImage->path); ?>" class="form-control" placeholder="<?php echo e(trans('update.product_images_size')); ?>"/>

                            <button type="button" class="btn btn-sm btn-danger remove-btn">
                                <i class="fa fa-times"></i>
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
                        <button type="button" class="input-group-text admin-file-manager" data-input="demo_video" data-preview="holder">
                            <i class="fa fa-upload"></i>
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

        <?php if($product->isVirtual()): ?>
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="section-title after-line"><?php echo e(trans('public.files')); ?></h2>

                    <div class="px-2 mt-3">
                        <button id="productAddFile" data-product-id="<?php echo e($product->id); ?>" type="button" class="btn btn-primary btn-sm"><?php echo e(trans('public.add_new_files')); ?></button>
                    </div>
                </div>

                <div class="mt-1">
                    <p class="font-14 text-gray">- <?php echo e(trans('update.product_files_hint_1')); ?></p>
                </div>


                <div class="mt-2">
                    <?php if(!empty($product->files) and count($product->files)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped text-center font-14">

                                <tr>
                                    <th><?php echo e(trans('public.title')); ?></th>
                                    <th><?php echo e(trans('admin/main.description')); ?></th>
                                    <th><?php echo e(trans('admin/main.status')); ?></th>
                                    <th class="text-right"><?php echo e(trans('admin/main.actions')); ?></th>
                                </tr>

                                <?php $__currentLoopData = $product->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <span class="d-block"><?php echo e($file->title); ?></span>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo e(nl2br($file->description)); ?>">
                                            <button type="button" class="js-show-description btn btn-sm btn-light"><?php echo e(trans('admin/main.show')); ?></button>
                                        </td>
                                        <td><?php echo e(trans('admin/main.'.$file->status)); ?></td>

                                        <td width="160" class="text-right">
                                            <button type="button" data-file-id="<?php echo e($file->id); ?>" data-product-id="<?php echo e(!empty($product) ? $product->id : ''); ?>" class="edit-file btn-transparent text-primary mt-1" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/main.edit')); ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <?php echo $__env->make('admin.includes.delete_button',['url' => getAdminPanelUrl().'/store/products/files/'. $file->id .'/delete', 'btnClass' => ' mt-1'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <?php echo $__env->make(getTemplate() . '.includes.no-result',[
                            'file_name' => 'files.png',
                            'title' => trans('public.files_no_result'),
                            'hint' => trans('public.files_no_result_hint'),
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\products\create\image_and_files.blade.php ENDPATH**/ ?>