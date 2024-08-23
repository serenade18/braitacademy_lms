<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($pageTitle); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(getAdminPanelUrl()); ?>"><?php echo e(trans('admin/main.dashboard')); ?></a>
                </div>
                <div class="breadcrumb-item"><?php echo e($pageTitle); ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(getAdminPanelUrl()); ?>/ai-contents/templates/<?php echo e(!empty($template) ? $template->id .'/update' : 'store'); ?>" class="">
                        <?php echo e(csrf_field()); ?>


                        <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                            <div class="form-group col-12 col-md-6">
                                <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                <select name="locale" class="form-control <?php echo e(!empty($template) ? 'js-edit-content-locale' : ''); ?>">
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


                        <div class="form-group col-12 col-md-6">
                            <label class="control-label"><?php echo trans('admin/main.title'); ?></label>
                            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((!empty($template) and !empty($template->translate($locale))) ? $template->translate($locale)->title : old('title')); ?>">
                            <div class="invalid-feedback"><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="control-label"><?php echo trans('admin/main.type'); ?></label>
                            <select name="type" class="js-template-type form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value=""><?php echo e(trans('update.select_template_type')); ?></option>
                                <option value="text" <?php echo e((!empty($template) and $template->type == "text") ? 'selected' : ''); ?>><?php echo e(trans('update.text')); ?></option>
                                <option value="image" <?php echo e((!empty($template) and $template->type == "image") ? 'selected' : ''); ?>><?php echo e(trans('update.image')); ?></option>
                            </select>

                            <div class="invalid-feedback"><?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>

                        
                        <div class="js-prompt-field form-group col-12 col-md-6 <?php echo e(!empty($template) ? '' : 'd-none'); ?>">
                            <label class="control-label"><?php echo e(trans('update.prompt')); ?></label>
                            <textarea name="prompt" rows="6" class="form-control <?php $__errorArgs = ['prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e((!empty($template) and !empty($template->translate($locale))) ? $template->translate($locale)->prompt : old('prompt')); ?></textarea>
                            <div class="invalid-feedback"><?php $__errorArgs = ['prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>

                            <div class="js-text-prompt-hint <?php echo e((empty($template) or $template->type == "text") ? '' : 'd-none'); ?>"><?php echo e(trans('update.ai_content_text_prompt_hint')); ?></div>
                            <div class="js-image-prompt-hint <?php echo e((!empty($template) and $template->type == "image") ? '' : 'd-none'); ?>"><?php echo e(trans('update.ai_content_image_prompt_hint')); ?></div>
                        </div>


                        
                        <div class="js-text-fields <?php echo e((!empty($template) and $template->type == "text") ? '' : 'd-none'); ?>">

                            <div class="form-group col-12 col-md-6 custom-switches-stacked">
                                <label class="custom-switch pl-0 d-flex align-items-center">
                                    <input type="hidden" name="enable_length" value="0">
                                    <input type="checkbox" name="enable_length" id="lengthSwitch" value="1" <?php echo e((!empty($template) and $template->enable_length) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                    <span class="custom-switch-indicator"></span>
                                    <label class="custom-switch-description mb-0 cursor-pointer" for="lengthSwitch"><?php echo e(trans('update.enable_length')); ?></label>
                                </label>
                            </div>

                            <div class="js-length-field form-group col-12 col-md-6 <?php echo e((!empty($template) and $template->enable_length) ? '' : 'd-none'); ?>">
                                <label class="control-label"><?php echo trans('update.length'); ?></label>
                                <input type="number" name="length" class="form-control <?php $__errorArgs = ['length'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(!empty($template) ? $template->length : old('length')); ?>" min="0">
                                <div class="invalid-feedback"><?php $__errorArgs = ['length'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                            </div>

                        </div>

                        
                        <div class="js-image-fields <?php echo e((!empty($template) and $template->type == "image") ? '' : 'd-none'); ?>">
                            <div class="form-group col-12 col-md-6">
                                <label class="control-label"><?php echo trans('update.image_size'); ?></label>
                                <select name="image_size" class=" form-control <?php $__errorArgs = ['image_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value=""><?php echo e(trans('update.select_image_size')); ?></option>
                                    <option value="256" <?php echo e((!empty($template) and $template->image_size == "256") ? 'selected' : ''); ?>><?php echo e(trans('update.256x256')); ?></option>
                                    <option value="512" <?php echo e((!empty($template) and $template->image_size == "512") ? 'selected' : ''); ?>><?php echo e(trans('update.512x512')); ?></option>
                                    <option value="1024" <?php echo e((!empty($template) and $template->image_size == "1024") ? 'selected' : ''); ?>><?php echo e(trans('update.1024x1024')); ?></option>
                                </select>
                                <div class="invalid-feedback"><?php $__errorArgs = ['image_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                            </div>

                        </div>

                        <div class="form-group col-12 col-md-6 custom-switches-stacked">
                            <label class="custom-switch pl-0 d-flex align-items-center">
                                <input type="hidden" name="status" value="disabled">
                                <input type="checkbox" name="status" id="statusSwitch" value="active" <?php echo e((!empty($template) and $template->enable) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="statusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary " type="submit"><?php echo e(trans('admin/main.save')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/ai_content_create_template.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\ai_contents\templates\create\index.blade.php ENDPATH**/ ?>