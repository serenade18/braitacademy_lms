<div id="addOfflineBankForm"
     data-action="<?php echo e(getAdminPanelUrl("/settings/financial/offline_banks/". (!empty($editBank) ? $editBank->id."/update" : 'store'))); ?>">

    <?php if(!empty(getGeneralSettings('content_translate'))): ?>
        <div class="form-group">
            <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
            <select name="locale" class="form-control <?php echo e(!empty($editBank) ? 'js-offline-banks-locale' : ''); ?>">
                <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($lang); ?>" <?php if($locale == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
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
        <label><?php echo e(trans('admin/main.title')); ?></label>
        <input type="text" name="title" value="<?php echo e((!empty($editBank) and !empty($editBank->translate($locale))) ? $editBank->translate($locale)->title : ''); ?>" class="js-ajax-title form-control "/>
        <div class="invalid-feedback"></div>
    </div>

    <div class="form-group">
        <label class="input-label"><?php echo e(trans('admin/main.logo')); ?></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="input-group-text admin-file-manager" data-input="bankLogo" data-preview="holder">
                    <i class="fa fa-chevron-up"></i>
                </button>
            </div>
            <input type="text" name="logo" id="bankLogo" value="<?php echo e((!empty($editBank)) ? $editBank->logo : ''); ?>" class="js-ajax-logo form-control"/>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center pb-2">
        <h2 class="section-title after-line"><?php echo e(trans('update.specifications')); ?></h2>

        <button type="button" class="js-add-specification btn btn-primary btn-sm ml-2"><?php echo e(trans('update.add_specification')); ?></button>
    </div>

    <div class="js-specifications-lists">
        <?php if(!empty($editBank)): ?>
            <?php $__currentLoopData = $editBank->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="js-specification-card row align-items-center">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('update.specification')); ?></label>
                                    <input type="text" name="specifications[<?php echo e($specification->id); ?>][name]" class="form-control" value="<?php echo e((!empty($specification->translate($locale))) ? $specification->translate($locale)->name : ''); ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('update.value')); ?></label>
                                    <input type="text" name="specifications[<?php echo e($specification->id); ?>][value]" class="form-control" value="<?php echo e($specification->value); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="button" class="js-remove-specification btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>


    <div class="d-flex align-items-center justify-content-end">
        <button type="button" class="js-save-bank btn btn-primary"><?php echo e(trans('admin/main.save')); ?></button>
        <button type="button" class="close-swl btn btn-danger ml-2"><?php echo e(trans('admin/main.cancel')); ?></button>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\financial\offline_banks\modal.blade.php ENDPATH**/ ?>