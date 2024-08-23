<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>


<div class="mt-3" id="mobile_app">

    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/maintenance_settings" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="page" value="personalization">
        <input type="hidden" name="maintenance_settings" value="maintenance_settings">

        <div class="row">
            <div class="col-12 col-md-6">

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
                    <label class="input-label mb-0"><?php echo e(trans('admin/main.title')); ?></label>

                    <input type="text" name="value[title]" required value="<?php echo e((!empty($itemValue) and !empty($itemValue['title'])) ? $itemValue['title'] : ''); ?>" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="input-label mb-0"><?php echo e(trans('admin/main.image')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="image" data-preview="holder">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                        <input type="text" name="value[image]" required id="image" value="<?php echo e((!empty($itemValue) and !empty($itemValue['image'])) ? $itemValue['image'] : ''); ?>" class="form-control" placeholder="<?php echo e(trans('update.maintenance_settings_image_placeholder')); ?>"/>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label"><?php echo e(trans('admin/main.description')); ?></label>
                    <textarea name="value[description]" required rows="5" class="form-control text-left"><?php echo e((!empty($itemValue) and !empty($itemValue['description'])) ? $itemValue['description'] : ''); ?></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label class="input-label mb-0"><?php echo e(trans('update.button_title')); ?></label>
                            <input type="text" name="value[maintenance_button][title]" class="form-control w-100 flex-grow-1" value="<?php echo e((!empty($itemValue) and !empty($itemValue['maintenance_button']) and !empty($itemValue['maintenance_button']['title'])) ? $itemValue['maintenance_button']['title'] : ''); ?>"/>
                        </div>

                        <div class="col-6">
                            <label class="input-label mb-0"><?php echo e(trans('update.button_link')); ?></label>
                            <input type="text" name="value[maintenance_button][link]" class="form-control w-100 flex-grow-1" value="<?php echo e((!empty($itemValue) and !empty($itemValue['maintenance_button']) and !empty($itemValue['maintenance_button']['link'])) ? $itemValue['maintenance_button']['link'] : ''); ?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.end_date')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="dateRangeLabel">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>

                        <input type="text" name="value[end_date]" class="form-control text-center datetimepicker"
                               aria-describedby="dateRangeLabel" autocomplete="off" data-drops="up"
                               value="<?php echo e((!empty($itemValue) and !empty($itemValue['end_date'])) ? dateTimeFormat($itemValue['end_date'], 'Y-m-d H:i', false) : ''); ?>"/>
                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
    </form>

</div>

<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\maintenance_settings.blade.php ENDPATH**/ ?>