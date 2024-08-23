<?php $__env->startPush('styles_top'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/store/specifications"><?php echo e(trans('update.specifications')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/store/specifications/<?php echo e(!empty($specification) ? $specification->id.'/update' : 'store'); ?>"
                                  method="Post">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                            <div class="form-group">
                                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                                <select name="locale" class="form-control <?php echo e(!empty($specification) ? 'js-edit-content-locale' : ''); ?>">
                                                    <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['locale'];
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
                                        <?php else: ?>
                                            <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <label><?php echo e(trans('/admin/main.title')); ?></label>
                                            <input type="text" name="title"
                                                   class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(!empty($specification) ? $specification->title : old('title')); ?>"
                                                   placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>
                                            <?php $__errorArgs = ['title'];
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

                                <div class="form-group mb-0">
                                    <label class=""><?php echo e(trans('admin/main.categories')); ?></label>
                                    <?php $__errorArgs = ['category'];
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
                                <div class="row">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <?php if(!empty($category->subCategories) and count($category->subCategories)): ?>
                                                <div class="form-group mb-1">
                                                    <label class=""><?php echo e($category->title); ?></label>
                                                </div>

                                                <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-12 col-md-4 col-lg-3">
                                                        <div class="form-group mb-0">
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="category<?php echo e($subCategory->id); ?>" value="<?php echo e($subCategory->id); ?>" type="checkbox" name="category[]"
                                                                       class="custom-control-input" <?php echo e((!empty($selectedCategories) and in_array($subCategory->id,$selectedCategories)) ? 'checked' : ''); ?>>
                                                                <label class="custom-control-label"
                                                                       for="category<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->title); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php else: ?>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input id="category<?php echo e($category->id); ?>" value="<?php echo e($category->id); ?>" type="checkbox" name="category[]"
                                                               class="custom-control-input" <?php echo e((!empty($selectedCategories) and in_array($category->id,$selectedCategories)) ? 'checked' : ''); ?>>
                                                        <label class="custom-control-label"
                                                               for="category<?php echo e($category->id); ?>"><?php echo e($category->title); ?></label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="form-group mt-4">
                                    <label class="input-label"><?php echo e(trans('update.input_type')); ?>:</label>

                                    <div class="d-flex align-items-center" id="inputTypes">
                                        <div class="custom-control mr-2 custom-radio">
                                            <input type="radio" name="input_type" value="textarea" <?php echo e((!empty($specification->input_type) and $specification->input_type == 'textarea') ? 'checked="checked"' : ''); ?> id="textarea" class="custom-control-input">
                                            <label class="custom-control-label cursor-pointer" for="textarea"><?php echo e(trans('update.textarea')); ?></label>
                                        </div>

                                        <div class="custom-control mr-2 custom-radio ml-15">
                                            <input type="radio" name="input_type" value="multi_value" id="multi_value" <?php echo e((!empty($specification->input_type) and $specification->input_type == 'multi_value') ? 'checked="checked"' : ''); ?> class="custom-control-input">
                                            <label class="custom-control-label cursor-pointer" for="multi_value"><?php echo e(trans('update.multi_value')); ?></label>
                                        </div>
                                    </div>

                                    <?php $__errorArgs = ['input_type'];
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

                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div id="multiValues" class="ml-0 <?php echo e((!empty($multiValues) and !$multiValues->isEmpty()) ? '' : ' d-none'); ?>">
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <strong class="d-block"><?php echo e(trans('update.multi_value')); ?></strong>

                                                <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add</button>
                                            </div>

                                            <div class="multi-values-card">

                                                <?php if((!empty($multiValues) and !$multiValues->isEmpty())): ?>
                                                    <?php $__currentLoopData = $multiValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $multiValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-group">

                                                            <div class="input-group">
                                                                <input type="text" name="multi_values[<?php echo e($multiValue->id); ?>][title]"
                                                                       class="form-control w-auto flex-grow-1"
                                                                       value="<?php echo e(!empty($multiValue->translate($selectedLocale)) ? $multiValue->translate($selectedLocale)->title : ''); ?>"
                                                                       placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="form-group main-row d-none">
        <div class="input-group">
            <input type="text" name="multi_values[record][title]"
                   class="form-control w-auto flex-grow-1"
                   placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

            <div class="input-group-append">
                <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/store/specification.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\store\specifications\create.blade.php ENDPATH**/ ?>