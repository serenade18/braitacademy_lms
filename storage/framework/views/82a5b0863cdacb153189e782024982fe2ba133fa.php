<?php
    $termsSetting = $settings->where('name', \App\Models\Setting::$installmentsTermsSettingsName)->first();

    $termsValue = (!empty($termsSetting) and !empty($termsSetting->translate($selectedLocale))) ? $termsSetting->translate($selectedLocale)->value : null;

    if (!empty($termsValue)) {
        $termsValue = json_decode($termsValue, true);
    }
?>


<form action="<?php echo e(getAdminPanelUrl('/financial/installments/settings')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="page" value="general">
    <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$installmentsTermsSettingsName); ?>">

    <div class="row">
        <div class="col-12 col-md-6">
            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                    <select name="locale" class="form-control js-edit-content-locale">
                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', (!empty($termsValue) and !empty($termsValue['locale'])) ? $termsValue['locale'] : app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group ">
                <label class="control-label"><?php echo e(trans('admin/main.description')); ?></label>
                <textarea name="value[terms_description]" required class="summernote form-control text-left"><?php echo e((!empty($termsValue) and !empty($termsValue['terms_description'])) ? $termsValue['terms_description'] : ''); ?></textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
</form>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\financial\installments\settings\terms_tab.blade.php ENDPATH**/ ?>