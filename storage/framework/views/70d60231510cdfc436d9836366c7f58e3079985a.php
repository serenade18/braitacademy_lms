<div class=" mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="reward_program">
                <input type="hidden" name="page" value="personalization">

                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                        <select name="locale" class="form-control js-edit-content-locale">
                            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', (!empty($itemValue) and !empty($itemValue['locale'])) ? $itemValue['locale'] : app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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
                    <label class="input-label"><?php echo e(trans('admin/main.image')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="image" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[image]" id="image" value="<?php echo e((!empty($itemValue) and !empty($itemValue['image'])) ? $itemValue['image'] : old('image')); ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.title')); ?></label>
                    <input type="text" name="value[title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['title'])) ? $itemValue['title'] : old('title')); ?>" class="form-control "/>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('public.description')); ?></label>
                    <textarea type="text" name="value[description]" rows="5" class="form-control "><?php echo e((!empty($itemValue) and !empty($itemValue['description'])) ? $itemValue['description'] : old('description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('update.button')); ?> 1</label>
                    <div class="row">
                        <div class="col-6">
                            <label><?php echo e(trans('admin/main.title')); ?></label>
                            <input type="text" name="value[button1][title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['button1']) and !empty($itemValue['button1']['title'])) ? $itemValue['button1']['title'] : ''); ?>" class="form-control "/>
                        </div>
                        <div class="col-6">
                            <label><?php echo e(trans('admin/main.link')); ?></label>
                            <input type="text" name="value[button1][link]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['button1']) and !empty($itemValue['button1']['link'])) ? $itemValue['button1']['link'] : ''); ?>" class="form-control "/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('update.button')); ?> 2</label>
                    <div class="row">
                        <div class="col-6">
                            <label><?php echo e(trans('admin/main.title')); ?></label>
                            <input type="text" name="value[button2][title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['button2']) and !empty($itemValue['button2']['title'])) ? $itemValue['button2']['title'] : ''); ?>" class="form-control "/>
                        </div>
                        <div class="col-6">
                            <label><?php echo e(trans('admin/main.link')); ?></label>
                            <input type="text" name="value[button2][link]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['button2']) and !empty($itemValue['button2']['link'])) ? $itemValue['button2']['link'] : ''); ?>" class="form-control "/>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\reward_program.blade.php ENDPATH**/ ?>