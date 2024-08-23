<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }

?>

<?php $__env->startPush('styles_top'); ?>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<?php $__env->stopPush(); ?>

<div class="mt-3" id="cookie_settings">

    <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/cookie_settings" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="page" value="personalization">
        <input type="hidden" name="cookie_settings" value="cookie_settings">


        <h5 class="mb-3"><?php echo e(trans('update.cookie_settings_modal')); ?></h5>
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
            </div>

            <div class="col-12">
                <div class="form-group ">
                    <label class="control-label"><?php echo e(trans('admin/main.message')); ?></label>
                    <textarea name="value[cookie_settings_modal_message]" class="summernote form-control text-left"><?php echo e((!empty($itemValue) and !empty($itemValue['cookie_settings_modal_message'])) ? $itemValue['cookie_settings_modal_message'] : ''); ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div id="cookie_settings_modal_items" class="ml-0">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <strong class="d-block"><?php echo e(trans('admin/main.items')); ?></strong>

                        <button type="button" data-parent="cookie_settings_modal_items" data-main-row="cookieSettingsItemsMainRow" class="btn btn-success add-btn"><i class="fa fa-plus"></i> <?php echo e(trans('admin/main.add')); ?></button>
                    </div>


                    <?php if(!empty($itemValue) and !empty($itemValue['cookie_settings_modal_items'])): ?>
                        <?php $__currentLoopData = $itemValue['cookie_settings_modal_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modalItemKey => $modalItemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group list-group p-2 border rounded-lg">
                                <div class="input-group">

                                    <input type="text" name="value[cookie_settings_modal_items][<?php echo e($modalItemKey); ?>][title]"
                                           class="form-control w-auto flex-grow-1"
                                           placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"
                                           value="<?php echo e($modalItemValue['title'] ?? ''); ?>"
                                    />

                                    <div class="input-group-append">
                                        <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                                <textarea name="value[cookie_settings_modal_items][<?php echo e($modalItemKey); ?>][description]"
                                          class="form-control w-100 flex-grow-1 mt-1" rows="4"
                                          placeholder="<?php echo e(trans('admin/main.description')); ?>"
                                ><?php echo e($modalItemValue['description'] ?? ''); ?></textarea>

                                <div class="form-group mb-0 mt-1 custom-switches-stacked">
                                    <label class="custom-switch pl-0">
                                        <input type="hidden" name="value[cookie_settings_modal_items][<?php echo e($modalItemKey); ?>][required]" value="0">
                                        <input type="checkbox" name="value[cookie_settings_modal_items][<?php echo e($modalItemKey); ?>][required]" id="requiredSwitch_<?php echo e($modalItemKey); ?>" value="1" <?php echo e((!empty($modalItemValue['required']) and $modalItemValue['required']) ? 'checked' : ''); ?> class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="requiredSwitch_<?php echo e($modalItemKey); ?>"><?php echo e(trans('public.required')); ?></label>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
    </form>

</div>

<div id="cookieSettingsItemsMainRow" class="form-group p-2 border rounded-lg d-none">
    <div class="input-group">

        <input type="text" name="value[cookie_settings_modal_items][record][title]"
               class="form-control w-auto flex-grow-1" required
               placeholder="<?php echo e(trans('admin/main.choose_title')); ?>"/>

        <div class="input-group-append">
            <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <textarea name="value[cookie_settings_modal_items][record][description]" required
              class="form-control w-100 flex-grow-1 mt-1" rows="4" placeholder="<?php echo e(trans('admin/main.description')); ?>"></textarea>

    <div class="form-group mb-0 mt-1 custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="value[cookie_settings_modal_items][record][required]" value="0">
            <input type="checkbox" name="value[cookie_settings_modal_items][record][required]" id="requiredSwitch_record" value="1" class="custom-switch-input"/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="requiredSwitch_record"><?php echo e(trans('public.required')); ?></label>
        </label>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/js/admin/settings/cookie_settings.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\cookie_settings.blade.php ENDPATH**/ ?>