<?php
    $termsSetting = $settings->where('name', \App\Models\Setting::$registrationBonusTermsSettingsName)->first();

    $termsValue = (!empty($termsSetting) and !empty($termsSetting->translate($selectedLocale))) ? $termsSetting->translate($selectedLocale)->value : null;

    if (!empty($termsValue)) {
        $termsValue = json_decode($termsValue, true);
    }
?>


<form action="<?php echo e(getAdminPanelUrl('/registration_bonus/settings')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="page" value="general">
    <input type="hidden" name="name" value="<?php echo e(\App\Models\Setting::$registrationBonusTermsSettingsName); ?>">

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


            <div class="form-group mt-15">
                <label class="input-label"><?php echo e(trans('public.image')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="term_image" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="value[term_image]" id="term_image" value="<?php echo e((!empty($termsValue) and !empty($termsValue['term_image'])) ? $termsValue['term_image'] : old('term_image')); ?>" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                    <div class="input-group-append">
                        <button type="button" class="input-group-text admin-file-view" data-input="term_image">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="addAccountTypes">

                <button type="button" class="btn btn-success add-btn mb-4 fa fa-plus"></button>

                <?php if(!empty($termsValue) and !empty($termsValue['items'])): ?>

                    <?php if(!empty($termsValue) and is_array($termsValue['items'])): ?>
                        <?php $__currentLoopData = $termsValue['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group d-flex align-items-start">
                                <div class="px-2 py-1 border flex-grow-1">

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('admin/main.icon')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text admin-file-manager" data-input="icon_record" data-preview="holder">
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="value[items][<?php echo e($key); ?>][icon]" id="icon_<?php echo e($key); ?>" value="<?php echo e($item['icon'] ?? ''); ?>" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('admin/main.title')); ?></label>
                                        <input type="text" name="value[items][<?php echo e($key); ?>][title]"
                                               class="form-control"
                                               value="<?php echo e($item['title'] ?? ''); ?>"
                                        />
                                    </div>

                                    <div class="form-group mb-1">
                                        <label class="mb-1"><?php echo e(trans('public.description')); ?></label>
                                        <input type="text" name="value[items][<?php echo e($key); ?>][description]"
                                               class="form-control"
                                               value="<?php echo e($item['description'] ?? ''); ?>"
                                        />
                                    </div>
                                </div>
                                <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger"></button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-1"><?php echo e(trans('admin/main.submit')); ?></button>
</form>

<div class="main-row d-none">
    <div class="form-group d-flex align-items-start">
        <div class="px-2 py-1 border flex-grow-1">

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('admin/main.icon')); ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text admin-file-manager" data-input="icon_record" data-preview="holder">
                            <i class="fa fa-upload"></i>
                        </button>
                    </div>
                    <input type="text" name="value[items][record][icon]" id="icon_record" value="" class="form-control"/>
                </div>
            </div>

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('admin/main.title')); ?></label>
                <input type="text" name="value[items][record][title]"
                       class="form-control"
                />
            </div>

            <div class="form-group mb-1">
                <label class="mb-1"><?php echo e(trans('public.description')); ?></label>
                <input type="text" name="value[items][record][description]"
                       class="form-control"
                />
            </div>
        </div>
        <button type="button" class="fas fa-times btn ml-2 remove-btn btn-danger d-none"></button>
    </div>
</div>

<?php $__env->startPush('scripts_bottom'); ?>
    <script src="/assets/default/js/admin/settings/site_bank_accounts.min.js"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\registration_bonus\settings\terms_tab.blade.php ENDPATH**/ ?>