<li data-id="<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="bundleWebinar_<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapseBundleWebinar<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" aria-controls="collapseBundleWebinar<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" data-parent="#bundleWebinarsAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span><?php echo e((!empty($bundleWebinar) and !empty($bundleWebinar->webinar)) ? $bundleWebinar->webinar->title : trans('update.add_new_course')); ?></span>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($bundleWebinar)): ?>
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/bundle-webinars/<?php echo e($bundleWebinar->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseBundleWebinar<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" aria-controls="collapseBundleWebinar<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" data-parent="#bundleWebinarsAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseBundleWebinar<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" aria-labelledby="bundleWebinar_<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id :'record'); ?>" class=" collapse <?php if(empty($bundleWebinar)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="bundleWebinar-form" data-action="/panel/bundle-webinars/<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id : 'new'); ?>][bundle_id]" value="<?php echo e(!empty($bundle) ? $bundle->id :''); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group mt-15">
                            <label class="input-label d-block"><?php echo e(trans('panel.select_course')); ?></label>
                            <select name="ajax[<?php echo e(!empty($bundleWebinar) ? $bundleWebinar->id : 'new'); ?>][webinar_id]" class="js-ajax-webinar_id form-control <?php echo e(!empty($bundleWebinar) ? 'select2' : 'bundleWebinars-select2'); ?>" data-bundle-id="<?php echo e(!empty($bundle) ? $bundle->id : ''); ?>">
                                <option value=""><?php echo e(trans('panel.select_course')); ?></option>

                                <?php if(!empty($webinars)): ?>
                                    <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($webinar->id); ?>" <?php echo e((!empty($bundleWebinar) and $bundleWebinar->webinar_id == $webinar->id) ? 'selected' : ''); ?>><?php echo e($webinar->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mt-5">
                            <p class="font-12 text-gray">- <?php echo e(trans('update.bundle_webinars_required_hint')); ?></p>
                        </div>

                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-bundleWebinar btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($bundleWebinar)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\bundle\create_includes\accordions\bundle-webinars.blade.php ENDPATH**/ ?>