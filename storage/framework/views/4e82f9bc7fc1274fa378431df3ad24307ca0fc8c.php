<div>
    <div class="custom-modal-body">
        <h2 class="section-title after-line"><?php echo e(trans('update.add_restriction')); ?></h2>

        <div class="restriction-form" data-action="<?php echo e(getAdminPanelUrl("/users/ip-restriction/").(!empty($restriction) ? $restriction->id.'/update' : 'store')); ?>">

            <?php if(!empty($defaultFullIP)): ?>
                <input type="hidden" name="type" value="full_ip">
                <input type="hidden" name="full_ip" value="<?php echo e($defaultFullIP); ?>">

                <div class="mb-2">
                    <div class="js-ajax-full_ip"></div>
                    <div class="invalid-feedback d-block"></div>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label class="input-label d-block"><?php echo e(trans('admin/main.type')); ?></label>
                    <select id="restrictionType" name="type" class="js-ajax-type form-control">
                        <option value=""><?php echo e(trans('update.select_a_type')); ?></option>
                        <option value="full_ip" <?php echo e((!empty($restriction) and $restriction->type == "full_ip") ? 'selected' : ''); ?>><?php echo e(trans('update.full_ip')); ?></option>
                        <option value="ip_range" <?php echo e((!empty($restriction) and $restriction->type == "ip_range") ? 'selected' : ''); ?>><?php echo e(trans('update.ip_range')); ?></option>
                        <option value="country" <?php echo e((!empty($restriction) and $restriction->type == "country") ? 'selected' : ''); ?>><?php echo e(trans('update.country')); ?></option>
                    </select>

                    <div class="invalid-feedback"></div>
                </div>

                <div class="js-type-fields js-type-full_ip form-group <?php echo e((!empty($restriction) and $restriction->type == "full_ip") ? '' : 'd-none'); ?>">
                    <label class="input-label d-block"><?php echo e(trans('update.full_ip')); ?></label>

                    <input type="text" name="full_ip" class="js-ajax-full_ip form-control" placeholder="<?php echo e(trans('update.full_ip_placeholder')); ?>" value="<?php echo e(!empty($restriction) ? $restriction->value : ''); ?>">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="js-type-fields js-type-ip_range form-group <?php echo e((!empty($restriction) and $restriction->type == "ip_range") ? '' : 'd-none'); ?>">
                    <label class="input-label d-block"><?php echo e(trans('update.ip_range')); ?></label>

                    <input type="text" name="ip_range" class="js-ajax-ip_range form-control" placeholder="<?php echo e(trans('update.ip_range_hint')); ?>" value="<?php echo e(!empty($restriction) ? $restriction->value : ''); ?>">
                    <div class="invalid-feedback"></div>

                    <p class="font-12 text-muted mt-1"><?php echo e(trans('update.ip_range_hint')); ?></p>
                </div>


                <div class="js-type-fields js-type-country form-group <?php echo e((!empty($restriction) and $restriction->type == "country") ? '' : 'd-none'); ?>">
                    <label class="input-label d-block"><?php echo e(trans('update.country')); ?></label>
                    <select name="country" class="js-ajax-country form-control js-select2">
                        <option value=""><?php echo e(trans('update.select_a_country')); ?></option>

                        <?php $__currentLoopData = getCountriesLists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countryCode); ?>" <?php echo e((!empty($restriction) and $restriction->value == $countryCode) ? 'selected' : ''); ?>><?php echo e($country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="input-label d-block"><?php echo e(trans('product.reason')); ?></label>
                <textarea name="reason" rows="4" class="js-ajax-reason form-control"><?php echo e(!empty($restriction) ? $restriction->reason : ''); ?></textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <button type="button" class="js-save-restriction btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>
                <button type="button" class="close-swl btn btn-sm btn-danger ml-2"><?php echo e(trans('public.close')); ?></button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\admin\users\restrictions\lists\restriction_modal.blade.php ENDPATH**/ ?>