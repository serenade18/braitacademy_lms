<?php $__env->startPush('styles_top'); ?>
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(!empty($category) ?trans('/admin/main.edit'): trans('admin/main.new')); ?> <?php echo e(trans('admin/main.category')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/categories"><?php echo e(trans('admin/main.categories')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e(!empty($category) ?trans('/admin/main.edit'): trans('admin/main.new')); ?></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(getAdminPanelUrl()); ?>/categories/<?php echo e(!empty($category) ? $category->id.'/update' : 'store'); ?>"
                                  method="Post">
                                <?php echo e(csrf_field()); ?>


                                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                    <div class="form-group">
                                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                        <select name="locale" class="form-control <?php echo e(!empty($category) ? 'js-edit-content-locale' : ''); ?>">
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
                                           value="<?php echo e(!empty($category) ? $category->title : old('title')); ?>"
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

                                <div class="form-group">
                                    <label><?php echo e(trans('admin/main.url')); ?></label>
                                    <input type="text" name="slug"
                                           class="form-control  <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($category) ? $category->slug : old('slug')); ?>"/>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.category_url_hint')); ?></div>
                                    <?php $__errorArgs = ['slug'];
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

                                <div class="form-group">
                                    <label><?php echo e(trans('update.order')); ?></label>
                                    <input type="text" name="order"
                                           class="form-control  <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(!empty($category) ? $category->order : old('order')); ?>"/>
                                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.category_order_hint')); ?></div>
                                    <?php $__errorArgs = ['slug'];
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

                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('admin/main.icon')); ?></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager " data-input="icon" data-preview="holder">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="icon" id="icon" value="<?php echo e(!empty($category) ? $category->icon : old('icon')); ?>" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                                        <div class="invalid-feedback"><?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input id="hasSubCategory" type="checkbox" name="has_sub"
                                               class="custom-control-input" <?php echo e((!empty($subCategories) and !$subCategories->isEmpty()) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label"
                                               for="hasSubCategory"><?php echo e(trans('admin/main.has_sub_category')); ?></label>
                                    </div>
                                </div>

                                <div id="subCategories" class="ml-0 <?php echo e((!empty($subCategories) and !$subCategories->isEmpty()) ? '' : ' d-none'); ?>">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <strong class="d-block"><?php echo e(trans('admin/main.add_sub_categories')); ?></strong>

                                        <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add</button>
                                    </div>

                                    <ul class="draggable-lists list-group">

                                        <?php if((!empty($subCategories) and !$subCategories->isEmpty())): ?>
                                            <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="form-group list-group">

                                                    <div class="p-2 border rounded-sm">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text cursor-pointer move-icon">
                                                                    <i class="fa fa-arrows-alt"></i>
                                                                </div>
                                                            </div>

                                                            <input type="text" name="sub_categories[<?php echo e($subCategory->id); ?>][title]"
                                                                   class="form-control w-auto flex-grow-1"
                                                                   value="<?php echo e($subCategory->title); ?>"
                                                                   placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                                            <div class="input-group-append">
                                                                <?php echo $__env->make('admin.includes.delete_button',[
                                                                         'url' => getAdminPanelUrl("/categories/{$subCategory->id}/delete"),
                                                                         'deleteConfirmMsg' => trans('update.category_delete_confirm_msg'),
                                                                         'btnClass' => 'btn btn-danger text-white',
                                                                         'noBtnTransparent' => true
                                                                     ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </div>
                                                        </div>

                                                        <div class="input-group w-100 mt-1">
                                                            <input type="text" name="sub_categories[<?php echo e($subCategory->id); ?>][slug]"
                                                                   class="form-control w-auto flex-grow-1"
                                                                   value="<?php echo e($subCategory->slug); ?>"
                                                                   placeholder="<?php echo e(trans('admin/main.choose_url')); ?>"/>
                                                        </div>

                                                        <div class="input-group mt-1">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="input-group-text admin-file-manager " data-input="icon_<?php echo e($subCategory->id); ?>" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="sub_categories[<?php echo e($subCategory->id); ?>][icon]" id="icon_<?php echo e($subCategory->id); ?>" class="form-control" value="<?php echo e($subCategory->icon); ?>" placeholder="<?php echo e(trans('admin/main.icon')); ?>"/>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <div class="text-right mt-4">
                                    <button class="btn btn-primary"><?php echo e(trans('admin/main.submit')); ?></button>
                                </div>
                            </form>

                            <li class="form-group main-row list-group d-none">
                                <div class="p-2 border rounded-sm">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text cursor-pointer move-icon">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                        </div>

                                        <input type="text" name="sub_categories[record][title]"
                                               class="form-control w-auto flex-grow-1"
                                               placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

                                        <div class="input-group-append">
                                            <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>

                                    <div class="input-group mt-1">
                                        <input type="text" name="sub_categories[record][slug]"
                                               class="form-control w-auto flex-grow-1"
                                               placeholder="<?php echo e(trans('admin/main.choose_url')); ?>"/>
                                    </div>

                                    <div class="input-group mt-1">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text admin-file-manager " data-input="icon_record" data-preview="holder">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="sub_categories[record][icon]" id="icon_record" class="form-control" placeholder="<?php echo e(trans('admin/main.icon')); ?>"/>
                                    </div>
                                </div>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/braitaca/learn.braitacademy.com/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>