<li data-id="<?php echo e(!empty($prerequisite) ? $prerequisite->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="prerequisite_<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapsePrerequisite<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" aria-controls="collapsePrerequisite<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" data-parent="#prerequisitesAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span><?php echo e((!empty($prerequisite) and !empty($prerequisite->prerequisiteWebinar)) ? $prerequisite->prerequisiteWebinar->title .' - '. $prerequisite->prerequisiteWebinar->teacher->full_name : trans('public.add_new_prerequisites')); ?></span>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($prerequisite)): ?>
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/prerequisites/<?php echo e($prerequisite->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapsePrerequisite<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" aria-controls="collapsePrerequisite<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" data-parent="#prerequisitesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapsePrerequisite<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" aria-labelledby="prerequisite_<?php echo e(!empty($prerequisite) ? $prerequisite->id :'record'); ?>" class=" collapse <?php if(empty($prerequisite)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="prerequisite-form" data-action="/panel/prerequisites/<?php echo e(!empty($prerequisite) ? $prerequisite->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'new'); ?>][webinar_id]" value="<?php echo e(!empty($webinar) ? $webinar->id :''); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group mt-15">
                            <label class="input-label d-block"><?php echo e(trans('public.select_prerequisites')); ?></label>
                            <select name="ajax[<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'new'); ?>][prerequisite_id]" class="js-ajax-prerequisite_id <?php if(empty($prerequisite)): ?> form-control <?php endif; ?> prerequisites-select2" data-webinar-id="<?php echo e(!empty($webinar) ? $webinar->id : ''); ?>" data-placeholder="<?php echo e(trans('public.search_prerequisites')); ?>">
                                <?php if(!empty($prerequisite) and !empty($prerequisite->prerequisiteWebinar)): ?>
                                    <option selected value="<?php echo e($prerequisite->prerequisiteWebinar->id); ?>"><?php echo e($prerequisite->prerequisiteWebinar->title .' - '. $prerequisite->prerequisiteWebinar->teacher->full_name); ?></option>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group mt-30 d-flex align-items-center justify-content-between mb-0">
                            <label class="cursor-pointer input-label" for="requiredPrerequisitesSwitch<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'record'); ?>"><?php echo e(trans('public.required')); ?></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" id="requiredPrerequisitesSwitch<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'record'); ?>" name="ajax[<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'new'); ?>][required]" class="custom-control-input" <?php if(!empty($prerequisite) and $prerequisite->required): ?> checked="checked" <?php endif; ?>>
                                <label class="custom-control-label" for="requiredPrerequisitesSwitch<?php echo e(!empty($prerequisite) ? $prerequisite->id : 'record'); ?>"></label>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="font-12 text-gray">- <?php echo e(trans('webinars.required_hint')); ?></p>
                        </div>

                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-prerequisite btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($prerequisite)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH /home/braitaca/public_html/resources/views/web/default/panel/webinar/create_includes/accordions/prerequisites.blade.php ENDPATH**/ ?>