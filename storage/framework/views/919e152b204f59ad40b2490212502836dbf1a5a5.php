<li data-id="<?php echo e(!empty($extraDescription) ? $extraDescription->id :''); ?>" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="<?php echo e($extraDescriptionType); ?>_<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>">
        <div class="font-weight-bold text-dark-blue" href="#collapseExtraDescription<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" aria-controls="collapseExtraDescription<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" data-parent="#<?php echo e($extraDescriptionParentAccordion); ?>" role="button" data-toggle="collapse" aria-expanded="true">
            <?php if(!empty($extraDescription) and !empty($extraDescription->value)): ?>
                <?php if($extraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                    <img src="<?php echo e($extraDescription->value); ?>" class="webinar-extra-description-company-logos" alt="">
                <?php else: ?>
                    <span><?php echo e(truncate($extraDescription->value, 45)); ?></span>
                <?php endif; ?>
            <?php else: ?>
                <span><?php echo e(trans('update.new_item')); ?></span>
            <?php endif; ?>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

            <?php if(!empty($extraDescription)): ?>
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/webinar-extra-description/<?php echo e($extraDescription->id); ?>/delete" class="delete-action btn btn-sm btn-transparent"><?php echo e(trans('public.delete')); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseExtraDescription<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" aria-controls="collapseExtraDescription<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" data-parent="#<?php echo e($extraDescriptionParentAccordion); ?>" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseExtraDescription<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" aria-labelledby="<?php echo e($extraDescriptionType); ?>_<?php echo e(!empty($extraDescription) ? $extraDescription->id :'record'); ?>" class=" collapse <?php if(empty($extraDescription)): ?> show <?php endif; ?>" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="js-content-form extra_description-form" data-action="/panel/webinar-extra-description/<?php echo e(!empty($extraDescription) ? $extraDescription->id . '/update' : 'store'); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][upcoming_course_id]" value="<?php echo e(!empty($upcomingCourse) ? $upcomingCourse->id :''); ?>">
                <input type="hidden" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][type]" value="<?php echo e($extraDescriptionType); ?>">

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <?php if($extraDescriptionType == \App\Models\WebinarExtraDescription::$COMPANY_LOGOS): ?>
                            <input type="hidden" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.image')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text panel-file-manager" data-input="image<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'record'); ?>" data-preview="holder">
                                            <i data-feather="upload" class="text-white" width="18" height="18"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][value]" id="image<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'record'); ?>" value="<?php echo e(!empty($extraDescription) ? $extraDescription->value : ''); ?>" class="js-ajax-value form-control" placeholder=""/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                                <div class="form-group">
                                    <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                                    <select name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][locale]"
                                            class="form-control <?php echo e(!empty($extraDescription) ? 'js-upcoming-course-content-locale' : ''); ?>"
                                            data-upcoming-course-id="<?php echo e(!empty($upcomingCourse) ? $upcomingCourse->id : ''); ?>"
                                            data-id="<?php echo e(!empty($extraDescription) ? $extraDescription->id : ''); ?>"
                                            data-relation="webinarExtraDescription"
                                            data-fields="value"
                                    >
                                        <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang); ?>" <?php echo e((!empty($extraDescription) and !empty($extraDescription->locale)) ? (mb_strtolower($extraDescription->locale) == mb_strtolower($lang) ? 'selected' : '') : ($locale == $lang ? 'selected' : '')); ?>><?php echo e($language); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][locale]" value="<?php echo e($defaultLocale); ?>">
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="input-label"><?php echo e(trans('public.title')); ?></label>
                                <input type="text" name="ajax[<?php echo e(!empty($extraDescription) ? $extraDescription->id : 'new'); ?>][value]" class="js-ajax-value form-control" value="<?php echo e(!empty($extraDescription) ? $extraDescription->value : ''); ?>"/>
                                <div class="invalid-feedback"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-extra_description btn btn-sm btn-primary"><?php echo e(trans('public.save')); ?></button>

                    <?php if(empty($extraDescription)): ?>
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion"><?php echo e(trans('public.close')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\resources\views\web\default\panel\upcoming_courses\create_includes\accordions\extra_description.blade.php ENDPATH**/ ?>