<div id="addStatisticItemForm"
     data-action="<?php echo e(getAdminPanelUrl("/settings/personalization/statistics/". (!empty($editStatistic) ? $editStatistic->id."/updateItem" : 'storeItem'))); ?>">
    <?php if(!empty(getGeneralSettings('content_translate'))): ?>
        <div class="form-group">
            <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
            <select name="locale" class="form-control <?php echo e(!empty($editStatistic) ? 'js-statistic-locale' : ''); ?>">
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
        <input type="text" name="title" value="<?php echo e((!empty($editStatistic)) ? $editStatistic->title : ''); ?>" class="js-ajax-title form-control "/>
        <div class="invalid-feedback"></div>
    </div>

    <div class="form-group">
        <label><?php echo e(trans('admin/main.description')); ?></label>
        <textarea rows="3" name="description" class="js-ajax-description form-control "><?php echo e((!empty($editStatistic)) ? $editStatistic->description : ''); ?></textarea>
        <div class="invalid-feedback"></div>
    </div>

    <div class="form-group">
        <label><?php echo e(trans('admin/main.background')); ?></label>
        <div class="input-group colorpickerinput">
            <input type="text" name="color" class="js-ajax-color form-control" value="<?php echo e((!empty($editStatistic)) ? $editStatistic->color : ''); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-fill-drip"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="input-label"><?php echo e(trans('admin/main.icon')); ?></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="input-group-text admin-file-manager" data-input="statisticIcon" data-preview="holder">
                    <i class="fa fa-chevron-up"></i>
                </button>
            </div>
            <input type="text" name="icon" id="statisticIcon" value="<?php echo e((!empty($editStatistic)) ? $editStatistic->icon : ''); ?>" class="js-ajax-icon form-control"/>
        </div>
    </div>

    <div class="form-group">
        <label><?php echo e(trans('admin/main.count')); ?></label>
        <input type="number" name="count" value="<?php echo e((!empty($editStatistic)) ? $editStatistic->count : ''); ?>" class="js-ajax-count form-control " min="0"/>
        <div class="invalid-feedback"></div>
    </div>


    <div class="d-flex align-items-center justify-content-end">
        <button type="button" class="js-save-statistic btn btn-primary"><?php echo e(trans('admin/main.save')); ?></button>
        <button type="button" class="close-swl btn btn-danger ml-2"><?php echo e(trans('admin/main.cancel')); ?></button>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\settings\personalization\statistic_modal.blade.php ENDPATH**/ ?>