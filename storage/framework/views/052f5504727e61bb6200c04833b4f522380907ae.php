<?php
    $cookieSecuritySettings = getCookieSettings();
?>

<?php if(!empty($cookieSecuritySettings['cookie_settings_modal_message']) and !empty(strip_tags($cookieSecuritySettings['cookie_settings_modal_message']))): ?>
    <div class="cookie-security-dialog p-20 bg-gray rounded-lg">
        <h3 class="font-14 font-weight-bold text-white"><?php echo e(trans('update.your_privacy')); ?></h3>
        <p class="mt-5 text-white font-12"><?php echo e(trans('update.your_privacy_hint')); ?></p>

        <div class="mt-10 d-flex flex-wrap align-items-center">
            <button type="button" class="js-accept-all-cookies btn btn-primary btn-sm flex-grow-1 mr-0 mr-md-5"><?php echo e(trans('update.accept_all_cookies')); ?></button>
            <button type="button" class="js-cookie-customize-settings btn btn-light btn-sm flex-grow-1 mt-10 mt-md-0"><?php echo e(trans('update.customize_settings')); ?></button>
        </div>
    </div>

    <div id="cookieSecurityModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue mb-10"><?php echo e(trans('update.cookie_settings')); ?></h3>

        <p class="mt-10 cookie-security-modal-description"><?php echo $cookieSecuritySettings['cookie_settings_modal_message']; ?></p>

        <?php if(!empty($cookieSecuritySettings['cookie_settings_modal_items']) and count($cookieSecuritySettings['cookie_settings_modal_items'])): ?>
            <form class="js-cookie-form-customize-inputs mt-25">

                <?php $__currentLoopData = $cookieSecuritySettings['cookie_settings_modal_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cookieModalItemKey => $cookieModalItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isRequiredModalItem = (!empty($cookieModalItem['required']) and $cookieModalItem['required']);
                    ?>

                    <div class="cookie-settings-modal-items-card mb-15">
                        <div class="form-group d-flex align-items-center mb-0">
                            <div class="custom-control custom-checkbox <?php echo e($isRequiredModalItem ? 'c-not-allowed' : ''); ?>">
                                <input type="checkbox" name="settings" value="<?php echo e(mb_strtolower(str_replace(' ','_',$cookieModalItem['title']))); ?>" class="custom-control-input" <?php echo e($isRequiredModalItem ? ' checked="checked" disabled="disabled" ' : ''); ?> id="cookieModalItem<?php echo e($cookieModalItemKey); ?>_record">
                                <label class="custom-control-label" for="cookieModalItem<?php echo e($cookieModalItemKey); ?>_record"></label>
                            </div>
                            <label class="cursor-pointer font-14 text-gray mb-0 <?php echo e($isRequiredModalItem ? 'c-not-allowed' : ''); ?>" for="cookieModalItem<?php echo e($cookieModalItemKey); ?>_record"><?php echo e($cookieModalItem['title']); ?></label>

                            <?php if($isRequiredModalItem): ?>
                                <input type="hidden" name="settings" value="<?php echo e(mb_strtolower(str_replace(' ','_',$cookieModalItem['title']))); ?>">
                            <?php endif; ?>

                            <?php if(!empty($cookieModalItem['description'])): ?>
                                <button type="button" class="js-cookie-settings-modal-items-help btn-transparent ml-15">
                                    <i data-feather="help-circle" width="20" height="20" class="text-gray"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                        <ul class="cookie-settings-modal-items-card__description">
                            <li class="font-12 text-gray"><?php echo $cookieModalItem['description']; ?></li>
                        </ul>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </form>
        <?php endif; ?>

        <div class="d-flex flex-wrap align-items-center mt-20 pt-15 border-top">
            <button type="button" class="js-store-customize-cookies d-inline-flex d-md-none btn btn-primary btn-sm"><?php echo e(trans('update.confirm')); ?></button>
            <button type="button" class="js-store-customize-cookies d-none d-md-inline-flex btn btn-primary btn-sm"><?php echo e(trans('update.confirm_my_choices')); ?></button>

            <button type="button" class="js-accept-all-cookies d-inline-flex d-md-none btn btn-outline-primary btn-sm mx-15"><?php echo e(trans('update.accept_all')); ?></button>
            <button type="button" class="js-accept-all-cookies d-none d-md-inline-flex btn btn-outline-primary btn-sm mx-15"><?php echo e(trans('update.accept_all_cookies')); ?></button>

            <button type="button" class="btn-transparent close-swl ml-auto font-14 text-danger"><?php echo e(trans('public.cancel')); ?></button>
        </div>
    </div>

    <script>
        var oopsLang = '<?php echo e(trans('update.oops')); ?>';
        var somethingWentWrongLang = '<?php echo e(trans('update.something_went_wrong')); ?>';
    </script>
    <script type="text/javascript" src="/assets/default/js/parts/cookie-security.min.js"></script>
<?php endif; ?>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\includes\cookie-security.blade.php ENDPATH**/ ?>